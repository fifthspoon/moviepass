<?php 
include_once('movies.php');

if($_POST['name'] && $_POST['age'] && $_POST['movies'] && $_POST['tickets']){
  $age_groups = [7, 11, 15, 18];

  $name = $_POST['name'];
  $age = $_POST['age'];
  $selected_movie = $_POST['movies'];

  $movie = getMovie($movies, $selected_movie);
  
  if($movie === null){
    echo "Selected movie not found"; exit;
  }

  $tickets = $_POST['tickets'];
  $goingWithParent = $_POST['goingWithParent'] ?? false;

  if($age >= $movie->age){
    successBooking($tickets, $movie);
  }elseif($tickets <= 1 && $goingWithParent === true){
    echo "You need to buy more than 1 ticket if you're bringing a parent"; exit;
  }elseif ($age < $movie->age && $goingWithParent === false) {
    echo "You're too young to watch this movie without a parent."; exit;
  }elseif($age < $movie->age && $goingWithParent == true){
    $nextAgeGroup = null;
    
    //determines the age group you belong to
    foreach ($age_groups as $key => $value) {
      if($value <= $age){
        continue;
      }elseif($value > $age){
        $nextAgeGroup = $value;
        break;
      }
    }
    if($nextAgeGroup !== $movie->age){
      echo "You're too young to watch this movie without a parent."; exit;
    }else{
      successBooking($tickets, $movie);
    }
  }else{
    echo "You're too young to watch this movie without a parent."; exit;
  }
}

function successBooking($tickets, $movie){
  $totalPrice = $movie->price * $tickets;
  echo "You have booked {$tickets} tickets for the movie '{$movie->name}' for a total of \${$totalPrice}";
}

//takes each ID from the movies in the movies.php and checks to determine which one the user selected
function getMovie($movies, $id){
  foreach($movies as $movie) {
    if ($id == $movie->id) {
        return $movie;
    }
  }
  return null;
}
?>