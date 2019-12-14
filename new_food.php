<?php
     include 'connection.php';
     $conn = OpenCon();
    $msg = "";
    $name = "";
    $category = "";
    $price = "";
    $err = "";
    $perr = "";
    $cerr = "";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['add'])) {
        $name = $_POST['fname'];
        $category = $_POST['_category'];
        $price = $_POST['_price'];
        
        //validate phone no and email and name 
        /*if(!preg_match("/^[a-zA-Z0-9]*$/",$name )) {
            $eerr = "No special characters  are allowed";
        }*/
        if(!preg_match("/^[0-9]*$/",$price)) {
           // echo "jdcjh";   
            $perr = "Only digits are allowed";
        }
        else {  
            //echo "jdcjh";   
            $msg = "";
            $err = "";
            $perr = "";
            $cerr = "";

           // echo "jdc";    
            $q = "insert into food_item values (\"NULL\", \"$name\", \"$category\", \"$price\")";
            $r = $conn->query($q);
            //var_dump($r);
            if($r) {
                $msg = "Item Added Successfully";
                $name = "";
                $category = "";
                $price = "";
                $err = "";
                $perr = "";
                $cerr = "";
            }
        }

    }
    
?>
<html>
    <head>
		<title>New Food Item</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
        <div class="hero-image6">
		<div id="sideNavigation" class="sidenav">
			 <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			 <a href="index.html">Home</a>
			 <a href="menu.html">Menu</a>
			 <a href="login.html">Login</a>
			 <a href="about_us.php">About Us</a>
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
        <!--  has access to number of employees, customers visited per day, summary of all sales (total sales per day/month/year),
         summary of all food items sold per day .add new employees
         view current employee and edit their info.-->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <center>
            <h1><font color="white" size="8">Details<br><br></h1></font>
            <center>
            </center>
                <form id="tab" action="new_food.php" method = "POST">
                    <div class="container">
                        <font color="white" size="6">
                    <label>Name</label>
                    <input type="text" maxlength = "50" placeholder="Enter Name" class="input-xlarge" name='fname' value = "<?php echo $name;?>" required>
                   <br> <?php echo "<font color=\"red\" size=\"4\">".$err."</font>";?><br>
                    <label>Category</label>
                    <input type="text"  maxlength = "50" placeholder="Enter Category" class="input-xlarge" name='_category' value = "<?php echo $category;?>" required>
                    <br><?php echo "<font color=\"red\" size=\"4\">".$cerr."</font>";?><br>
                    <label>Price</label>
                    <input type="text"  maxlength = "11" placeholder="Enter Price" class="input-xlarge" name='_price' value = "<?php echo $price;?>" required>
                    <br><?php echo "<font color=\"red\" size=\"4\">".$perr."</font>";?><br>

                    <div>
                        <button class="btn btn-primary" name ='add'>Add</button>
                        <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="food_details.php"><font color="white">Go back</font></a></button>                        
                    </div>
                    <?php
                        echo "<font size=\"4\">".$msg."</font>";
                    ?>
                </form>
                </div>
                </div>
</div>
        </center></font>
    </body>     
</html>