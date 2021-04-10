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

<!DOCTYPE html>
<html>

	<head>
		<title>
			Food Management
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
				<div class="Head2">
					
					<!-- manu -->
					<div class="Head2_manu1">
						<h3 ><a href="Home.php">Home</a></h3>
					</div>
					
					<div class="Head2_manu1">
						<h3 ><a href="Dashoard.php">Dashoard</a></h3>
					</div>
					
					<div class="Head2_manu2">
						<h3 ><a href="Food Management.php">Food Management</a></h3>
					</div>
					
					<div class="Head2_manu2">
						<h3 ><a href="Sales Management.php">Sales Management</a></h3>
					</div>
					
					<div class="Head2_manu1">
						<h3 ><a href="About.php">About</a></h3>
					</div>
					
					<div class="Head2_manu1">
						<h3 > <a href="?logout=true"><span>Logout</span></a></h3>
					
					</div>
				
				</div>
			</div>
			
			
			<!-- 3st DIV -->
			<div class="Feed">
				
				<!-- div updateing -->
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