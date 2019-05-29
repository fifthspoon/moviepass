<!-- Handles bookings -->

<?php 
include_once('includes/movies.php');
require("includes/conn_mysql.php");
require('includes/movie_functions.php');

// Start Session
   session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
    echo 'Admin';

if($_POST['name'] && $_POST['movies'] && $_POST['tickets']){
  
  $name = $_POST['name'];
  $movies = $_POST['movies'];
  $movie = getMovie($movies);
  $movieData = getMovieData($movies);
  $movieData['movieAge'];
  $movies = new Movie($movies, $movieData['movieName'], $movieData['movieAge'], $movieData['moviePrice']);
  
  if($movies === null){
    echo "Selected movie not found"; exit;
  }

  $tickets = $_POST['tickets'];

  if($movies){
    $conn = dbConnect();
    $userId = $_SESSION['userid'];
    $movieId = $movies->getId();
    $query = "INSERT INTO booking (bookingUserId, bookingMovieId)
    values($userId,$movieId)";

    $result = mysqli_query($conn,$query) or die("Query failed: $query");

    dbDisconnect($conn);

    successBooking($tickets, $movies);
  }
}

function successBooking($tickets, $movies){
  $totalPrice = $movies->getPrice() * $tickets;
  echo "You have booked {$tickets} tickets for the movie '{$movies->getName()}' for a total of \${$totalPrice}";
}

//takes each ID from the movies in the movies.php and checks to determine which one the user selected
function getMovie($movies){
  echo $movies;
}
?>