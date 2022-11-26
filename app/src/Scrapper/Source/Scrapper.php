<?php
namespace App\Scrapper\Source;

use App\Entity\Post;
use App\Scrapper\Contracts\SourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Panther\Client;

class Scrapper
{
    public function scrap(SourceInterface $source): Collection
    {
        $collection = [];
        $client = Client::createChromeClient();
        $crawler = $client->request('GET', $source->getUrl());
        $crawler->filter($source->getWrapperSelector())->each(function (Crawler $c) use ($source, &$collection) {
            /// this line usually by passes the ads
            if (!$c->filter($source->getLinkSelector())->count()) {
                return;
            }

            $post = new Post();

            /// Find and filter the title
            $title = $c->filter($source->getTitleSelector())->text();
            $post->setTitle($title);

            /// some websites using datetime attribute in <time> tag to store the full
            /// date time, here we first checked if this attribute exists, otherwise we fetch the
            /// text inside the tag.
            $dateTime = $c->filter($source->getDateSElector())->attr('datetime');
            if (!$dateTime) {
                $dateTime = $c->filter($source->getDateSElector())->text();
            }
            $dateTime = $this->cleanupDate($dateTime);
            $post->setDate($dateTime);

            $link = $c->filter($source->getLinkSelector())->attr('href');
            $post->setUrl($link);

            $desk = ($c->filter($source->getDescSelector())->text());
            $post->setDesc($desk);

            $collection[] = $post;
        });

        return new ArrayCollection($collection);
    }

    /**
     * In order to make DateTime work, we need to clean up the input.
     *
     * @throws \Exception
     */
    private function cleanupDate(string $dateTime): \DateTime
    {
        $dateTime = str_replace(['(', ')', 'UTC', 'at', '|'], '', $dateTime);

        return new \DateTime($dateTime);
    }
}
