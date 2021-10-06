<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
    if(isset($_SESSION["logged_in"])){
        header("Location:profile.php");
    }
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		$con=mysqli_connect('localhost','u807033583_libraryatcoer','w5V3VYZiY_Y2XYk','u807033583_libraryatcoer');
		if($con);
		else
			echo "failed to connect to database";
		$username=$_POST['Coer-ID'];
		$password=$_POST['Password'];

		$sql = "SELECT id,username, password FROM 1_user";
		$result = $con->query($sql); 

		if ($result->num_rows > 0) {
			$fnd=0;
			while($row = $result->fetch_assoc()) {
				// echo "<br> id: ". $row["id"]. " - username= ". $row["username"]. " password= " . $row["password"] . "<br>";
				if($row["username"]==$username and $row["password"]==$password){    
					$_SESSION["Coer-ID"] = $username;
                    $_SESSION["registration-going-on"]="0";
					$fnd=1;
                    $_SESSION["logged_in"]="1";
					echo "logged in succesfully... redirecting to home page";
        			echo "<script>setTimeout(\"location.href = 'profile.php';\",3000);</script>";
				}
			}
			if($fnd==0)
				echo("<script>alert('username password not matches')</script>");

		}
		else {
			echo("<script>alert('username password not matches')</script>");
		}
		$con->close();
	}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
    <!--  adding bootstrap  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <div class="nav-bar">
        <div class="title">
            <h3>welcome to coer library</h3>
        </div>
    </div>
</head>
<body>
    <!-- <div class="form">    
        <form action="login.php" method="POST">
            <label><b>Login To Coer-Library</b></label>  
            <hr class="first">
            <label><b>Coer-ID</b></label>    
            <input type="text" name="Coer-ID" placeholder="Coer-ID" required id="Coer-ID " class="float-left1">    
            <br><br>    
            <label><b>Password</b></label>
            <input type="Password" name="Password"  placeholder="Password" required id="password" class="float-left1">       
            <br><br>    
            <button type="submit" name="login" value="login">Log In</button>      
            <a href="register.php">Create Account</a> 
        </form>     
    </div>    -->
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form> 
</body>
</html>