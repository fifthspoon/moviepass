<!-- Object for all users -->

<?php
  class User
  {
    private $id;
    private $name;
    private $password;

    //called when making a new instance of a user
    public function __construct($id, $name, $password)
    {
      $this->id = $id;
      $this->name = $name;
      $this->password = $password;
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

    public function getPassword()
    {
      return $this->password;
    }

    public function setPassword($password)
    {
      $this->password = $password;
    }
  }
?>
