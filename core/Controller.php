<?php

namespace core;

abstract class Controller
{

    protected array $routeParams = [];

    public function __construct($routeParams)
    {
        $this->routeParams = $routeParams;
    }
}
