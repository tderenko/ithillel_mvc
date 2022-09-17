<?php

namespace Core;

use Core\Base\Model;

class DbRequestBuilder
{
    private $table = '';

    public function __construct(
        private Model $model
    ){
        $this->table = $this->model::getTableName();
    }

    private string $command = '';
    private array $columns = [];
    private array $conditions = [];
    private array $bindParams = [];
    private string $orderBy = '';
    private string $limit = '';

    public function select(array|string $columns = "*"): static
    {
        if ($this->command) {
            throw new \Exception("You already use command \"{$this->command}\"!!!");
        }

        $this->command = 'SELECT';
        $this->columns = is_array($columns) ? $columns : [$columns];

        return $this;
    }

    public function update(array $columns): static
    {
        if ($this->command) {
            throw new \Exception("You already use command \"{$this->command}\"!!!");
        }

        $this->command = 'UPDATE';
        $this->columns = $columns;
        foreach ($this->columns as $column => $value) {
            $this->bindParams[":{$column}_update"] = $value;
        }

        return $this;
    }

    public function insert(array $columns): static
    {
        if ($this->command) {
            throw new \Exception("You already use command \"{$this->command}\"!!!");
        }

        $this->command = 'INSERT';
        foreach ($columns as $column => $value) {
            $this->columns[] = $column;
            $this->bindParams[":{$column}_insert"] = $value;
        }

        return $this;
    }

    public function delete(): static
    {
        if ($this->command) {
            throw new \Exception("You already use command \"{$this->command}\"!!!");
        }

        $this->command = 'DELETE';

        return $this;
    }

    /**
     * @param array $params
     * @param string $type
     * @return $this
     */
    public function where(array $params, string $type = 'AND'): static
    {
        foreach ($params as $param => $value) {
            if (is_array($value) && count($value) === 3) {
                $this->conditions[$type][] = "{$value[0]} {$value[1]} :{$value[0]}";
                $this->bindParams[":{$value[0]}"] = $value[2];
            } else {
                $this->conditions[$type][] = "$param = :$param";
                $this->bindParams[":$param"] = $value;
            }
        }
        return $this;
    }

    public function orderBy(array|string $column, string $type = 'ASC'): static
    {
        $this->orderBy = " ORDER BY " . implode(', ', is_string($column) ? [$column] : $column) . " $type";
        return $this;
    }

    public function limit(array|int $limit): static
    {
        $this->limit = " LIMIT " . implode(',', is_array($limit) ? $limit : [$limit]);
        return $this;
    }

    public function get(): Model|array|null
    {
        $query = App::$connect->prepare($this->queryBuild());

        switch ($this->command) {
            case 'INSERT':
            case 'UPDATE':
                $this->model->before();
        }

        $query->execute($this->bindParams);

        switch ($this->command) {
            case 'INSERT':
            case 'UPDATE':
            if ($res = static::build($this->model)
                ->select()
                ->where(['id' => $this->model->id ?: App::$connect->lastInsertId()])
                ->limit(1)
                ->get()) {
                $res['0']->after();
                return $res[0];
            }
        }

        return $this->command === "SELECT"
            ? $query->fetchAll(App::$connect::FETCH_CLASS, $this->model::class)
            : null;
    }

    public function query(): string
    {
        return strtr($this->queryBuild(), $this->bindParams);
    }

    public static function build(Model $model): self
    {
        return new static($model);
    }

    protected function buildCondition(): string
    {
        $query = '';
        if ($this->conditions) {
            $query .= " WHERE ";
            foreach ($this->conditions as $type => $condition) {
                $query .= implode(" $type ", $condition);
            }
        }
        return $query;
    }

    protected function queryBuild(): string
    {
        return match ($this->command) {
            'SELECT' => "SELECT "
                . (!empty($this->columns) ? implode(', ', $this->columns) : '*')
                . " FROM {$this->table}"
                . $this->buildCondition() . $this->orderBy . $this->limit,
            'UPDATE' => "UPDATE {$this->table} SET "
                . implode(', ', array_map(fn($column) => "$column = :{$column}_update", array_keys($this->columns)))
                . $this->buildCondition(),
            'DELETE' => "DELETE FROM {$this->table}" . $this->buildCondition(),
            'INSERT' => "INSERT INTO {$this->table} (" . implode(', ', $this->columns) . ") 
                            VALUES (" . implode(', ', array_keys($this->bindParams)) . ")",
            default => throw new \Exception("Command \"{$this->command}\" not found!!!")
        };
    }
}
