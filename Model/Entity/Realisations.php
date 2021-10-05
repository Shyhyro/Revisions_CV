<?php

class Realisations
{
    private ?int $id;
    private ?string $tittle;
    private ?string $content;
    private ?string $link;

    /**
     * Realisations constructor.
     * @param int|null $id
     * @param string|null $tittle
     * @param string|null $link
     * @param string|null $content
     */
    public function __construct(int $id = null, string $tittle = null, string $link = null, string $content = null)
    {
        $this->id = $id;
        $this->tittle = $tittle;
        $this->link = $link;
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
    public function setTittle($tittle): Realisations
    {
        $this->tittle = $tittle;
        return $this;
    }

    /**
     * Return link
     * @return false|string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * Set the link
     * @param false|string|null $link
     */
    public function setLink($link): Realisations
    {
        $this->link = $link;
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
    public function setContent($content): Realisations
    {
        $this->content = $content;
        return $this;
    }
}