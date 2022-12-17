<?php
class SonyFactory implements AbstractFactory
{
    public function createLcdTv(): LcdTV
    {
        return new SonyLcdTV();
    }

    public function createLedTv(): LedTV
    {
        return new SonyLedTV();
    }
}