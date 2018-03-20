<?php

namespace Artemkozychev\Tasks\Task1;

class Container
{
    private $bindings = [];

    public function offsetGet($offset)
    {
        return $this->get($offset);
    }

    public function offsetExists($offset)
    {
        return $this->has($offset);
    }

    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }

    public function offsetUnset($offset)
    {
        $this->unset($offset);
    }

    public function get(string $key)
    {
        if (!$this->has($key)) {
            return null;
        }

        $value = $this->bindings[$key];

        if (is_callable($value)) {
            $value = $this->bindings[$key] = call_user_func($value);
        }

        return $value;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->bindings);
    }

    public function set(string $key, $value): void
    {
        $this->bindings[$key] = $value;
    }

    public function unset(string $key)
    {
        unset($this->bindings[$key]);
    }

    public function __invoke($key)
    {
        return $this->get($key);
    }

    public function __get($key)
    {
        return $this->get($key);
    }

    public function __set($key, $value)
    {
        $this->set($key, $value);
    }
}