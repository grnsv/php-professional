<?php

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A {
}

$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
// $a1 и $b1 - экземпляры разных классов (A и B). Каждый класс имеет свою статическую переменную $x.
// При вызове функции foo() происходит обращение к переменной $x своего класса.
