<?php
/*
Побудувати систему таксі.

Клієнтський код повинен викликати тип доставки,
який у свою чергу віддаватиме машину відповідного типу,
яка матиме 2 методи (виведення моделі машини та виведення ціни).

Усього буде 3 типи таксі:
Економ
Стандарт
Люкс
*/

abstract class Creator
{
    abstract public function factoryMethod(): Car;

    public function someOperation(): string
    {

        $car = $this->factoryMethod();
        $price = $car->getPrice();
        $model = $car->getModel();
        return "Price is $price$ car model is $model.";
    }
}

class CreatorBudget extends Creator
{
    public function factoryMethod(): Car
    {
        return new BudgetCar();
    }
}

class CreatorStandard extends Creator
{
    public function factoryMethod(): Car
    {
        return new StandardCar();
    }
}

class CreatorLux extends Creator
{
    public function factoryMethod(): Car
    {
        return new LuxCar();
    }
}

interface Car
{
    public function getPrice(): int;

    public function getModel(): string;
}

class BudgetCar implements Car
{
    public function getPrice(): int
    {
        return 1;
    }

    public function getModel(): string
    {
        return 'Kia Rio';
    }
}

class StandardCar implements Car
{
    public function getPrice(): int
    {
        return 10;
    }

    public function getModel(): string
    {
        return 'Volkswagen Golf';
    }
}

class LuxCar implements Car
{
    public function getPrice(): int
    {
        return 100;
    }

    public function getModel(): string
    {
        return 'Mercedes S600';
    }
}

function clientCode(Creator $creator)
{
    echo $creator->someOperation();
}


echo "App: Launched with the CreatorBudget.\n";
clientCode(new CreatorBudget());
echo "\n\n";

echo "App: Launched with the CreatorStandard.\n";
clientCode(new CreatorStandard());
echo "\n\n";

echo "App: Launched with the CreatorLux.\n";
clientCode(new CreatorLux());