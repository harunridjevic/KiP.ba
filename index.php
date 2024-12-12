<!DOCTYPE html>
<html>
  <head>
    <title>KIP.ba</title>
    <link rel="stylesheet" type="text/css" href="css/s.css">
    <meta charset="utf-8">
  </head>
  <body>
    <form action="db/login.php" method="post">
      <h2>PRIJAVA</h2> <?php if (isset($_GET['error'])) { ?> <p class="error"> <?php echo $_GET['error']; ?> </p> <?php } ?> <label>Korisničko ime</label>
      <input type="text" name="uname" placeholder="User Name">
      <br>
      <label>Šifra</label>
      <input type="password" name="password" placeholder="Password">
      <br>
      <button type="submit">Prijavi se</button>
      <a href="pages/registration.php">Registracija</a>
    </form>
  </body>
</html>