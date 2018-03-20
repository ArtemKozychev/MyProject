<?php

namespace Artemkozychev\Tasks\Task1;

class MySqlOptions implements ConnectionOptionInterface
{
    protected $connectionString;

    public function __construct($connectionString)
    {
        $this->connectionString = $connectionString;
    }

    public function getDns(): string
    {
        return $this->connectionString;
    }
}