<?php

class Experiences
{
    private ?int $id;
    private ?string $tittle;
    private ?string $date;
    private ?string $content;

    /**
     * Experiences constructor.
     * @param int|null $id
     * @param string|null $tittle
     * @param string|null $date
     * @param string|null $content
     */
    public function __construct(int $id = null, string $tittle = null, string $date = null, string $content = null)
    {
        $this->id = $id;
        $this->tittle = $tittle;
        $this->date = $date;
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
     * Return tittle
     * @return false|string|null
     */
    public function getTittle(): ?string
    {
        return $this->tittle;
    }

    /**
     * Set the tittle
     * @param false|string|null $tittle
     */
    public function setTittle($tittle): Experiences
    {
        $this->tittle = $tittle;
        return $this;
    }

    /**
     * Return date
     * @return false|string|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set the date
     * @param false|string|null $date
     */
    public function setDate($date): Experiences
    {
        $this->date = $date;
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
    public function setContent($content): Experiences
    {
        $this->content = $content;
        return $this;
    }

}