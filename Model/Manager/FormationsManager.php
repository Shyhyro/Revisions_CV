<?php

class FormationsManager
{
    /**
     * Search all Formations in table formation
     * @return array|null
     */
    public function getAllFormations(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM formations");

        if($stmt->execute() && $formations = $stmt->fetchAll()) {
            foreach ($formations as $formation) {
                $array[] = new Experiences($formation['id'], $formation['tittle'], $formation['date'], $formation['content']);
            }
        }
        return $array;
    }

    /**
     * Create a new formation
     * @param $tittle
     * @param $date
     * @param $content
     * @return bool
     */
    public function newFormation($tittle, $date, $content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO formations (tittle, date, content) VALUE (:tittle, :date, :content)");
        $stmt->bindValue(':tittle', $tittle);
        $stmt->bindValue(':date', $date);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    /**
     * delete a formation
     * @param $id
     * @return bool
     */
    public function deleteFormation($id): bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM formations WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}