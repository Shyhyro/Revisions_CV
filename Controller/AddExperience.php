<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_POST['tittle'], $_POST['date'], $_POST['content']) && $_GET['error'] === "0") {
        $tittle = strip_tags(trim($_POST['tittle']));
        $content = strip_tags(trim($_POST['content']));
        $date = strip_tags(trim($_POST['date']));

        $experience = new ExperiencesManager();
        $experience = $experience->newExperience($tittle, $date, $content);

        header("location: ../administration.php?add=experience");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}