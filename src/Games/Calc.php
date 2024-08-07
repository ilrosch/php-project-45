<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\launchGame;
use function BrainGames\Random\getRandomNumber;

const RULES = 'What is the result of the expression?';

// Функция, которая выполняет выбранную операцию над числами
function calc(int $a, int $b, string $operation)
{
    switch ($operation) {
        case '*':
            return $a * $b;
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        default:
            return null;
    }
}

// Функция, которая генерирует вопрос для игры в четность числа
function generateQuestionCalc()
{
    // Создаем два случайных числа number1 и number2
    $number1 = getRandomNumber(100);
    $number2 = getRandomNumber(100);
    // Создаем случайное число для определения операции
    $operations = ['*', '+', '-'];
    $operation = $operations[getRandomNumber(2)];
    // Создаем вопрос
    $question = "$number1 $operation $number2";
    // Правильный ответ на вопрос и приобразуем к типу строка для правильной работы
    $correctAnswer = strval(calc($number1, $number2, $operation));
    // Возвращаем из функции созданный вопрос и правильный ответ на него
    return [$question, $correctAnswer];
}

// Функция запуска игры
function startCalcGame()
{
    launchGame(RULES, 'BrainGames\Games\Calc\generateQuestionCalc');
}
