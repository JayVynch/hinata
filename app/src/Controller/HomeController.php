<?php

namespace App\Controller;

use App\Message\ParserJob;
use App\Scrapper\Source\Scrapper;
use App\Scrapper\Source\Scraps;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Source;

class HomeController extends AbstractController
{

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/fetches", name="fetch")
     */
    public function fetch(MessageBusInterface $bus)
    {
        $parse = new Scrapper();
        $filter = $parse->scrapDom('https://highload.today');

        $parser = $filter->filter('.lenta-item');


        foreach ($parser as $notification) {
            $scraps = new Scraps($notification); 

            $bus->dispatch(new ParserJob($scraps));
            dump("yeay");
        }
        return $this->render('home/index.html.twig', [
            'parser' => 'I am here',
        ]);
    }
}
