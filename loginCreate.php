<?php
require 'Controller/require.php';

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
    header("location:index.php");
}
else {
    ?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Curriculum Vitae</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="placeholder.png">
        <!-- Styles -->
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>

    <header>
        <h1>Log-In / Create </h1>
        <nav>
            <ul>
                <li><a href="index.php">Revenir au CV</a></li>
            </ul>
        </nav>
    </header>

    <main id="container">
        <section>
            <h3>Log-In</h3>
            <form name="Login" method="post" action="Controller/LoginController.php?error=0">
                <fieldset>
                    Username:
                    <input name="username" type="text" placeholder="username">
                    Password:
                    <input name="password" type="password" placeholder="Password">
                    <button type="submit">Log-In</button>
                </fieldset>
            </form>
        </section>
        <section>
            <h3>Create</h3>
            <form name="create" method="post" action="Controller/CreateUser.php?error=0">
                <fieldset>
                    Username:
                    <input name="username" type="text" placeholder="username">
                    Password:
                    <input name="password" type="password" placeholder="Password">
                    <button type="submit">Create</button>
                </fieldset>
            </form>
        </section>
    </main>

    <!-- Scripts -->
    <script src="jquery-3.6.0.min.js"></script>

    </body>

    </html>

    <?php
}