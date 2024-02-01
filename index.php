<?php


use User\Tanks\Game\Game;

require_once __DIR__.'./vendor/autoload.php';


$game = new Game();
$game->setManyPlayers(5);
$game->setTeamA("teamA");
$game->setTeamB("teamB");
var_dump($game->startGame());