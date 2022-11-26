<?php
namespace App\Scrapper\Source;

use App\Scrapper\Contracts\SourceInterface;

class Scraps implements SourceInterface
{
    public function getUrl($url) :string
    {
        return $url;
    }

    public function getName() :string
    {
        return 'name';
    }

    public function getWrapperSelector() :string
    {
        return 'section.list-body .list-item-wrapper';
    }

    public function getTitleSelector() :string
    {
        return 'a h4.heading';
    }

    public function getDescSelector() :string
    {
        return 'a p.card-text';
    }

    public function getDateSelector() :string
    {
        return 'time.time';
    }

    public function getLinkSelector() :string
    {
        return 'div.text-content a:nth-child(2)';
    }

    public function getImageSelector() :string
    {
        return 'img.list-img';
    }
}
