<?php
require_once "require.php";

// If a session is active, user redirection to home page
if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:../index.php");
}
// Else, her login information as submit to this page for login verification
else
{
    if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0") {
        $username = strip_tags(trim($_POST['username']));
        $password = strip_tags(trim($_POST['password']));

        /**
         * Check if information of login is correct and creat a session for the user
         * @param string $username
         * @param string $password
         */
        function checkPassword(string $username, string $password) {
            $user = new UserManager();

            // If good username, check password of this username
            if($user->searchUser($username)) {
                if(password_verify($password, $user->searchUser($username)->getPassword())) {

                    $_SESSION['id'] = $user->searchUser($username)->getId();
                    $_SESSION['username'] = $user->searchUser($username)->getUsername();
                    $_SESSION['key'] = date('dmY') . $user->searchUser($username)->getId();
                    header("location: ../index.php?statut=online");
                }
                else {
                    header('location: ../loginCreate.php?error=UneErreurEstSurvenu');
                }
            }
            else {
                header('location: ../loginCreate.php?error=IdentifiantsIncorrectOuInconnu');
            }
        }
        checkPassword($username, $password);
    }
}