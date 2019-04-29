<?php
//作为两个不兼容的接口之间的桥梁。这种类型的设计模式属于结构型模式，它结合了两个独立接口的功能。

interface BookInterface
{
    public function turnPage();

    public function open();

    public function getPage();
}

class Book implements BookInterface
{

    private $page;

    public function getPage()
    {
        return $this->page;
    }

    public function open()
    {
        $this->page = 1;
    }

    public function turnPage()
    {
        $this->page++;
    }
}

class EbookAdapter implements BookInterface
{
    protected $ebook;

    public function __construct(EbookInterface $ebook)
    {
        $this->ebook = $ebook;
    }

    public function open()
    {
        $this->ebook->unlock();
    }

    public function turnPage()
    {
        $this->ebook->pressNext();
    }

    public function getPage()
    {
        $this->ebook->getPage()[0];
    }
}

interface EbookInterface
{
    public function unlock();

    public function pressNext();

    public function getPage();
}


class Kindle implements EbookInterface{

    private $page = 1;
    private $totalPages = 100;

    public function getPage()
    {
        $this->page++;
    }

    public function pressNext()
    {
        return [$this->page, $this->totalPages];
    }

    public function unlock()
    {

    }
}
$kindle = new Kindle();
$book = new EBookAdapter($kindle);
$book->open();
$book->turnPage();


$book1 = new Book();
$book1->open();
$book1->turnPage();


class Target{
    public function connect(){
        echo "connect";
    }
}

class Adaptee{
    public function c_connect(){
        echo "c connect";
    }
}

class Adapter extends Target{
    protected $adatee;

    public function __construct(Adaptee $adatee)
    {
        $this->adatee = $adatee;
    }

    public function connect()
    {
        $this->adatee->c_connect();
    }
}

$adatee = new Adaptee();
$target = new Adapter($adatee);
$target->connect();