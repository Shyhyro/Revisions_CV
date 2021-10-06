<?php
require 'Controller/require.php';

if (isset($_SESSION['id'], $_SESSION['username'], $_SESSION['key']))
{
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
    <h1>Administration</h1>
    <nav>
        <ul>
            <li><a href="index.php">Revenir au CV</a></li>
            <li><a href="Controller/LogoutController.php">Log-out</a></li>
        </ul>
    </nav>
</header>

<main id="container">
    <section>
        <h3>Coordonnées:</h3>
        <div>
            <ul>
                <?php
                $coodonnees = new CoodonneesManager();
                $allCoodonnees = $coodonnees->getAllCoodonnees();

                foreach ($allCoodonnees as $coodonnee) {
                    echo "<li>". $coodonnee->getName() . " | " . $coodonnee->getContent() . ' | <a href="Controller/DeleteCoodonnee.php?error=0&id='. $coodonnee->getId() .'">Delete</a></li>';
                }
                ?>
            </ul>
        </div>
        <form name="addCoordonnées" action="Controller/AddCoodonnee.php?error=0" method="post">
            <fieldset>
                Name:
                <input name="name" type="text" maxlength="45" required>
                Content:
                <input name="content" type="text" maxlength="100" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Personnalités:</h3>
        <div>
            <ul>
                <?php
                $personalities = new PersonnalityManager();
                $allPersonality = $personalities->getAllPersonality();

                foreach ($allPersonality as $personality) {
                    echo "<li>". $personality->getContent() . ' | <a href="Controller/DeletePersonality.php?error=0&id='. $personality->getId() .'">Delete</a></li>';
                }
                ?>
            </ul>
        </div>
        <form name="addPersonality" action="Controller/AddPersonality.php?error=0" method="post">
            <fieldset>
                Content:
                <input name="content" type="text" maxlength="45" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Compétences:</h3>
        <div>
            <ul>
                <?php
                $competence = new CompetencesManager();
                $allCompetences = $competence->getAllCompetences();

                foreach ($allCompetences as $competence) {
                    echo "<li>". $competence->getContent() . ' | <a href="Controller/DeleteCompetence.php?error=0&id='. $competence->getId() .'">Delete</a></li>';
                }
                ?>
            </ul>
        </div>
        <form name="addCompetence" action="Controller/AddCompetence.php?error=0" method="post">
            <fieldset>
                Content:
                <input name="content" type="text" maxlength="45" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Hobbies:</h3>
        <div>
            <ul>
                <?php
                $hobbies = new HobbiesManager();
                $allHobbies = $hobbies->getAllHobbies();

                foreach ($allHobbies as $hobbie) {
                    echo "<li>". $hobbie->getContent() . ' | <a href="Controller/DeleteHobbie.php?error=0&id='. $hobbie->getId() .'">Delete</a></li>';
                }
                ?>
            </ul>
        </div>
        <form name="addHobbie" action="Controller/AddHobbie.php?error=0" method="post">
            <fieldset>
                Content:
                <input name="content" type="text" maxlength="45" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Experience Professionnelle</h3>
        <div id="cv_all_experiences">
            <?php
            $experiences = new ExperiencesManager();
            $allexperiences = $experiences->getAllExperience();

            foreach ($allexperiences as $experience) {
                ?>
                <div class="cv_1_experience">
                    <h4><?=$experience->getTittle() ?></h4>
                    <p class="date"><?=$experience->getDate() ?></p>
                    <p class="description"><?=$experience->getContent() ?></p>
                    <p><a href="Controller/DeleteExperience.php?error=0&id=<?=$experience->getId() ?>">Delete</a></p><br>
                </div>
                <?php
            }
            ?>
        </div>
        <form name="addExperience" action="Controller/AddExperience.php?error=0" method="post">
            <fieldset>
                Tittle:
                <input name="tittle" type="text" maxlength="45" required>
                Date:
                <input name="date" type="date" maxlength="45" required>
                Content:
                <input name="content" type="text" maxlength="45" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Formations</h3>
        <div id="cv_all_study">
            <?php
            $formations = new FormationsManager();
            $allformations = $formations->getAllFormations();

            foreach ($allformations as $formation) {
                ?>
                <div class="cv_1_study">
                    <h4><?=$formation->getTittle() ?></h4>
                    <p class="date"><?=$formation->getDate() ?></p>
                    <p class="description"><?=$formation->getContent() ?></p>
                    <p><a href="Controller/DeleteFormation.php?error=0&id=<?=$formation->getId() ?>">Delete</a></p><br>
                </div>
                <?php
            }
            ?>
        </div>
        <form name="addFormation" action="Controller/AddFormation.php?error=0" method="post">
            <fieldset>
                Tittle:
                <input name="tittle" type="text" maxlength="45" required>
                Date:
                <input name="date" type="date" maxlength="45" required>
                Content:
                <input name="content" type="text" maxlength="45" required>
                <button type="submit">Add</button>
            </fieldset>
        </form>
    </section>
    <section>
        <h3>Réalisations personnelles:</h3>
        <table>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Lien</th>
                <th>Actions</th>
            </tr>
            <?php
            $realisations = new RealisationManager();
            $allRealisations = $realisations->getAllRealisations();

            foreach ($allRealisations as $realisation) {
                ?>
                <tr>
                    <td><?=$realisation->getTittle() ?></td>
                    <td><?=$realisation->getContent() ?></td>
                    <td><a href="<?=$realisation->getLink() ?>">Lien</a></td>
                    <td><a href="Controller/DeleteRealisation.php?error=0&id=<?=$realisation->getId() ?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
        <form name="addRealisation" action="Controller/AddRealisation.php?error=0" method="post">
            <fieldset>
                Tittle:
                <input name="tittle" type="text" maxlength="45" required>
                Content:
                <input name="content" type="text" maxlength="45" required>
                Link:
                <input name="link" type="text" maxlength="255" required>
                <button type="submit">Add</button>
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
else {
    header("location:index.php");
}