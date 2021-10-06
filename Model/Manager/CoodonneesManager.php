<?php

class CoodonneesManager
{
    /**
     * Search all Coodonnees in table coodonnees
     * @return array|null
     */
    public function getAllCoodonnees(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM coodonnees");

        if($stmt->execute() && $coodonnees = $stmt->fetchAll()) {
            foreach ($coodonnees as $coodonnee) {
                $array[] = new Coodonnees($coodonnee['id'], $coodonnee['name'], $coodonnee['content']);
            }
        }
        return $array;
    }

    /**
     * Create a New coodonnee
     * @param $name
     * @param $content
     * @return bool
     */
    public function newCoodonnee($name, $content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO coodonnees (name, content) VALUE (:name, :content)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }

    /**
     * Delete a Coodonnee
     * @param $id
     * @return bool
     */
    public function deleteCoodonne($id): bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM coodonnees WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}