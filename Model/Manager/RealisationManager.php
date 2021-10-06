<?php

class RealisationManager
{
    /**
 * Search all Realisations in table realisations
 * @return array|null
 */
    public function getAllRealisations(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM realisations");

        if($stmt->execute() && $realisations = $stmt->fetchAll()) {
            foreach ($realisations as $realisation) {
                $array[] = new Realisations($realisation['id'], $realisation['tittle'], $realisation['content'], $realisation['link']);
            }
        }
        return $array;
    }

    /**
     * Add a new realisation
     * @param $tittle
     * @param $content
     * @param $link
     * @return bool
     */
    public function newRealisation($tittle, $content, $link): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO realisations (tittle, content, link) VALUE (:tittle, :content, :link)");
        $stmt->bindValue(':tittle', $tittle);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':link', $link);

        return $stmt->execute();
    }

    /**
     * Delete a Realisation
     * @param $id
     * @return bool
     */
    public function deleteRealisation($id): bool
    {
        $stmt = Database::getInstance()->prepare("DELETE FROM realisations WHERE id = :id");
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}