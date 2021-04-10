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
	if(isset($_POST['submit'])){
		$productname = mysqli_real_escape_string($db->link, $_POST['productname']); 
		$productcost = mysqli_real_escape_string($db->link, $_POST['productcost']); 
		$producttype = mysqli_real_escape_string($db->link, $_POST['producttype']); 
		$productcompany = mysqli_real_escape_string($db->link, $_POST['productcompany']); 
		$productstock = mysqli_real_escape_string($db->link, $_POST['productstock']); 
			
			
		if($productname=='' || $productcost==''||$producttype==''||$productcompany==''||$productstock==''){
			$error="Field must not be Empty !!";
		}else{
			$query = "INSERT INTO addfood(productname,productcost,producttype,productcompany,productstock) Values('$productname','$productcost','$producttype','$productcompany','$productstock')";
			$create = $db->insert($query);
		}
	}
?>
			 



<!DOCTYPE html>
<html>

	<head>
		<title>
			Add Food
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
						<form align="center" action="" method="post" name="myForm" onsubmit="return validateForm()" >
						<div class="addFood1">
							<div class="addFood_titel">
								<h1 style="color:black;">Add Product Records</h1>
							</div>
							<div class="addFood_input">
							
								<input type="text" name="productname"  placeholder="Product Name"  id="myInput" onfocus="focusFunction()" onblur="blurFunction()">
								
								<input type="text" name="productcost"  placeholder="Product Cost"  id="myInput2" onfocus="focusFunction2()" onblur="blurFunction2()">
								
								<input type="text" name="producttype"  placeholder="Product Type"  id="myInput3" onfocus="focusFunction3()" onblur="blurFunction3()">
								
								<input type="text" name="productcompany"  placeholder="Product Company"  id="myInput4" onfocus="focusFunction4()" onblur="blurFunction4()">
								
								<input type="text" name="productstock"  placeholder="Product Stock"  id="myInput5" onfocus="focusFunction5()" onblur="blurFunction5()">
								
								<input type="submit" value="Submit" name="submit" >
							
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
				function focusFunction5() {
				document.getElementById("myInput5").style.background = "#800080";
				}

				function blurFunction5() {
				document.getElementById("myInput5").style.background = "#053744";
				}
				
				function validateForm() {
					var name = document.forms["myForm"]["productname"].value;
					var cost = document.forms["myForm"]["productcost"].value;
					var type = document.forms["myForm"]["producttype"].value;
					var stock = document.forms["myForm"]["productstock"].value;
					if (name == "") {
						alert("Please Enter product name");
						return false;
					}
					if (cost == "") {
						alert("Please Enter product cost");
						return false;
					}
					if (type == "") {
						alert("Please Enter product type");
						return false;
					}
					if (stock == "") {
						alert("Please Enter product stock");
						return false;
					}
				}
				</script>
				
				<div class="addFood_ex">
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