<?php 

session_start(); 

include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
    
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        header("Location: ../pages/registration.php?error=User Name is required");

        exit();

    }else if(empty($pass)){

        header("Location: ../pages/tration.php?error=Password is required");

        exit();

    }else{
		$sql = "SELECT * FROM users WHERE user_name='$uname'";

		$result = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($result)===0){
		$sql = "INSERT INTO users(user_name,password) VALUES ('$uname','$pass')";
        $result = mysqli_query($conn, $sql);
		
          
		header("Location: ../index.php");
		exit();
		}else{
			header("Location: ../pages/registration.php?error=Username is taken");

        exit();
		}
        
    }

}else{

    header("Location: ../index.php");

    exit();

}
