<?php
namespace App\Scrapper\Source;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Panther\Client as Panther;

class Scrapper
{
    protected $goutte;

    protected $panther;

    protected $scrapper;

    public function __construct()
    {
        $this->goutte = new Client();

        // $this->panther = Panther::createChromeClient();
    }

    public function scrapDom($url)
    {
        $html = file_get_contents($url);
        
        $this->scrapper = new Crawler($html);
        return $this;
    }

    public function scrap($url)
    {
        $this->scrapper = $this->goutte->request('GET',$url);
        return $this;
    }

    public function fullHtml()
    {
        return $this->scrapper->html();
    }

    public function filter($filter)
    {
        return $this->scrapper->filter($filter)->each(function (Crawler $node, $i) {
            // loop through and get the required values
            $text = $node->filter('h2')->text();
            $image =  $node->filter('.lenta-image img')->attr('data-lazy-src');
            $desc = $node->filter('p')->last()->text();

            return [
                'title' => $text,
                'image' => $image,
                'desc' => $desc
            ];
        });
    }

    public function filterImage()
    {
        return $this->scrapper
        ->filterXpath('//img')
        ->extract(array('src'));
    }
}
