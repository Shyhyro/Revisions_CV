<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];

$rootHtml = "/" . basename($_SERVER['DOCUMENT_ROOT']);
$rootHtml = str_replace("//", "/", $rootHtml);

//Database
require_once $root . "/Model/Classes/Database.php";

// Entity
require_once $root . "/Model/Entity/Competences.php";
require_once $root . "/Model/Entity/Coodonnees.php";
require_once $root . "/Model/Entity/Experiences.php";
require_once $root . "/Model/Entity/Formations.php";
require_once $root . "/Model/Entity/Hobbies.php";
require_once $root . "/Model/Entity/Personnality.php";
require_once $root . "/Model/Entity/Realisations.php";

// Manager
require_once $root . "/Model/Manager/CompetencesManager.php";
require_once $root . "/Model/Manager/CoodonneesManager.php";
require_once $root . "/Model/Manager/ExperiencesManager.php";
require_once $root . "/Model/Manager/FormationsManager.php";
require_once $root . "/Model/Manager/HobbiesManager.php";
require_once $root . "/Model/Manager/PersonnalityManager.php";