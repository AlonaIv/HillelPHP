<?php
/*
Створіть клас User, який буде мати private поля $name, $age, $email і матиме __call метод.
Так само клас буде мати приватні методи: setName, setAge.

Метод __call повинен перевірити, що якщо ви викликаєте не існуючий метод, наприклад setEmail,
то він вам виведе повідомлення що такого методу не існує, в інших випадках методи повинні виконатися.
Отримати дані користувача я можу через public function getAll()

Повідомлення має бути кастомним Exception

Всю конструкцію викликів використовувати в try catch
 */

class User
{
    private $name;
    private $age;
    private $email;

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            call_user_func([$this, $name], $arguments[0]);
        } else {
            throw new Exception("Method $name doesn't exist.");
        }
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
        $this->age = $age;
    }

    public function getAll()
    {
        return ["Name" => $this->name, "Age" => $this->age, "Email" => $this->email];
    }
}

//Testing
//$obj = new User;

//try {
//    $obj->setName("Alona");
//    $obj->setAge(22);
//    $obj->setEmail('alona@gmail.com');
////    var_dump($obj->getAll());
//} catch (Exception $e) {
//    echo $e->getMessage();
//    echo $e->getLine();
//}
//
//
//var_dump($obj->getAll());


