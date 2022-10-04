<?php
 
        include "db_conn.php";

         
        
        $naziv =  $_REQUEST['naziv'];
        $cijena =  $_REQUEST['cijena'];
		$kontakt =  $_REQUEST['kontakt'];
		
        $sql = "INSERT INTO articles(naziv,cijena,kontakt) VALUES ('$naziv','$cijena','$kontakt')";
         
        mysqli_query($conn, $sql);
        
        // Close connection
        mysqli_close($conn);
		header("Location: home.php");

		exit();
        ?>