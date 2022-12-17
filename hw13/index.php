<?php
/*Розробити структуру класів за допомогою патерну Абстрактна фабрика.

ТЗ:
Має бути 2 фабрики (Sony, LG) котрі створюють сімейство телевізорів:
LED TV
LCD TV

Метода класів робимо максимально простими.
Всі класи та інтерфейси мають бути в окремих файлах
*/
spl_autoload_register(function ($name) {
    include $name . '.php';
});

function clientCode(AbstractFactory $factory, string $type)
{
    if ($type == "LCD") {
        $LcdTV = $factory->createLcdTv();
        echo $LcdTV->turnOnNetflix() . "\n";
    } elseif ($type == "LED") {
        $LedTV = $factory->createLedTv();
        echo $LedTV->turnOnNetflix() . "\n";
    } else {
        echo "TV with this type doesn't exist.";
    }

}

//Testing
echo "Client: Testing client code with LG LCD TV:\n";
clientCode(new LgFactory(), 'LCD');
echo "\n";
echo "Client: Testing client code with LG LED TV:\n";
clientCode(new LgFactory(), 'LED');
echo "\n";
echo "Client: Testing client code with Sony LCD TV:\n";
clientCode(new SonyFactory(), 'LCD');
echo "\n";
echo "Client: Testing client code with Sony LED TV:\n";
clientCode(new SonyFactory(), 'LED');
echo "\n";
echo "Client: Testing client code with Sony OLED TV:\n";
clientCode(new SonyFactory(), 'OLED');