<?php
include "Animal.php";
include "Tortoise.php";
include "Rabbit.php";
include "Game.php";

$tortoise = new Tortoise("Albert");
$tortoise2 = new Tortoise("Michael");
$rabbit = new Rabbit("Roger");

$game = new Game();
$game->queueUp($tortoise2);
$game->queueUp($tortoise);
$game->queueUp($rabbit);

$participants = $game->participants;

$game->preparing();
$game->running();
$game->endGame();

?>