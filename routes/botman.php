<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
    $bot->reply($bot->getUser()->getId());
});
$botman->hears('conversar', BotManController::class.'@startConversation');
$botman->hears('matematicas', BotManController::class.'@startOperaciones');
$botman->hears('interactivo', BotManController::class.'@startInteractive');