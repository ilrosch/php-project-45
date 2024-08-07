<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\launchGame;
use function BrainGames\Random\getRandomNumber;

const RULES = 'Find the greatest common divisor of given numbers.';

// Функция для нахождения НОД
function gcd(mixed $a, mixed $b)
{
    if ($a % $b) {
        return gcd($b, $a % $b);
    }

    return abs($b);
}

// Функция, которая генерирует вопрос к игре наибольший общий делитель
function generateQuestionGcd()
{
    // Создаем два случайных числа number1 и number2
    $number1 = getRandomNumber(100, 1);
    $number2 = getRandomNumber(100, 1);
    // Создаем случайный вопрос из двух чисел выше
    $question = "$number1 $number2";
    // Получаем правильный ответ и преобразуем его к типу строка для корректной работы программы
    $correctAnswer = strval(gcd($number1, $number2));
    // Возвращаем из функции созданный вопрос и правильный ответ на него
    return [$question, $correctAnswer];
}

// Функция запуска игры
function startGcdGame()
{
    launchGame(RULES, 'BrainGames\Games\Gcd\generateQuestionGcd');
}
