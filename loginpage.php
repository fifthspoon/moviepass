<!DOCTYPE html>
<html lang="sv">
<head>
 <title>Moviepass Login</title>
<meta charset="utf-8" />
</head>
<body>

<form action="checklogin.php" method="post">
    <h2>Login</h2>

    <label>Email:</label>
    <p><input type="email" name="uName" placeholder="user@user.com"></p>

    <label>Password:</label>
    <p><input type="password" name="uPass" placeholder="password"></p>

    <p><input type="submit" name="submit" value="Login"></p>
</form>

<form action="register.php">
   <h2>Register</h2>

    <label>Email:</label>
    <p><input type="email" name="uName" placeholder="user@user.com"></p>

    <label>Password:</label>
    <p><input type="password" name="uPass" placeholder="password"></p>

    <p><input type="submit" name="submit" value="Register"></p>
    </form>
</body>
</html>