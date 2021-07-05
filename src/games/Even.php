<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function genRoundData(): array
{
    $number = rand(10, 99);
    $question = (string) $number;
    $answer = isEven($number) ? 'yes' : 'no';

    return [$question, $answer];
}

function runGame(): void
{
    $gameData = [];
    for ($i = 0; $i < Engine\ROUNDS_COUNT; $i += 1) {
        $gameData[] = genRoundData();
    }

    Engine\run(DESCRIPTION, $gameData);
}
