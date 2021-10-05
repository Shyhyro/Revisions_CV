<?php

class PersonnalityManager
{
    /**
 * Search all Personality in table personality
 * @return array|null
 */
    public function getAllPersonality(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM personnality");

        if($stmt->execute() && $personnality = $stmt->fetchAll()) {
            foreach ($personnality as $onePersonnality) {
                $array[] = new Personnality($onePersonnality['id'], $onePersonnality['content']);
            }
        }
        return $array;
    }

    /**
     * Create a new Personnality
     * @param $content
     * @return bool
     */
    public function newPersonnality($content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO personnality (content) VALUE (:content)");
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }
}