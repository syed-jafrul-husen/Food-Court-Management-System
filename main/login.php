<?php
			session_start();

			if(isset($_SESSION['username'])){
				if(isset($_SESSION['password'])){
					header("Location: Home.php");
				}
				
			}


			include("classes/loginandlogout.php");
			use App\classes\AdminLogin;
			
			$admin=new AdminLogin();

			$massage='';
			if(isset($_POST['login'])){

			$massage=$admin->adminLogin($_POST);
			}
	?>

<!DOCTYPE html>
<html>

	<head>
		<title>
			Login
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
                    <li><a href="../Home.php">Home</a></li>
					<li><a href="../About.php">About</a></li>
					<li><a href="../Help.php">Help</a></li>
                    <li><a href="login.php">login</a></li>
					</ul>
				</div>
			</div>
			
			
			<!-- 3st DIV -->
			<div class="Feed">
				
				<!-- div updateing -->
					<div class="loginMain">
						<form name="loginForm" align="center" action="" method="post" onsubmit="return validateForm()">
						<br/>
						<legend><p style="color:white; font-size:40px;">Log In<p></legend>
						
						<input align="center" type="text" name="username" placeholder=" Your username or email ">
						
						<input align="center" type="password" name="password" placeholder=" Your password  "  >
						<span style="color:red;font-size:25px;"><?php echo $massage; ?></span>
						
						<br/> <br/>
						
						<input type="submit" value="Log in" name="login" >
						
						
						<br/> <br/><br/><br/>
						</form>
						
						<script>
							function validateForm(){
								var Username = document.forms["loginForm"]["username"].value;;
								var Password = document.forms["loginForm"].["password"].value;
								
								if(Username == ""){
									alert("Please Enter user name");
									return false;
								}
								if(Password == ""){
									alert("Please Enter password");
									return false;
								}
							}
						</script>
					</div>
				<div>
				
				</div>
				
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