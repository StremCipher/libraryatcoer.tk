    
    <?php
        session_start();
        if(isset($_SESSION["logged_in"])){
            header("Location:profile.php");
        }
            $con=mysqli_connect('localhost','u807033583_libraryatcoer','w5V3VYZiY_Y2XYk','u807033583_libraryatcoer');
            if(!$con)
                echo ("failed to connect to database");
            $username=$_SESSION['Coer-ID'];
            $password=$_SESSION['Password'];
            $email=$_SESSION['Email'];
            $query="insert into 1_user(username,email,password) values('$username','$email','$password')";
            $sql = "SELECT id,username, password FROM 1_user";
            $result = $con->query($sql);

            $conn=mysqli_connect('localhost','u807033583_libraryatcoer','w5V3VYZiY_Y2XYk','u807033583_libraryatcoer');
            $sql = "CREATE TABLE $username (
                id INT(6) AUTO_INCREMENT PRIMARY KEY,
                book_id varchar(255),
                book_name varchar(255),
                issued_date varchar(255),
                returned_date varchar(255),
                fine INT(10)
            )";

                // you must convert username to text if it is in int format else it is giving error
            // echo($username);
            if(mysqli_query($con,$query)){
                if(mysqli_query($conn,$sql)){
                    echo("<script>alert('account created')</script>");
                    $_SESSION["registration-going-on"]="0";
                    $_SESSION["logged_in"]="1";
                    echo "<script>setTimeout(\"location.href = 'profile.php';\",1);</script>";
                }else{
                    echo("<script>alert('registration failed')</script>"); 
                }                   
            }
            else{
                $username="sign in";
                echo("<script>alert('registration failed email already exist')</script>");
                echo "<script>setTimeout(\"location.href = 'register.php';\",1);</script>";
            }

    ?>