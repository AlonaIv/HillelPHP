<?php
interface AbstractFactory
{
    public function createLcdTv(): LcdTV;

    public function createLedTv(): LedTV;
}