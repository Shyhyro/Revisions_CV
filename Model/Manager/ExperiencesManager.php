<?php

class ExperiencesManager
{
    /**
     * Search all Experience in table experience
     * @return array|null
     */
    public function getAllExperience(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM experiences");

        if($stmt->execute() && $experiences = $stmt->fetchAll()) {
            foreach ($experiences as $experience) {
                $array[] = new Experiences($experience['id'], $experience['tittle'], $experience['date'], $experience['content']);
            }
        }
        return $array;
    }

    public function newExperience($tittle, $date, $content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO experiences (tittle, date, content) VALUE (:tittle, :date, :content)");
        $stmt->bindValue(':tittle', $tittle);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }
}