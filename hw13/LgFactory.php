<?php
class LgFactory implements AbstractFactory
{
    public function createLcdTv(): LcdTV
    {
        return new LgLcdTV();
    }

    public function createLedTv(): LedTV
    {
        return new LgLedTV();
    }
}