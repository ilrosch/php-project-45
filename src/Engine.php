<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\welcome;

// Кол-во раундов игры
const COUNT_ROUNDS = 3;

function launchGame(string $rules, ?string $defGame)
{
    // Приветствие и запоминаем имя игрока (пользователя)
    $userName = welcome();
    // Выводим в консоль правила игры
    line($rules);
    // С помощью цикла задаем кол-во раундов
    for ($i = 0; $i < COUNT_ROUNDS; $i += 1) {
        // defGame - функция конкретной игры
        // Получаем вопрос и ответ
        [$question, $answer] = $defGame();
        // Выводим в консоль вопрос
        line("Question: %s", $question);
        // Спрашиваем ответ пользователя
        $userAnswer = prompt('Your answer');
        $userAnswer = strtolower($userAnswer);
        // Если игрок ответил не верно завершить игру
        if ($answer !== $userAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, %s!", $userName);
            return;
        }

        line("Correct!");
    }
    // Поздравление с победой
    line("Congratulations, %s!", $userName);
}
