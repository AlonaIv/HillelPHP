<?php
class SonyLedTV implements LedTV
{
    public function turnOnNetflix(): string
    {
        return "Netflix on Sony LED TV";
    }
}