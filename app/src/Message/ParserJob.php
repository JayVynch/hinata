<?php 
namespace App\Message;

use App\Entity\Post;
use App\Scrapper\Source\Scraps;
use Carbon\Carbon;

class ParserJob
{
    protected $parse;

    public function __construct(Scraps $scrap)
    {
        $this->parse = $scrap;
    }

    public function handle()
    {
        // $entityManager = $doctrine->getManager();

        $store = new Post();

        $store->setTitle($this->parse->getTitle());
        $store->setImage($this->parse->getImage());
        $store->setDescription($this->parse->getDescription());
        $store->setCreatedAt(Carbon::now());
        $store->setUpdatedAt(Carbon::now());

        // // tell Doctrine you want to (eventually) save the Product (no queries yet)
        // $entityManager->persist($store);

        // // actually executes the queries (i.e. the INSERT query)
        // $e"ntityManager->flush();
        echo "we here" ;
    }
}
