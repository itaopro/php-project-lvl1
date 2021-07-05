<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function run(string $description, array $gameData): void
{
    line('Welcome to the Brain Games!');
    line($description);
    line();
    $userName = prompt('May I have your name? ', 'Guest', '');
    line('Hello, %s!', $userName);
    line();

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        [$question, $answer] = $gameData[$i];
        line('Question: %s', $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, %s!", $userName);
            return;
        }
        line('Correct!');
    }
    line('Congratulations, %s!', $userName);
}
