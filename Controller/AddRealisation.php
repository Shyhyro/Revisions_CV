<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_POST['tittle'], $_POST['content'], $_POST['link']) && $_GET['error'] === "0") {
        $tittle = strip_tags(trim($_POST['tittle']));
        $content = strip_tags(trim($_POST['content']));
        $link = strip_tags(trim($_POST['link']));

        $realisation = new RealisationManager();
        $realisation = $realisation->newRealisation($tittle, $content, $link);

        header("location: ../administration.php?add=realisation");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}