<?php
    include 'connection.php';
    $conn = OpenCon();

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "select * from food_item";
    $result = $conn->query($query);
?>
<html>
    <head>
		<title>Food Details</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
        <div class ="hero-image6">
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
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <center>
            <h1><font color="white" size="8">Food Details<br><br></h1></font>
            <br>
            <form method = "POST" action = "food_details.php">
                <div class="container">
                    <font color="white" size="6">
            <?php
                if($result->num_rows == 0) {
                    echo "<strong>No food items found!<br><br></strong>";
                } 
                else {
                    echo "<table style=\"color:#ffffff\" class=\"table\">
                    <thead class=\"thead-dark\">
                      <tr>
                        <th scope=\"col\">Food ID</th>
                        <th scope=\"col\">Name</th>
                        <th scope=\"col\">Category</th>
                        <th scope=\"col\">Price</th>
                        <th scope=\"col\">Actions</th>
                      </tr>
                    </thead>
                    <tbody>";
                while($row = $result->fetch_assoc()) {
                    $id = $row['f_id'];
                      echo "<tr>
                        <th scope=\"row\">".$row['f_id']."</th>
                        <td>".$row['f_name']."</td>
                        <td>".$row['category']."</td>
                        <td>".$row['price']."</td>
                        <td><input type=\"hidden\" name=\"getid\" value=\"$id\"/>
                        <input type=\"submit\"  name=\"$id\" value= \"&#x2717\" /></td>
                         
                      </tr>";
                    }
                    echo "</tbody>
                    </table>";
                }
                if(isset($_POST['getid'])) {
                        $id = $_POST['getid'];
                        $sql = "delete from food_item where f_id = \"$id\"";
                        $success = $conn->query($sql);
                        if($success) {
                            echo "Food Item deleted successfully!<br><br>";
                            //header('Location: ./food_details.php'); 
                            $URL="http://localhost/rms/food_details.php";
echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">'; 
                        }
                    }
            ?>
            
                    <div>
                        <button class="btn btn-primary" name ="add"><a style="text-decoration:none" href="new_food.php"><font color="white">Add new</a></font></button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="a_info.php"><font color="white">Go back</font></a></button>                        
                    </div>
                </font>
                </div>
            </div>
            </form>
        </center>
    </body>     
</html>