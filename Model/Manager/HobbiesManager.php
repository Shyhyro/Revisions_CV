<?php

class HobbiesManager
{
    /**
     * Search all Hobbies in table hobbies
     * @return array|null
     */
    public function getAllHobbies(): ?array
    {
        $array = [];
        $stmt = Database::getInstance()->prepare("SELECT * FROM hobbies");

        if($stmt->execute() && $hobbies = $stmt->fetchAll()) {
            foreach ($hobbies as $hobbie) {
                $array[] = new Hobbies($hobbie['id'], $hobbie['content']);
            }
        }
        return $array;
    }

    /**
     * Create a new Hobbies
     * @param $content
     * @return bool
     */
    public function newHobbies($content): bool
    {
        $stmt = Database::getInstance()->prepare("INSERT INTO hobbies (content) VALUE (:content)");
        $stmt->bindValue(':content', $content);

        return $stmt->execute();
    }
}