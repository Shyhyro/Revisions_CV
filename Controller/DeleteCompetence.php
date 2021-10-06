<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_GET['id']) && $_GET['error'] === "0") {
        $id = $_GET['id'];

        $competence = new CompetencesManager();
        $competence = $competence->deleteCompetence($id);

        header("location: ../administration.php?delete=competence");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}