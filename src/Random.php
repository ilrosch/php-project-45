<?php

  namespace BrainGames\Random;

// Функция, которая генерирует случайные числа в заданном диапазоне
// Функция, которая создает число в заданном диапазоне [ x, y )
function getRandomNumber(int $max, int $min = 0)
{
    return rand($min, $max);
}
