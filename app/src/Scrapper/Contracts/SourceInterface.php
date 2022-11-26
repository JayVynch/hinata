<?php
namespace App\Scrapper\Contracts;

Interface SourceInterface
{
    public function getUrl($url): string;
    public function getName(): string;
    public function getWrapperSelector(): string;
    public function getTitleSelector(): string;
    public function getDescSelector(): string;
    public function getDateSelector(): string;
    public function getLinkSelector(): string;
    public function getImageSelector(): string;
}