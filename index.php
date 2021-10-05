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
    <h1>Curriculum Vitae</h1>
    <nav>
    </nav>
</header>

<main id="container">

    <section id="cv">
        <div id="cv_left">
            <figure class="card">
                <img class="front" src="placeholder.png" alt="ma photo">
                <figcaption class="back">Moi en photo</figcaption>
            </figure>
            <h2 class="titles">Nom Prenom</h2>
            <div>
                <h3 class="titles sectionButton">Coordonnées:</h3>
                <section class="section">
                    <ul>
                        <?php
                        $coodonnees = new CoodonneesManager();
                        $allCoodonnees = $coodonnees->getAllCoodonnees();

                        foreach ($allCoodonnees as $coodonnee) {
                            echo "<li>". $coodonnee->getContent() . '</li>';
                        }
                        ?>
                    </ul>
                </section>
            </div>
            <div>
                <h3 class="titles sectionButton">Personnalités:</h3>
                <section class="section">
                    <ul>
                        <?php
                        $personalities = new PersonnalityManager();
                        $allPersonality = $personalities->getAllPersonality();

                        foreach ($allPersonality as $personality) {
                            echo "<li>". $personality->getContent() . '</li>';
                        }
                        ?>
                    </ul>
                </section>
            </div>
            <div>
                <h3 class="titles sectionButton">Compétences:</h3>
                <section class="section">
                    <ul>
                        <?php
                        $competence = new CompetencesManager();
                        $allCompetences = $competence->getAllCompetences();

                        foreach ($allCompetences as $competence) {
                            echo "<li>". $competence->getContent() . '</li>';
                        }
                        ?>
                    </ul>
                </section>
            </div>
            <div>
                <h3 class="titles sectionButton">Hobbies:</h3>
                <section class="section">
                    <ul>
                        <?php
                        $hobbies = new HobbiesManager();
                        $allHobbies = $hobbies->getAllHobbies();

                        foreach ($allHobbies as $hobbie) {
                            echo "<li>". $hobbie->getContent() . '</li>';
                        }
                        ?>
                    </ul>
                </section>
            </div>
        </div>
        <div id="cv_right">
            <div id="cv_head">
                <h2 class="titles">Titre du Curriculum Vitae</h2>
            </div>
            <div id="cv_experience">
                <h3 class="titles">Experience Professionnelle</h3>
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
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div id="cv_study">
                <h3 class="titles">Formations</h3>
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
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <tr id="cv_others">
                <h3 class="titles">Réalisations personnelles:</h3>
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
            </div>
        </div>
    </section>

    <section>
        <aside>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Blanditiis consequatur cupiditate itaque officia officiis pariatur placeat quidem.
                Commodi dolore, doloribus fugiat harum perspiciatis porro, sed temporibus velit veniam voluptas voluptatum!
            </p>
        </aside>
        <form action="#" name="contact" id="cv_contact_form">
            <fieldset>
                <legend>Vos informations:</legend>
                <label for="name">Nom: </label>
                <input id="name" name="name" type="text" required>
                <label for="email">E-mail:</label>
                <input id="email" type="email" required>
            </fieldset>
            <fieldset>
                <legend>Contenus:</legend>
                <label for="textarea">Message:</label>
                <textarea id="textarea" required></textarea>
            </fieldset>
            <button type="submit">Envoyer</button>
        </form>
    </section>

    <section>
        <dl>
        </dl>
    </section>

</main>

<!-- Scripts -->
<script src="jquery-3.6.0.min.js"></script>
<script src="scripts.js"></script>

</body>

</html>