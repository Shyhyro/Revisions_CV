<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_POST['name'], $_POST['content']) && $_GET['error'] === "0") {
        $name = strip_tags(trim($_POST['name']));
        $content = strip_tags(trim($_POST['content']));

        $coodonnee = new CoodonneesManager();
        $coodonnee = $coodonnee->newCoodonnee($name, $content);

        header("location: ../administration.php?add=coordonnees");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}