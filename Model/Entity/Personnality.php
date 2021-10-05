<?php

class Personnality
{
    private ?int $id;
    private ?string $content;

    /**
     * Personnality constructor.
     * @param int|null $id
     * @param string|null $content
     */
    public function __construct(int $id = null, string $content = null)
    {
        $this->id = $id;
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
    public function setContent($content): Personnality
    {
        $this->content = $content;
        return $this;
    }
}