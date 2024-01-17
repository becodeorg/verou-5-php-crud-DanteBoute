<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types=1);

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'config.php';
require_once 'classes/DatabaseManager.php';
require_once 'classes/CardRepository.php';

$databaseManager = new DatabaseManager($config['host'], $config['user'], $config['password'], $config['dbname']);
$databaseManager->connect();


$cardRepository = new CardRepository($databaseManager);
$cards = $cardRepository->get();

$action = $_GET["action"] ?? null;

switch ($action) {
    case 'create':
        create($databaseManager);
        break;
    case 'edit':
        edit($databaseManager);
        break;
    case 'delete':
        delete($databaseManager);
        break;
    default:
        overview($databaseManager);
        break;
    
}

function overview($databaseManager)
{
    $pokemonCard = new CardRepository($databaseManager);
    $cards = $pokemonCard->get();
    require 'overview.php';
}

function create($databaseManager)
{
    if (isset($_POST['submit'])) {
        $cardRepository = new CardRepository($databaseManager);
        $cardRepository->create();
        overview($databaseManager);
    } else require 'add.php';
}
function edit($databaseManager){
    if (isset($_POST['submit'])) {
        $cardRepository = new CardRepository($databaseManager);
        $cardRepository->update();
        overview($databaseManager);
    } else {
        $cardRepository = new CardRepository($databaseManager);
        $pokemon = $cardRepository->find()[0];
        
        require 'edit.php';}
}
function delete($databaseManager){
        $cardRepository = new CardRepository($databaseManager);
        $cardRepository->delete();
        overview($databaseManager);
}
