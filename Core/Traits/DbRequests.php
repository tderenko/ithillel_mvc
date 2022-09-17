<?php

namespace Core\Traits;

use Core\Base\Model;
use Core\DbRequestBuilder;

trait DbRequests
{
    public static function select(array|string $column = '*'): DbRequestBuilder
    {
        return DbRequestBuilder::build(new static())->select($column);
    }

    public function update(array $columns): DbRequestBuilder
    {
        if (!$this->id) {
            $class = static::class;
            throw new \Exception("[Update {$class}] \"id\" doesn't exists!!!");
        }
        foreach ($columns as $column => $value) {
            property_exists($this, $column) && $this->$column = $value;
        }
        return DbRequestBuilder::build($this)->update($columns)->where(['id' => $this->id]);
    }

    public static function create(array $columns): Model
    {
        return DbRequestBuilder::build(new static())->insert($columns)->get();
    }

    public static function delete(int $id = null): DbRequestBuilder|null
    {
        if ($id) {
            DbRequestBuilder::build($this)->delete()->where(['id' => $id])->get();
            return null;
        }
        return DbRequestBuilder::build($this)->delete();
    }

    public static function all(): array
    {
        return DbRequestBuilder::build(new static())->select()->get();
    }

    public static function findBy(string $column, $value)
    {
        $res = DbRequestBuilder::build(new static())
            ->select()
            ->where([$column => $value])
            ->limit(1)
            ->get();
        return $res['0'] ?? null;
    }

    public static function find(int $id): static|null
    {
        return static::findBy('id', $id);
    }
}
