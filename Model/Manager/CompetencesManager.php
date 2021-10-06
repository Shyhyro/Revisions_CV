<?php

class CompetencesManager
{
    /**
     * Search all Competence in table competences
     * @return array|null
     */
    public function getAllCompetences(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM competences");

        if($stmt->execute() && $competences = $stmt->fetchAll()) {
            foreach ($competences as $competence) {
                $array[] = new Competences($competence['id'], $competence['content']);
            }
        }
        return $array;
    }

    /**
     * Add a new Competence
     * @param $content
     * @return bool
     */
    public function newCompetence($content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO competences (content) VALUE (:content)");
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    /**
     * Delete a competence
     * @param $id
     * @return bool
     */
    public function deleteCompetence($id): bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM competences WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }

}