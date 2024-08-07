<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\launchGame;
use function BrainGames\Random\getRandomNumber;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

// Число четное?
function isEven(int $num)
{
    return $num % 2 === 0;
}

// Функция, которая генерирует вопрос для игры в четность числа
function generateQuestionParity()
{
    // Создается случайный число
    $number = getRandomNumber(100);
    // Получаем правильный ответ на созданный вопрос
    $correctAnswer = isEven($number) ? 'yes' : 'no';
    // Возвращаем из функции созданный вопрос и правильный ответ на него
    return [$number, $correctAnswer];
}

// Функция запуска игры
function startEvenGame()
{
    launchGame(RULES, 'BrainGames\Games\Even\generateQuestionParity');
}
