<?php

interface Loggable
{
   public function log(string $message);
}

trait TimeTrait
{
   public function getTime()
   {
      return date("H:i:s");
   }
}

class Logger implements Loggable
{

   private static $instance = null;

   private function __construct() {}

   public static function getInstance()
   {
      if (self::$instance === null) {
         self::$instance = new Logger();
      }
      return self::$instance;
   }

   public function log(string $message)
   {
      echo "[LOG] $message <br>";
   }
}

class Product
{

   use TimeTrait;

   public $name;
   private $price;

   protected static $count = 0;

   public function __construct($name, $price)
   {
      $this->name = $name;
      $this->price = $price;
      self::$count++;
   }

   public function show()
   {
      echo "Product: {$this->name}, Price: {$this->price} <br>";
   }

   public function getPrice()
   {
      return $this->price;
   }

   public static function getCount()
   {
      return self::$count;
   }

   public function __toString()
   {
      return $this->name;
   }
}

class DiscountProduct extends Product
{

   public $discount;

   public function __construct($name, $price, $discount)
   {
      parent::__construct($name, $price);
      $this->discount = $discount;
   }

   public function show()
   {
      $newPrice = $this->getPrice() - $this->discount;
      echo "Discount Product: {$this->name}, New price: {$newPrice} <br>";

      Logger::getInstance()->log("Знижка застосована");
   }
}

$p1 = new Product("Apple", 10);
$p2 = new DiscountProduct("Milk", 20, 5);

$p1->show();
$p2->show();

echo "Усього створено товарів: " . Product::getCount() . "<br>";

echo "Магічний метод: " . $p1;
