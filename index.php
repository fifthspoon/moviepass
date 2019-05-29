<!-- Start Page: -->
  <?php 
    include_once('./includes/movies.php');
    include_once('./includes/users.php');
    include_once('./includes/conn_mysql.php');
    include_once('./includes/movie_functions.php');
    include_once('./includes/user_functions.php');

    $movies = getAllMovies();

    // Start Session
    session_start();
    if (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)
    echo '<a href="admin/index.php"><input type="button" value="Admin Dashboard"></a>';
    
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MoviePass</title>
</head>
<body>


  <form id="bookings" name="bookings" method="post" action="purchaseTickets.php">
    <label for="name"></label><br />
    <input name="name" type="text" placeholder="Enter your name..." required><br /><br />

    <!--select array from the movies.php-->
    <label for="movies">Movie:</label><br />
    <select name="movies" required>
      <option value="null" selected>Select a movie</option>
      <?php
      #loops the movies array of movie objects from movies.php and prints the values
        foreach ($movies as $value) {
          echo "<option value='{$value->getId()}'>{$value->getName()} (Age: {$value->getAge()}) - Cost \${$value->getPrice()}</option>";
        }
      ?>
    </select><br /><br />
    
    <label for="tickets">Tickets:</label><br />
    <input name="tickets" type="number" min="1" max="99" required><br /><br />

    <input type="submit" value="Purchase Tickets">
  </form> <br />

  <a href="loginpage.php">
    <input type="button" value="Register or Login">
  </a>
  
</body>
</html>