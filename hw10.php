<?php
//Відрефакторити приклад по принципу Dependency inversion:

interface DBGetData
{
    public function getData();
}

class Mysql implements DBGetData
{
    public function getData()
    {
        return 'some data from database';
    }
}

class Controller
{
    private $adapter;

    public function __construct(DBGetData $DBGetData)
    {
        $this->adapter = $DBGetData;
    }

    function getData()
    {
        $this->adapter->getData();
    }
}