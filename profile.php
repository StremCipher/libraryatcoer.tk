<!DOCTYPE html>
<html lang="en">
<?php
	session_start();
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
            <h3>welcome  to coer library new</h3>
        </div>
    </div>
	
</head>
<body>
    <button type="button" class="btn btn-primary btn-lg" id="logout" >Logout</button>
	<script>
		function myFunction(a,b,c,d,e) {
			var table = document.getElementById("myTable");
			var row = table.insertRow(1);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var cell4 = row.insertCell(3);
			var cell5 = row.insertCell(4);
			cell1.innerHTML = a;
			cell2.innerHTML = b;
			cell3.innerHTML = c;
			cell4.innerHTML = d;
			cell5.innerHTML = e;
		}
	</script>
	<table class="table table-bordered" id="myTable">
		<thead>
			<tr>
				<th width="50%">book-id</th>
				<td width="10%">book-name</td>
				<td width="10%">issued-date</td>
				<td width="10%">returned</td>
				<td width="10%">fine</td>
				<!-- <td width="10%">email_verified</td> -->
			</tr>
		</thead>
	</table>
    <?php
        if(isset($_SESSION["logged_in"])){
			// echo("loggednin");
            $con=mysqli_connect('localhost','u807033583_libraryatcoer','w5V3VYZiY_Y2XYk','u807033583_libraryatcoer');
			// proint each book details
			$username=$_SESSION["Coer-ID"];
			$sql = "SELECT * FROM $username";
			$result = $con->query($sql);
			if(($result->num_rows)> 0){
				while($row = $result->fetch_assoc()) {
					// echo "<br> book id: ". $row["book_id"]. " - book name= ". $row["book_name"]. " issued date= " . $row["issued_date"] .  " return date= " . $row["returned_date"] .   "fine = " . $row["fine"] ."<br>";
					$a=$row["book_id"];
					$b=$row["book_name"];
					$c=$row["issued_date"];
					$d=$row["returned_date"];
					$e=$row["fine"];
					echo("<script >myFunction('$a','$b','$c','$d','$e')</script>");
				}
			}
        }
    ?>
    <script>
        $("#logout").click(function(){
            window.location.replace("logout.php");
        });
    </script>
</body>
</html>