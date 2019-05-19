<!-- Admin subclass -->

<?php
 class admins extends users
 {
     private $admin;

     public function __construct($id, $name, $password, $admin)
     {
         $this->admin = $admin;
         parent::__construct($id, $name, $password)
     }

     public function setAdmin($admin)
     {
         $this->admin= $admin
     }

     public function getAdmin()
     {
         return $this->$admin
     }

 }
 
 ?>