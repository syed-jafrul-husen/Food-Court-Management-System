
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


?><!DOCTYPE html>
<html>

	<head>
		<title>
			Dashboard
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
			
			
			<!-- 3st DIV -->
			<div class="Feed">
				
				<!-- div updateing -->
	
				<div class="dashboard">
				
					<form align="center" action="" method="post" >
						<div class="dashboard_titel">
							<h1 style="color:black;">Dashboard</h1>
						</div>
						
						<!--<div class="dashboard_button">-->
						
						<div id="dashboardList">
							<h2><a href="addFood.php">Add Food</a></h2>
						</div>
						
						<div id="dashboardList">
							<h2><a href="addSales.php">Food Sales</a></h2>
						</div>
						
						<div id="dashboardList">
							<h2><a href="foodDetails.php">Food Details</a></h2>
						</div>
						
						<div id="dashboardList">
							<h2><a href="salesDetails.php">Sales Details</a></h2>
						</div>
						
						<div id="dashboardList">
							<h2><a href="ChangePassword.php">Change Password</a></h2>
						</div>
						
						<div id="dashboardList">
							<h2><a href="?logout=true"><span>Logout</span></a></h2>
						</div>

						<div class="dashboard_pic">
							<div class="dashboard_pic_titel">
							<h1 style="color:black;">Food Sales Statistics</h1>
							</div>
							<img src="image/statistics.png" width="90%">
						</div>
						
					</form>
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