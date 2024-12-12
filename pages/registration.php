<!DOCTYPE html>
<html>
  <head>
    <title>KIP</title>
    <link rel="stylesheet" href="../css/s.css" type="text/css">
  </head>
  <body>
    <form action="../db/registration_method.php" method="post">
      <h2>REGISTRACIJA</h2> <?php if (isset($_GET['error'])) { ?> <p class="error"> <?php echo $_GET['error']; ?> </p> <?php } ?> <label>Korisnicko ime</label>
      <input type="text" name="uname" placeholder="User Name">
      <br>
      <label>Sifra</label>
      <input type="password" name="password" placeholder="Password">
      <br>
      <button type="submit">Registruj se</button>
      <a href="../index.php">Prijava</a>
    </form>
  </body>
</html>