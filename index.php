<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>MoviePass</title>
</head>
<body>

  <?php 
    include_once('movies.php');
  ?>

  <form id="bookings" name="bookings" method="post" action="purchaseTickets.php">
    <label for="name">Name:</label><br />
    <input name="name" type="text" placeholder="Enter your name..." required><br /><br />

    <label for="age">Age:</label><br />
    <input name="age" type="number" min="0" max="150" placeholder="Enter your age..." required><br /><br />

    <!--select array from the movies.php-->
    <label for="movies">Movie:</label><br />
    <select name="movies" required>
      <option value="null" selected>Select a movie</option>
      <?php
      #loops the movies array of movie objects from movies.php and prints the values
        foreach ($movies as $value) {
          echo "<option value='{$value->id}'>{$value->name} (Age: {$value->age}) - Cost \${$value->price}</option>";
        }
      ?>
    </select><br /><br />
    
    <label for="tickets">Tickets:</label><br />
    <input name="tickets" type="number" min="1" max="99" required><br /><br />

    <label for="goingWithParent">Are you going with a person 18+?</label><br />
    <input name="goingWithParent" type="checkbox"><br /><br />

    <input type="submit" value="Purchase Tickets">
  </form>
  
</body>
</html>