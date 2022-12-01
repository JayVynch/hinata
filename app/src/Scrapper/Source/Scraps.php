<?php
namespace App\Scrapper\Source;


class Scraps
{
    private $title;
    private $image;
    private $desc;

    public function __construct(array $array) 
    {
        $this->title = $array['title'];
        $this->image = $array['image'];
        $this->desc = $array['desc'];
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getDescription()
    {
        return $this->desc;
    }
}
