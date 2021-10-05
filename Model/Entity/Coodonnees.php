<?php

class Coodonnees
{
    private ?int $id;
    private ?string $name;
    private ?string $content;

    /**
     * Coodonnees constructor.
     * @param int|null $id
     * @param string|null $name
     * @param string|null $content
     */
    public function __construct(int $id = null, string $name = null, string $content = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->content = $content;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return name
     * @return false|string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name
     * @param false|string|null $name
     */
    public function setName($name): Coodonnees
    {
        $this->name = $name;
        return $this;
    }


    /**
     * Return content
     * @return false|string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the content
     * @param false|string|null $content
     */
    public function setContent($content): Coodonnees
    {
        $this->content = $content;
        return $this;
    }

}