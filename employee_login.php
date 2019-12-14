<?php
    session_start();
    $message = "";
    /*$host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "rms";
    $conn = new mysqli ($host, $user, $pass, $dbname);*/
    include 'connection.php';
    $conn = OpenCon();
    $_SESSION["email"] = "";
    $_SESSION["passwd"] = "";
    

    /*if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }*/
    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = '';
        if(isset($_POST['employ'])) {
            if($_POST['employ'] == 'Manager') {
               $role = 'm';
            }
            else if($_POST['employ'] == 'Waiter') {
                $role = 'w';
            }
            else if($_POST['employ'] == 'Chef') {
                $role = 'c';
            }
            else if($_POST['employ'] == 'Delivery Boy') {
                $role = 'd';
            }
        }
       // var_dump($role);
        $query = "select * from employee where email=\"$email\" and passwd=\"$password\" and role=\"$role\"";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['passwd'] = $password;
            if($role == 'm') {
                $message = "Login Successfull";
            }
            else {
                $message = "Login successfull";
            }
        }
        else {
            $message = "Invalid email/password";
        }
    }


    
?>	

<!DOCTYPE html> 
<html> 
    <head>
		<title>Login</title>
		<link rel="stylesheet" href="style.css">
	</head>
  
    <body> 
        <div class="hero-image3">
        <div id="sideNavigation" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="index.html">Home</a>
            <a href="menu.html">Menu</a>
            <a href="login.html">Login</a>
            <a href="about.html">About Us</a>
        </div>
        
        <nav class="topnav">
            <a href="#" onclick="openNav()">
                <svg width="30" height="30" id="icoOpen">
                <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                    <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                    <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                </svg>
            </a>
        </nav>

        <script src="script.js"></script>
        <center>
        <h1><font color="white" size = "10">Login Form</h1> </font><br>
        <!--Step 1 : Adding HTML-->
        <form action="employee_login.php" method = "POST">   
            <div class="container"> 
            <font color="white" size = "6">
                <label><b>Email</b></label> <br>
                <input type="text" placeholder="Enter Email" name="email" required> <br><br>

                <label><b>Password</b></label> <br>
                <input type="password" placeholder="Enter Password" name="password" required> <br><br></font>
                <font color="white" size="6">
                <input type='radio' name='employ' value='Manager' />Manager<br>
                <input type='radio' name='employ' value='Waiter'/>Waiter<br>
                <input type='radio' name='employ' value='Chef' />Chef<br>
                <input type='radio' name='employ' value='Delivery Boy' />Delivery boy<br><br></font>
                <font color="white">
                <button type="submit" name='submit'>Login</button> <br>
                <button type="button" class="btn btn-success"><a style="text-decoration:none" href="login.html"><font color="white">Back</font></a></button><br><br>
                <!--<input type="checkbox" checked="checked"> Remember me -->
            </div> 
            <?php
                echo $message;
                if($message == "Login Successfull") {
                    echo "<script>
                            window.location=\"em_info.php\";
                        </script>";
                }
                else if($message == "Login successfull") {
                    echo "<script>
                            window.location=\"e_info.php\";
                                </script>";
                }
                //manager - em_info
                //others  - e_info*/
            ?>
    
        </center>
        </form> 
            </font>
            </div>
    </body> 
  
</html> 
