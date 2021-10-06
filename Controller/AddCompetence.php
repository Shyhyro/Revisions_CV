<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_POST['content']) && $_GET['error'] === "0") {
        $content = strip_tags(trim($_POST['content']));

        $competence = new CompetencesManager();
        $competence = $competence->newCompetence($content);

        header("location: ../administration.php?add=competence");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}