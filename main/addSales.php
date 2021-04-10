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



<!DOCTYPE html>
<html>

	<head>
		<title>
			Add Sales
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
				$db= new Database();
				if(isset($_POST['add'])){
							 
					$c_name = mysqli_real_escape_string($db->link, $_POST['c_name']); 
					$c_phone = mysqli_real_escape_string($db->link, $_POST['c_phone']); 
					$p_name = mysqli_real_escape_string($db->link, $_POST['p_name']); 
					$p_company = mysqli_real_escape_string($db->link, $_POST['p_company']); 
					$p_cost = mysqli_real_escape_string($db->link, $_POST['p_cost']); 
					$P_quantity = mysqli_real_escape_string($db->link, $_POST['P_quantity']); 
						
						
					if($c_name=='' || $c_phone==''||$p_name==''||$p_company==''||$p_cost=='' ||$P_quantity==''){
						$error="Field must not be Empty !!";
					}else{
						$query = "INSERT INTO sales_details(c_name,c_phone,p_name,p_company,p_cost,P_quantity) Values('$c_name','$c_phone','$p_name','$p_company','$p_cost','$P_quantity')";
						$create = $db->insert($query);
					}
				}
				
				
			?>
			
			


			
			<!-- 3st DIV -->
			<div class="Feed">
				<!-- div updateing -->
				
				<div class="customerDetails">
						<form align="center" action="" name="myForm" onsubmit="return validateForm()" method="post" >
							<div class="customerDetails_titel">
								<h1 style="color:black;">Enter Customer Details</h1>
							</div>
							
							<div class="customerDetails_input" >
								<input type="text" name="c_name"  placeholder=" Customer Name "  id="myInput" onfocus="focusFunction()" onblur="blurFunction()">
								
								<input type="text" name="c_phone" placeholder=" Customer Contact " id="myInput2" onfocus="focusFunction2()" onblur="blurFunction2()">


							<?php
								$db= new Database();
								$query= "select * from addfood";
								$read= $db->select($query);
							 ?>
								

						<b> Select Product Name </b><br>
						 <select name="p_name">
								<?php if($read){?>
						 <?php while($row =$read->fetch_assoc()){?>

									<option selected><?php echo $row['productname'];  ?></option>

						 <?php } ?>
						 <?php } else{ ?>
						 <p>Data is not avilable !!</p>
						 <?php } ?>
						</select>	<br><br><br>


						


							<b> Select Company </b><br>
							<?php
								$db= new Database();
								$query= "select * from addfood";
								$read= $db->select($query);
							 ?>
								
						 <select name="p_company">
								<?php if($read){?>
						 <?php while($row =$read->fetch_assoc()){?>

									<option selected><?php echo $row['productcompany'];  ?></option>

						 <?php } ?>
						 <?php } else{ ?>
						 <p>Data is not avilable !!</p>
						 <?php } ?>
						</select>	<br><br><br>

						


						<?php
							$db= new Database();
							$query= "select * from addfood";
							$read= $db->select($query);
						 ?>
						 <b> Select Product Cost </b><br>
						 <select name="p_cost">
								<?php if($read){?>
						 <?php while($row =$read->fetch_assoc()){?>

									<option selected><?php echo $row['productcost'];  ?></option>

						 <?php } ?>
						 <?php } else{ ?>
						 <p>Data is not avilable !!</p>
						 <?php } ?>
						</select>	<br><br>


						<input type="number" name="P_quantity" placeholder="Enter Product Quantity: " id="myInput2" onfocus="focusFunction2()" onblur="blurFunction2()">

						<br>

							
								<input type="submit" value="Add" name="add" onclick="showDiv()">



							</div>	

						</form>
				</div>
				
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
				//function showDiv(){
					//var x = document.getElementById("addSales");
					//x.style.display = "block";
				//}
				
				function validateForm() {
					var name = document.forms["myForm"]["customername"].value;
					var contact = document.forms["myForm"]["customercontact"].value;
					if (name == "") {
						alert("Customer Name must be filled out");
						return false;
					}
					if (contact == "") {
						alert("Customer Contact must be filled out");
						return false;
					}
				}
				
				
			</script>
				
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