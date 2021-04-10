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
	$query= "select * from sales_details";
	$read= $db->select($query);
 ?>


<!DOCTYPE html>
<html>

	<head>
		<title>
			Food Details
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
				<div class="addFood">
					<form align="center" action="" method="post" >
						<div class="addFood1">
							<div class="foodDetails_titel">
								<h1 style="color:black;">Food Details</h1>
							</div>
								<div id = "tab">
								<br><br>
								<table style="margin:0 auto;">
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Customer Phone No</th>
                                    <th> Action</th>
                                </tr>
								
                                <?php if($read){?>
                                <?php while($row =$read->fetch_assoc()){?>
								
                                <tr>
                                    <td><?php echo $row['c_name'] ?></td>
									<td><?php echo $row['c_phone'] ?></td>
                                    <td><button><a style="text-decoration:none;color:red;font-size:20px;" href="updatesalesdetails.php?id=<?php echo urlencode($row['id']);?>">View</a></button></td>
	
                                </tr>
                                <?php } ?>
                                <?php } else{ ?>
                                <p>Data is not avilable !!</p>
                                <?php } ?>
								
								</table>
							
							<br>
                       
							</div>
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