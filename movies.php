<?php
  class Movie
  {
    public $id;
    public $name;
    public $age;
    public $price;

    //called when making a new instance of a movie
    function __construct($id, $name, $age, $price)
    {
      $this->id = $id;
      $this->name = $name;
      $this->age = $age;
      $this->price = $price;
    }
  }

  $movies = array(
    new Movie(1, 'Frozen', 7, 500),
    new Movie(2, 'Avengers', 11, 1337),
    new Movie(3, 'Saw', 15, 666)
  )
?>