<?php

namespace App\Lib\ParseDownExtensions;

use Illuminate\Support\Str;

trait HasRegistry
{
    protected $registry = [];

    protected $scope = null;

    /**
     * @return \Parsedown
     */
    private function getScope()
    {
        return $this->scope ?? new \Parsedown();
    }

    protected function setScope($scope)
    {
        $this->scope = $scope;
    }

    private function register($clazz)
    {
        $this->registry[Str::camel(class_basename($clazz))] = new $clazz($this->getScope());
    }

    public function __get($name)
    {
        return $this->registry[Str::camel(class_basename($name))];
    }

    public function __set($name, $value)
    {
    }

    public function __isset($name)
    {
        return isset($this->registry[Str::camel(class_basename($name))]);
    }
}
