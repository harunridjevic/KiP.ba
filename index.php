<!DOCTYPE html>

<html>

<head>

    <title>KIP.ba</title>
	
    <link rel="stylesheet" type="text/css" href="s.css">
	<meta charset="utf-8">
</head>

<body>

     <form action="login.php" method="post">

        <h2>PRIJAVA</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>Korisnicko ime</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Sifra</label>

        <input type="password" name="password" placeholder="Password"><br> 

        <button type="submit">Prijavi se</button>
		
		<a href="registration.php">Registracija</a>
     </form>

</body>

</html>