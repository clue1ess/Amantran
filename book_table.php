<?php
  session_start();
  include 'connection.php';
   $conn = OpenCon();
  //echo $_SESSION["email"];
  date_default_timezone_set('Asia/Calcutta');
  $email = $_SESSION["email"];
  $password = $_SESSION["passwd"];
  $message = "";
  $err = "";
  // $time = $_POST['time'];
  $date=date('Y-m-d');  
  //Converts date to 'yyyy-mm-dd' acceptable to mysql
  $time=date('H:i',time()); 
  $time = strtotime($time);
   
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  if(isset($_POST['book'])) {
    $q = "select * from customer where email=\"$email\" and passwd = \"$password\"";
    $r = $conn->query($q);
    $row = $r->fetch_assoc();
    $id = $row['c_id'];
    $c = $_POST['cap'];
    $d = $_POST['date'];
    $t = $_POST['time'];
      $q = "select * from table_ where capacity >= \"$c\" order by capacity";
      $r = $conn->query($q);

      if($r->num_rows == 0) {
        $message = "No table available";
      }
      else {
        $row = $r->fetch_assoc();
        $tb = $row['t_no'];
        
        $q = "insert into book_table values (\"$tb\", \"$id\", \"$d\", \"$t\", \"$c\")";
    $r = $conn->query($q);
    if($r) {
      
        $message = "Table is Booked!";
    }
      }
    }

  
?>
<html>
<head>
		<title>Book table</title>
		<link rel="stylesheet" href="style.css">
	<style>
	table{
	border-style:solid;
	border-width:2px;
	border-color:pink;
	}
	</style>
	</head>
	<body>
  <div class="hero-image6">
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
        <!------ Include the above in your HEAD tag ---------->

	<form action="book_table.php" method="POST">
<div class="container">
<center>
<font color="white" size="6">
            <label for='date' ><h4>DATE : </h4></label><br>
            <input type='date' name='date' id='date' size="10" style="height: 20px;" min="<?php echo $date;?>" required/> <br><br>
            <label>TIME SLOT :</label>
             <select id = "myList" name="time" required>
               <?php
               
           $start=strtotime('16:00');
           $end=strtotime('23:30');
           for ($halfhour=$start;$halfhour<=$end;$halfhour=$halfhour+30*60) {
            
               printf('<option value="%s">%s</option>',date('H:i',$halfhour),date('g:i a',$halfhour));
            
            }
               ?>
             </select>
             <label for='capacity' ><h4>Capacity</h4></label><br>
            <input type='number' name='cap' id='cap' size="10" style="height: 30px;" min="1" max="10" required/> <br><br>
            <?php
              echo $message;
            ?>
            <br><br>
            <button class="btn btn-primary" name ='book'><font color="white">Book Table</font></button>
            <button type="button" class="btn btn-primary"><a style="text-decoration:none" href="user_welcome.php"><font color="white">Back</font></a></button><br><br>

            
            
 
	</form> 
</body>
</div></div></center>
</html>
<?php
  

  