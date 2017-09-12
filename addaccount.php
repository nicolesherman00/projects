<!-- REGISTRATION CHECK-->
<?php
require_once("dbconnect.inc");
$_Session['loginstatus']="";
$AddEmail=$_POST['AddEmail'];
$AddPass=$_POST['AddPass'];

$sql="insert into login (usernameID,passwordID) values ('$AddEmail', '$AddPass')";
$result=mysql_query($sql) or die("Error in adding account: ".mysql_error());

$mess="<p>Account for $AddEmail successfully created</p>";
?>

<!--END REG.-->
<!DOCTYPE html>
<html lang="en">
<head>
<!--DATABASE CONNECT-->
<?php
$conn=mysql_connect("localhost", "root", "") or die("Cannot connect to local host");
mysql_select_db("ecpi", $conn) or die("Cannot connect to ecpi database");
?>
<!--END CONNECT-->


  <title>ECPI 3D Printer Lab</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  
  		<!-- Custom Stylesheet -->
	<link rel="stylesheet" type="text/css" href="Stylesheet.css" />	
	

</head>
<body>
<!-- NAVIGATION -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
     <a href="https://www.ecpi.edu">		
			<img src="brand1.png" alt="ECPI Logo" >
		</a>
				
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
		
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>
			<a href="#studentModalLogin" data-toggle="modal" data-target="#studentModalLogin"><span class="glyphicon glyphicon-user"></span> Student Login</a>
		</li>
		<li>
			<a href="#instructorModalLogin" data-toggle="modal" data-target="#instructorModalLogin"><span class="glyphicon glyphicon-user"></span> Instructor Login</a>
		</li>
		<li>
			<a href="#myModalRegister" data-toggle="modal" data-target="#myModalRegister"><span class="glyphicon glyphicon-log-in"></span> Register</a>
		</li>
      </ul>
    </div>
  </div>
</nav>

<!--STUDENT LOGIN MODAL -->
<div class="modal fade" id="studentModalLogin">
	<div class="modal-dialog">
		<form class="modal-content animate" method="post"action="loginverify.php" data-toggle="validator" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Student Log-in</h4>
				</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input class="form-control" id="InputEmail1" placeholder="Enter email" type="email" required>
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input class="form-control" id="InputPassword" placeholder="Password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				</div>
				<div class="form-group">
					<label for="IDNumber">ID Number</label>
					<input class="form-control" id="IDNumber" placeholder="ID Number" type="number" required>
				</div>
				<p class="text-right"><a href="#">Forgot password?</a></p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Log-in</button>
				<button data-dismiss="modal" class="btn" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
			  <?php echo htmlentities($user_message) ?>
			</div>
		  </div>
		</form>  
	</div>
</div>


<!-- END STUDENT LOGIN MODAL -->

<!--INSTRUCTOR LOGIN MODAL -->
<div class="modal fade" id="instructorModalLogin">
	<div class="modal-dialog">
		<form class="modal-content animate" method="post"action="loginverify.php" data-toggle="validator" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Instructor Log-in</h4>
				</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input class="form-control" id="InputEmail1" placeholder="Enter email" type="email" required>
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input class="form-control" id="InputPassword" placeholder="Password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
				</div>
				<div class="form-group">
					<label for="IDNumber">ID Number</label>
					<input class="form-control" id="IDNumber" placeholder="ID Number" type="number" required>
				</div>
				<p class="text-right"><a href="#">Forgot password?</a></p>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Log-in</button>
				<button data-dismiss="modal" class="btn" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
			  
			</div>
		  </div>
		</form>  
	</div>
</div>

<?php
$mess="Please enter your login info";

if(isset($_GET['m'])){
    $mess=$_GET['m'];
    }
 ?>

<!--END INSTRUCTOR LOGIN MODAL -->
	
<!-- REGISTER MODAL -->
<div class="modal fade" id="myModalRegister">
	<div class="modal-dialog">
		<form class="modal-content animate" method="post" action="registerverify.html" data-toggle="validator" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Register User</h4>
				</div>
				<div class="modal-body">
				
					<div class="form-group">
						<label for="InputEmail1">Email address</label>
						<input class="form-control" id="InputEmail1" placeholder="Enter email" type="email" required>
					</div>
					<div class="form-group">
						<label for="InputPassword">Password</label>
						<input class="form-control" id="InputPassword" placeholder="Password" type="password" name="psw" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="form.cPsw.pattern = this.value;">
					</div>
					<div class="form-group">
						<label for="InputPasswordVerify">Verify Password</label>
						<input class="form-control" id="InputPasswordVerify" placeholder="Verify Password" type="password" name="cPsw" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
					</div>
					<div class="form-group">
						<label for="userType"></label>
						<select class="form-control" id="userType" placeholder="User Type" required>
						<option value="studentUser"> Student/Alumni   </option>
						<option value="InstructorUser"> Instructor   </option>
						<option value="otherUser"> Other </option>
						
						</select>
					</div>
				</div>
				
				<div class="modal-footer">
				  
					 <button type="submit" name="button" id="button" class="btn btn-primary">Register</button>
					

					

					
					
					<button data-dismiss="modal" class="btn" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
	
	
	
<!-- END REGISTER MODAL -->



<!-- END NAVIGATION -->


<div class="jumbotron" id="jumbo">
<div class="container" id="blueBackground">
	<h1>HOMEPAGE WITH INFO ABOUT THE 3D LAB</h1>

	<div class="row">
		<div class="col-lg-1">
		</div>
		<div class="col-lg-5">
		<h4>THIS PAGE WILL INCLUDE A SECTION FOR UPDATES IN THE FIELD OF 3D PRINTING</h4>
			<p>*THIS INFORMATION IS COPIED FROM A WEBSITE: (but is some useful content if we want to re-word it)* The creation of a 3D printed object is achieved using additive processes. In an additive process an object is created by laying down successive layers of material until the object is created. Each of these layers can be seen as a thinly sliced horizontal cross-section of the eventual object.</p>
			<p>
				<a class="btn btn-primary btn-lg">Learn more</a>
			</p>
		</div>
		<div class="col-lg-5">
			<iframe width="500" height="281" src="https://www.youtube.com/embed/kaNzRaGFrM0" frameborder="0" allowfullscreen></iframe>
		</div>	
		<div class="col-lg-1">
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
		<!-- BEGIN UPDATES CAROUSEL -->	

			<div id="updatesCarousel" class="carousel slide" data-ride="carousel">
				
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<h3> UPDATE 1 </h3>  
						<p>Add updates about the 3D printer lab here. </p>
					</div>

					<div class="item">
						<h3> UPDATE 2 </h3>  
						<p>Add updates about the 3D printer lab here.</p>
					</div>

					<div class="item">
						<h3> UPDATE 3 </h3> 
						<p>Add updates about the 3D printer lab here.</p>
					</div>

					<div class="item">
						<h3> UPDATE 4 </h3>  
						<p>Add updates about the 3D printer lab here.</p>
					</div>
				</div>

				<!-- Left and right controls -->
				<a class="left carousel-control" href="#updatesCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#updatesCarousel"  role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
				
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#updatesCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#updatesCarousel" data-slide-to="1"></li>
					<li data-target="#updatesCarousel" data-slide-to="2"></li>
					<li data-target="#updatesCarousel" data-slide-to="3"></li>
				</ol>
			</div>
<!-- END UPDATES CAROUSEL -->
		</div>
	</div>
	<br />
</div>
</div>
<div class="row row-centered">
	<div id="content">
		<div class="col-lg-3 col-centered">
		<h3>Projects</h3>
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>    
		   <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		</div>
		<div class="col-lg-3 col-centered">
		<h3>Student Reviews</h3>	
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		   <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		  <p>A fixed navigation bar stays visible in a fixed position (top or bottom) independent of the page scroll.</p>
		</div>
	</div>
</div>
<footer>
  <a href="#"> FAQ </a> | <a href="#"> CONTACT </a> | <a href="#"> ECPI.EDU </a>
</footer>  








</body>
</html>
