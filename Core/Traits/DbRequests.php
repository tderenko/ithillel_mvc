<?php

namespace Core\Traits;

use Core\DbRequestBuilder;
use Core\Model;

trait DbRequests
{
    public static function select(array|string $column = '*'): DbRequestBuilder
    {
        return DbRequestBuilder::build(static::class)->select($column);
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
        return DbRequestBuilder::build(static::class)->update($columns)->where(['id' => $this->id]);
    }

    public static function create(array $columns): Model
    {
        return DbRequestBuilder::build(static::class)->insert($columns)->get();
    }

    public static function delete(int $id = null): DbRequestBuilder|null
    {
        if ($id) {
            DbRequestBuilder::build(static::class)->delete()->where(['id' => $id])->get();
            return null;
        }
        return DbRequestBuilder::build(static::class)->delete();
    }

    public static function all(): array
    {
        return DbRequestBuilder::build(static::class)->select()->get();
    }

    public static function findBy(string $column, $value)
    {
        $res = DbRequestBuilder::build(static::class)
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
