<?php


namespace Core\Traits;


trait DotSlice
{
    public function getPiece(string $keys, array $bucket)
    {
        $keys = explode('.', $keys);
        return $this->deepSearch($keys, $bucket);
    }

    protected function deepSearch(array $keys, array $bucket) {
        $key = array_shift($keys);
        if (!key_exists($key, $bucket)) {
            throw new \Exception("Key \"$key\" doesn't exists!!!");
        }

        return empty($keys) ? $bucket[$key] : $this->deepSearch($keys, $bucket[$key]);
    }
}
