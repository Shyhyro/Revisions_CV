<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key'])) {

    if (isset($_GET['error'], $_POST['content']) && $_GET['error'] === "0") {
        $content = strip_tags(trim($_POST['content']));

        $hobbie = new HobbiesManager();
        $hobbie = $hobbie->newHobbies($content);

        header("location: ../administration.php?add=hobbie");
    }

    header("location: ../administration.php?error=DonneeManquante");

}
else {
    header("location:../index.php");
}