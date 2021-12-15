<?php

trait SingletonTrait
{
    protected static $self;
    private function __construct()
    {
    }
    private function __clone()
    {
    }
    private function __wakeup()
    {
    }
    public static function getInstance()
    {
        if (self::$self === null) {
            self::$self = new self();
        }
        return self::$self;
    }
}

class SingletonClass
{
    use SingletonTrait;
}

var_dump(SingletonClass::getInstance());
