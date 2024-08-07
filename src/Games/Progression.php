<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\launchGame;
use function BrainGames\Random\getRandomNumber;

const RULES = 'What number is missing in the progression?';

// Функция, которая создает прогрессию
function getProgression($num, $difference, $len)
{
    $progression = [];
    $number = $num;
    // Создаем счетчик
    $count = 0;
    // Создаем арифметическую прогрессию
    while ($count !== $len) {
        $progression[] = $number;
        $number += $difference;
        $count += 1;
    }

    return $progression;
}

// Функция, которая генерирует вопрос к игре арифметическая прогрессия
function generateQuestionProgression()
{
    // Создаем случайное число, с которого будет начинаться прогрессия
    $number = getRandomNumber(50);
    // Последовательность от 5 до 10
    $len = getRandomNumber(10, 5);
    // Получаем индекс, по которому будет пропущено число
    $skip = getRandomNumber($len - 1);
    // Создаем случайное число для разности арифметической прогрессии
    $difference = getRandomNumber(20, -20);
    // Создаем арифметическую прогрессию
    $progression = getProgression($number, $difference, $len);
    // Правильный ответ на вопрос
    $correctAnswer = strval($progression[$skip]);
    // Создаем вопрос
    $question = implode(' ', $progression);
    $question = str_replace($correctAnswer, '..', $question);
    // Возвращаем из функции созданный вопрос и правильный ответ на него
    return [$question, $correctAnswer];
}

// Функция запуска игры
function startProgressionGame()
{
    launchGame(RULES, 'BrainGames\Games\Progression\generateQuestionProgression');
}
