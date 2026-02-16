<?php

namespace App\Exceptions;

class Math {
    public function add(int $a, int $b) {}
    public static function addStatic(int $a, int $b) {}
    public function __invoke(int $a, int $b) {}
}

$math = new Math();

//Встроенные функция
$osdos = strlen(...);
'strlen'(...);

//Массивы
[$math, 'add'](...);
[Math::class, 'addStatic'](...);

//Invokable объекты
$math(...);

//Методы объекта и класса
$math->add(...);
Math::addStatic(...);
