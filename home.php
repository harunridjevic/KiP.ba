<?php 

session_start();
include "db_conn.php";

//Get all the articles
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
	$query1 = 'SELECT * FROM articles';
	$retval = mysqli_query(  $conn,$query1 );
 ?>

<!DOCTYPE html>

<html>

<head>
	<link rel="stylesheet" href="s.css">
    <title>KIP.ba</title>


	<link rel="stylesheet" href="style.css" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&display=swap" rel="stylesheet">
	
</head>

<body>
	<!--sidebar-->
	<div id="sidebar">
			<img id="logo" src="logo/logov1transparent.png">
			<!--SEARCH-->
			<form method="POST">
			<div id="search-div">
			<input type="text" id="search" name="search" placeholder="Pretraži..." action="wow.php">
			<button id="search-button" type="submit">
				<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="icon">
				<path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
				</svg>
			</button>
			</div>
			</form>
			
			<!--MAIN BUTTONS-->
			<div id="main-buttons">
				<button id="profile-button"onclick="location.href='logout.php';">
				<div id="button-circle">
					<svg id="button-icons" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
</svg>
				</div>
				<?php echo $_SESSION['user_name']; ?></button>
				<button id="profile-button">
				<div id="button-circle"><svg id="button-icons" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
</svg></div>
				

				Artikli</button>
				<button id="profile-button">
				<div id="button-circle">
				<svg id="button-icons"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 011.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.56.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.893.149c-.425.07-.765.383-.93.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 01-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.397.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 01-.12-1.45l.527-.737c.25-.35.273-.806.108-1.204-.165-.397-.505-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.107-1.204l-.527-.738a1.125 1.125 0 01.12-1.45l.773-.773a1.125 1.125 0 011.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

				</div>
				Opcije</button>
				<div id="profile-button" style="display:none"></div>
				<div id="profile-button" style="display:none"></div>
			</div>
			
			<!--BOTTOM BUTTONS-->
			<div id="bottom-buttons">
			<button id="add-button">
				<svg style="width:70px;"xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
</svg>

			</button>
			<button id="help">
				?
			</button>
			</div>
		</div>
		
	<!--main content-->
	<main>
		<table border="1">
		<tr>
			<th>Index</th>
			<th>Naziv</th>
			<th>Cijena</th>
			<th>Kontakt telefon</th>
	</tr>
	<?php
	
	//search system
	$pretraga="";
	if(isset($_POST['search'])and $_POST['search']!=""){
		$input = $_POST['search'];
		
		if(!empty($input)){
			$query2 = "SELECT * FROM articles WHERE naziv LIKE '%$input%'";
			$res = mysqli_query($conn,$query2);
			if(mysqli_num_rows($res)<1){
				echo "Nema rezultata";
				
			}else{
				while($row2 = mysqli_fetch_array($res)){
					echo "<tr>
					<td>{$row2['id']}</td>
					<td>{$row2['naziv']}</td>
					<td>{$row2['cijena']}</td>
					<td>{$row2['kontakt']}</td>
					</tr>";
				}
				
			}
		}
	}//if search is empty just write out all the articles
	else{
		while($row = mysqli_fetch_assoc($retval)) {
		  
		  echo "<tr>
					<td>{$row['id']}</td>
					<td>{$row['naziv']}</td>
					<td>{$row['cijena']}</td>
					<td>{$row['kontakt']}</td>
				</tr>";
		}	}
   ?>
	</main>
</body>

</html>

<?php 

}else{

     header("Location: index.php");

     exit();

}

 ?>