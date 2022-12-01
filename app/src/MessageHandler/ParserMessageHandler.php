<?php
namespace App\MessageHandler;

use App\Message\ParserJob;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class ParserMessageHandler implements MessageHandlerInterface
{
    public function __invoke(ParserJob $parser)
    {
        $parser->handle();   
    }
}
