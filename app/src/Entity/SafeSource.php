<?php

namespace App\Entity;

use App\Repository\SafeSourceRepository;
use App\Scrapper\Contracts\SourceInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SafeSourceRepository::class)
 */
class SafeSource implements SourceInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

     /**
     * @ORM\Column(type="string")
     */
    private string $url;

    /**
     * @ORM\Column(type="string")
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     */
    private string $wrapperSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $titleSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $descSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $linkSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $dateSelector;

    /**
     * @ORM\Column(type="string")
     */
    private string $imageSelector;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getWrapperSelector(): string
    {
        return $this->wrapperSelector;
    }

    public function setWrapperSelector(string $wrapperSelector): void
    {
        $this->wrapperSelector = $wrapperSelector;
    }

    public function getTitleSelector(): string
    {
        return $this->titleSelector;
    }

    public function setTitleSelector(string $titleSelector): void
    {
        $this->titleSelector = $titleSelector;
    }

    public function getDescSelector(): string
    {
        return $this->descSelector;
    }

    public function setDescSelector(string $descSelector): void
    {
        $this->descSelector = $descSelector;
    }

    public function getLinkSelector(): string
    {
        return $this->linkSelector;
    }

    public function setLinkSelector(string $linkSelector): void
    {
        $this->linkSelector = $linkSelector;
    }

    public function getDateSelector(): string
    {
        return $this->dateSelector;
    }

    public function setDateSelector(string $dateSelector): void
    {
        $this->dateSelector = $dateSelector;
    }

    public function getImageSelector(): string
    {
        return $this->imageSelector;
    }

    public function setImageSelector(string $imageSelector): void
    {
        $this->imageSelector = $imageSelector;
    }
}
