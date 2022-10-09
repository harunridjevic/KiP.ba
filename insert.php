<?php
		session_start();
        include "db_conn.php";

         
        
        $naziv =  $_REQUEST['naziv'];
        $cijena =  $_REQUEST['cijena'];
		$lokacija =  $_REQUEST['lokacija'];
		$kategorija =  $_REQUEST['kategorija'];
		$opis =  $_REQUEST['opis'];
		$kontakt =  $_REQUEST['kontakt'];
		$kreator =  $_SESSION['user_name'];
		
        $sql = "INSERT INTO articles(naziv,cijena,lokacija,kategorija,opis,kontakt,kreator) VALUES ('$naziv','$cijena','$lokacija','$kategorija','$opis','$kontakt','$kreator')";
        
        mysqli_query($conn, $sql);
        
        // Close connection
        
		$sql = "SELECT ID AS LastID FROM articles WHERE ID = @@Identity;";
        $test= mysqli_query($conn, $sql);
		$id = mysqli_fetch_row($test)[0];
		echo $id;
        if($_FILES['image']['name'])
{
		 $save_path="C:/xampp/htdocs/kip.baPrototype/img/"; // Folder where you wanna move the file.
  $myname = strtolower($id.".jpg"); //You are renaming the file here
  move_uploaded_file($_FILES['image']['tmp_name'], $save_path.$myname); // Move the uploaded file to the desired folder
  
  }
		header("Location: home.php");
		mysqli_close($conn);
		exit();
        ?>