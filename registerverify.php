<?php
error_reporting(E_PARSE);
require_once("dbconnect.inc");

$AddEmail    =$_POST['AddEmail'];
$AddPassword =$_POST['AddPassword'];

$sql="insert into login (usernameID,passwordID) values ('$AddEmail', '$AddPassword')";
$result=mysql_query($sql) or die("Error in adding account: ".mysql_error());

$mess="Account for $AddEmail successfully created";
?>
<?php
$mess="Please enter your login info";
$_SESSION['InputEmail1']= $_POST['InputEmail1'];
if(isset($_GET['m'])){
    $mess=$_GET['m'];
    }
 ?>
 <?php
session_start();
require_once("dbconnect.inc");
require_once("checkstatus.inc");

$accountid=$_SESSION['usernameID'];?>
 
 
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
<nav class="navbar navbar-default" style="position: fixed; width:100%;">
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
		<form class="modal-content animate" method="post"action="loginverifystudent.php" data-toggle="validator" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Student Log-in</h4>
				</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="InputEmail1">Email address</label>
					<input class="form-control" name="InputEmail1" id="InputEmail1" placeholder="Enter email" type="email" required>
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
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
			  
			  <?php
$mess="Please enter your login info";

if(isset($_GET['m'])){
    $mess=$_GET['m'];
    }
 ?>
			  
			  
			  
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
					<input class="form-control" name="InputEmail1" id="InputEmail1" placeholder="Enter email" type="email" required>
				</div>
				<div class="form-group">
					<label for="InputPassword">Password</label>
					<input class="form-control" name="InputPassword" id="InputPassword" placeholder="Password" type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
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
		<form class="modal-content animate" method="post" action="registerverify.php" data-toggle="validator" >
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Register User</h4>
				</div>
				<div class="modal-body">
				
						<div class="form-group">
						<label for="AddEmail">Email address</label><br />
							<input id="AddEmail" name="AddEmail" style="width: 100%" placeholder="user@email.com" type="email" required>
						</div>
						<div class="form-group">
					
						<label for="AddPassword">Password</label><br />
							<input id="AddPassword" name="AddPassword"style="width: 100%"  type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" onchange="form.cPsw.pattern = this.value;">
						</div>
					<div class="form-group">
						<label for="AddPassword">Verify Password</label><br />
							<input id="AddPassword" style="width: 100%" type="password" name="AddPassword" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
					
					</div>
						<label for="userType"></label>
						<select class="form-control" id="userType" placeholder="User Type" required>
							<option value="studentUser"> Student/Alumni   </option>
							<option value="InstructorUser"> Instructor   </option>
							<option value="otherUser"> Other </option>
						
						</select>
						<div class="form-group">
					<label for="IDNumber">ID Number</label>
					<input class="form-control" id="IDNumber"  type="number" required>
				</div>
				<script src='https://www.google.com/recaptcha/api.js'></script>
<form id="comment_form" action="recaptcha.php" method="post" required>
	<!-- RECAPTCHA -->
	<div class="g-recaptcha" data-sitekey="6LfldBkUAAAAAEh5xSqZPOoWRmTlPKvZBb3oLVF1"></div>
	<!--End RECAPTCHA -->
</form>
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
		<div class="container" id="banner">
			<h1>ECPI Innsbrook 3D Printer LAB</h1>
		</div>	
		<br />
		<br />
		<br />
		<div class="row">
			<div class="col-lg-1">
			</div>
			<div class="col-lg-10">
			
				<p>
				<iframe width="500" height="281" src="https://www.youtube.com/embed/kaNzRaGFrM0" frameborder="0" align="right" allowfullscreen></iframe>
				<h3>History OF 3D PRINTING</h3>
				It is a process that allows you to create an object on the computer, and then you can send it to the 3D printer to have the object that was designed on the computer,
					to a solid three dimensional object that is printed with hard plastic The object that is created on the computer is sliced down into little flat pieces that later is layered 
					on top of each other to create the full object. The layers are cut thin but when they are added on top of each other, they form together and solidify to make a strong plastic,
					or other material, object that can even be used as parts if you design it to work with a mechanical object...</p>
				<p>
					<a class="btn btn-primary btn-lg" href="LearnMore.html">Learn more</a>
				</p>
			</div>
				
			<div class="col-lg-1">
			</div>
		</div>
		<br />
		<br />
		<br />
	<div class="row">
			<div class="col-lg-12">
			<!-- BEGIN UPDATES CAROUSEL -->	

				<div id="updatesCarousel" class="carousel slide" data-ride="carousel">
					
					<!-- Wrapper for slides -->
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<h3> NEW PRINTS </h3>  
							<p>New prints are always rolling out of our lab!<br /> Come in to see for yourself, or request a print! </p>
						</div>

						<div class="item">
							<h3> BIGGER COLOR SELECTION </h3>  
							<p>Choose from red, green, blue,<br /> black and white for your 3D prints.</p>
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
		<br />
	</div>
</div>

<!-- 		CONTACT CONTAINER  		-->

<div id="contact" class="container">
  <h2 class="text-center">CONTACT</h2>
	<div class="row">
		<div class="col-sm-5">
		  <p>Contact us with any questions or concerns and one of our faculty will get back to you as soon as they can.</p>
		  <p><span class="glyphicon glyphicon-map-marker"></span> 4305 Cox Rd.<br />
		  &nbsp; &nbsp; Glen Allen, VA 23060</p>
		  <p><span class="glyphicon glyphicon-phone"></span> (804) 894-9150</p>
		  <p><span class="glyphicon glyphicon-envelope"></span> ecpi3dprinterlab@ecpi.edu</p> 
		</div>
		<form action="mailHandler.php" method="post">
				<div class="col-sm-7">
				  <div class="row">
					<div class="col-sm-6 form-group">
					  <input class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text" required>
					</div>
					<div class="col-sm-6 form-group">
					  <input class="form-control" id="last_name" name="last_name" placeholder="Last Name" type="text" required>
					</div>
				  </div>
				  <div class="row">
					<div class="col-sm-6 form-group">
					  <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
					</div>
				  </div>
				  <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
				  <div class="row">
					<div class="col-sm-12 form-group">
					  <button class="btn btn-default pull-right" type="submit" name="submit">Send</button>
					</div>
				  </div> 
				</div>
				</form>
	</div>
</div>
<br /><br /><br />

<footer>
  <a href="faq.html"> FAQ </a> | <a href="#"> CONTACT </a> | <a href="#"> ECPI.EDU </a>
</footer>  








</body>
</html>

