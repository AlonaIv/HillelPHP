<?php
//Зробіть рефакторинг коду:

class Contact
{
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $address;

}

interface Builder
{
    public function name($name): Builder;

    public function surname($surname): Builder;

    public function email($email): Builder;

    public function phone($phone): Builder;

    public function address($address): Builder;
}

class ConcreteBuilder1 implements Builder
{
    private $contact;

    public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->contact = new Contact();
    }

    public function name($name): Builder
    {
        $this->contact->name = $name;
        return $this;
    }

    public function surname($surname): Builder
    {
        $this->contact->surname = $surname;
        return $this;
    }

    public function email($email): Builder
    {
        $this->contact->email = $email;
        return $this;
    }

    public function phone($phone): Builder
    {
        $this->contact->phone = $phone;
        return $this;
    }

    public function address($address): Builder
    {
        $this->contact->address = $address;
        return $this;
    }

    public function build(): Contact
    {
        $result = $this->contact;
        $this->reset();

        return $result;
    }
}

$contact = new ConcreteBuilder1();
$newContact = $contact->phone('000-555-000')
    ->name("John")
    ->surname("Surname")
    ->email("john@email.com")
    ->address("Some address")
    ->build();

//var_dump($newContact);
