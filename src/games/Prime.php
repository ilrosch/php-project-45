<?php

  namespace BrainGames\Games\Prime;

  use function BrainGames\Engine\launchGame;
  use function BrainGames\Random\getRandomNumber;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

// Число простое?
function isPrime(int $num)
{
    for ($i = 2; $i < $num / 2; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

// Функция, которая генерирует вопрос к игре простое число
function generateQuestionPrime()
{
    // Создаем случайное число
    $number = getRandomNumber(200);
    // Правильный ответ на вопрос
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    // Возвращаем из функции созданный вопрос и правильный ответ на него
    return [$number, $correctAnswer];
}

// Функция запуска игры
function startPrimeGame()
{
    launchGame(RULES, 'BrainGames\Games\Prime\generateQuestionPrime');
}
