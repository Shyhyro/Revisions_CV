<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_GET['id']) && $_GET['error'] === "0") {
        $id = $_GET['id'];

        $formation = new FormationsManager();
        $formation = $formation->deleteFormation($id);

        header("location: ../administration.php?delete=formation");
    }

    header("location: ../administration.php?error=DonneeManquante");
}
else {

    header("location:../index.php");
}