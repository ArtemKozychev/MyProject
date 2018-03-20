<?php

namespace Artemkozychev\Tasks\Task1;

class Connection
{
    protected $options;

    public function __construct(ConnectionOptionInterface $options)
    {
        $this->options = $options;
    }

    public function __toString(): string
    {
        return $this->options->getDns();
    }
}