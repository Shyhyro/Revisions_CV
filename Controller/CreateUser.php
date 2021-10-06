<?php
require_once "require.php";

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:index.php");
}
else
{
    if(isset($_GET['error'], $_POST['username'], $_POST['password']) && $_GET['error'] === "0")
    {
        $username = strip_tags(trim($_POST['username']));
        $password = strip_tags(trim($_POST['password']));

        $user = new UserManager();
        $user = $user->searchUser($username);

        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        // If: password no have uppercase, lowercase, number, special chars and 8, no register this
        // Else : registration
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) <= 8)
        {
            header("location: ../loginCreate?error=MotsDePasseFaible");
        }
        else
        {
            if($user == null)
            {
                $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $addUser = new UserManager();
                $addUser = $addUser->addUser($username, $new_password);

                if ($addUser)
                {
                    header("location: ../index.php?statut=create");
                }
                else
                {
                    header("location: ../loginCreate.php?error=UneErreurEstSurvenu");
                }
            }
            else
            {
                header("location: ../loginCreate.php?error=NomUtilisateurExistant");
            }
        }
    }
    else
    {
        header("location: ../loginCreate.php?error=DonneesManquantes");
    }
}