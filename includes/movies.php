<!-- Object for all movies -->

<?php
  class Movie
  {
    private $id;
    private $name;
    private $age;
    private $price;

    //called when making a new instance of a movie
    public function __construct($id, $name, $age, $price)
    {
      $this->id = $id;
      $this->name = $name;
      $this->age = $age;
      $this->price = $price;
    }

    public function getId()
    {
      return $this->id;
    }

    public function setId($id)
    {
      $this->id = $id;
    }

    public function getName()
    {
      return $this->name;
    }

    public function setName($name)
    {
      $this->name = $name;
    }

    public function getAge()
    {
      return $this->age;
    }

    public function setAge($age)
    {
      $this->age = $age;
    }

    public function getPrice()
    {
      return $this->price;
    }

    public function setPrice($price)
    {
      $this->price = $price;
    }
  }
?>
