<!DOCTYPE html>
<html lang="sv">
<head>
 <title>Moviepass Login</title>
<meta charset="utf-8" />
</head>
<body>

<form action="checklogin.php" method="post">
    <h2>Login</h2>

    <label>User (e-mail):</label>
    <p><input type="email" name="txtUser" placeholder="user@user.com"></p>

    <label>Password:</label>
    <p><input type="password" name="txtPassword" placeholder="password"></p>

    <p><input type="submit" name="submit" value="login"></p>
</form>
</body>
</html>