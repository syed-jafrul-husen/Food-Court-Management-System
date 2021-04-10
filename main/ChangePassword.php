<?php
	session_start();

	if($_SESSION['username']==null){
			if($_SESSION['password']==null){
				header("Location: login.php");
			}			
		}
	include("classes/loginandlogout.php");
	use App\classes\AdminLogin;
	$adm=new AdminLogin();
	if(isset($_GET['logout'])){
		$adm->adminLogout();
	}
?>
<?php 
	include ("include/config.php");
	include ("include/Database.php");
 ?>
 <?php
	$db= new Database();
	$query= "SELECT * FROM loginform ";
	$getData= $db->select($query)->fetch_assoc();
?>
<!DOCTYPE html>
<html>

	<head>
		<title>
			Change Password
		</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
	</head>
	
	<!-- body start -->
	<body>
	
		<!-- 1st DIV -->
		<div class="full_height">
		
			<!-- 2st DIV -->
			<div class="Head">
			
				<!-- 5st DIV -->
				<?php
					include ("include/headermain.php");
				?>
				
				<!--<hr style="width:100%; height:1px;float:left;background:#162199">-->
				
				<!-- 6st DIV -->
				<div id="Head2">
					
					<!-- manu -->
					<ul>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="Dashoard.php">Dashoard</a></li>
					<li><a href="#">Food Management &raquo;</a>
						<ul>
                            <li><a href="addFood.php">Add Food</a></li>
                            <li><a href="foodDetails.php">Food Details</a></li>
                        </ul>
					</li>
                    <li><a href="#">Sales Management &raquo;</a>
                        <ul>
                            <li><a href="addSales.php">Add Sales</a></li>
                            <li><a href="salesDetails.php">Sales Details</a></li>
                        </ul>
                    </li>
					<li><a href="About.php">About</a></li>
                    <li> <a href="?logout=true"><span>Logout</span></a></li>
					</ul>
				</div>
			</div>


			<?php
				if(isset($_POST['update'])){
					$username = mysqli_real_escape_string($db->link, $_POST['username']); 
					$password = mysqli_real_escape_string($db->link, $_POST['password']);

					if($username=='' || $password==''){
						$error="Field must not be Empty !!";
					}else{
						$query = " UPDATE loginform
						SET
						username='$username',
						
						password='$password'";
						$update = $db->update($query);
					}
				}
			?>
									
			
			<!-- 3st DIV -->
			<div class="Feed">
				
				<!-- div updateing -->
				<div class="changePass">
						<form align="center" action="" method="post" name="myForm" onsubmit="return validateForm()" >
						<div class="changePass1">
							<div class="changePass_titel">
								<h1 style="color:black;  ">Change Password</h1>
							</div>
							<div class="changePass_input">

							
								<input type="text" name="username" value="<?php echo $getData['username']?>"  id="myInput" onfocus="focusFunction()" onblur="blurFunction()">
								
								<input type="password" name="password" value="<?php echo $getData['password']?>"  id="myInput2" onfocus="focusFunction2()" onblur="blurFunction2()">
								
								
								<input type="submit" value="Save" name="update" >
							
							</div>
						</div>
						</form>
				</div>
				
				<script>
				function focusFunction() {
				document.getElementById("myInput").style.background = "#800080";
				}

				function blurFunction() {
				document.getElementById("myInput").style.background = "#053744";
				}
				
				function focusFunction2() {
				document.getElementById("myInput2").style.background = "#800080";
				}

				function blurFunction2() {
				document.getElementById("myInput2").style.background = "#053744";
				}
				
				function focusFunction3() {
				document.getElementById("myInput3").style.background = "#800080";
				}

				function blurFunction3() {
				document.getElementById("myInput3").style.background = "#053744";
				}
				function focusFunction4() {
				document.getElementById("myInput4").style.background = "#800080";
				}

				function blurFunction4() {
				document.getElementById("myInput4").style.background = "#053744";
				}
				
				function validateForm() {
					var name = document.forms["myForm"]["username2"].value;
					var cpass = document.forms["myForm"]["currentpassword"].value;
					var npass = document.forms["myForm"]["newpassword"].value;
					var rnpass = document.forms["myForm"]["retypenewpassword"].value;
					if (name == "") {
						alert("Please Enter user name");
						return false;
					}
					if (cpass == "") {
						alert("Please Enter pasword");
						return false;
					}
					if (npass == "") {
						alert("Please Enter new password");
						return false;
					}
					if (rnpass == "") {
						alert("Please Enter confirm password");
						return false;
					}
					if(npass!=rnpass){
						alert("New password and confirm password must be same");
						return false;
					}
						
				}
				</script>
				
			</div>
				
			<!-- 4st DIV -->
			<?php
				include ("include/footer.php");
			?>
			
		</div>
		
		<script>
			window.onscroll = function() {scrollFunction()};

				function scrollFunction() {
				  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					document.getElementById("Head2").style.top = "0";
					 document.getElementById("Head2").style.position = 'fixed';
					  document.getElementById("Head2").style.width = '100%';
				  } else {
					document.getElementById("Head2").style.top = "0px";
					document.getElementById("Head2").style.position = 'relative';
				  }
				}
		</script>
	
	</body>
	
</html>