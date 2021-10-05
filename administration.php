<?php
require 'Controller/require.php'
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
                    echo "<li>". $coodonnee->getContent() . '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <section>
        <h3>Personnalités:</h3>
        <div>
            <ul>
                <?php
                $personalities = new PersonnalityManager();
                $allPersonality = $personalities->getAllPersonality();

                foreach ($allPersonality as $personality) {
                    echo "<li>". $personality->getContent() . '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <section>
        <h3>Compétences:</h3>
        <div>
            <ul>
                <?php
                $competence = new CompetencesManager();
                $allCompetences = $competence->getAllCompetences();

                foreach ($allCompetences as $competence) {
                    echo "<li>". $competence->getContent() . '</li>';
                }
                ?>
            </ul>
        </div>
    </section>
    <section>
        <h3>Hobbies:</h3>
        <div>
            <ul>
                <?php
                $hobbies = new HobbiesManager();
                $allHobbies = $hobbies->getAllHobbies();

                foreach ($allHobbies as $hobbie) {
                    echo "<li>". $hobbie->getContent() . '</li>';
                }
                ?>
            </ul>
        </div>
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
                    <p class="description"><?=$experience->getContent() ?></p><br>
                </div>
                <?php
            }
            ?>
        </div>
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
                    <p class="description"><?=$formation->getContent() ?></p><br>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <section>
        <h3>Réalisations personnelles:</h3>
        <table>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Lien</th>
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
                </tr>
                <?php
            }
            ?>
        </table>
    </section>

</main>

<!-- Scripts -->
<script src="jquery-3.6.0.min.js"></script>

</body>

</html>