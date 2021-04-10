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

$host="localhost";
$user="root";
$password="";
$db="database";

$con = mysqli_connect($host, $user, $password,$db); 

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}


?>

<?php
	include ("include/config.php");
	include ("include/Database.php");

?>


<?php
	$id=$_GET['id'];
	$db= new Database();
	$query= "SELECT * FROM addfood WHERE id=$id";
	$getData= $db->select($query)->fetch_assoc();
?>


<?php
	if(isset($_POST['update'])){
		$productname = mysqli_real_escape_string($db->link, $_POST['productname']); 
		$productcost = mysqli_real_escape_string($db->link, $_POST['productcost']);
		$producttype = mysqli_real_escape_string($db->link, $_POST['producttype']);
		$productcompany = mysqli_real_escape_string($db->link, $_POST['productcompany']);
		$productstock = mysqli_real_escape_string($db->link, $_POST['productstock']);
		
		if($productname=='' || $productcost==''|| $producttype==''|| $productcompany==''|| $productstock==''){
			$error="Field must not be Empty !!";
		}else{
			$query = " UPDATE addfood
			SET
			productname='$productname',
			productcost='$productcost',
			producttype='$producttype',
			productcompany='$productcompany',
			productstock='$productstock'
			WHERE id= $id";
			$update = $db->update($query);
		}
	}
?>


<?php
	$query = "select * from addfood where id='$id'";
	$getImg = $db->select($query);
	
	if(isset($_POST['delete'])){
		$query="DELETE FROM addfood WHERE id=$id";
		$deleteData = $db->delete($query);	 
 
	}
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
								 <form action="updatefoodDetails.php?id=<?php echo $id;?>" method="post">
										<table id="">					
											<tr>
												<td>
													<label>Product Name</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['productname']?>" name="productname"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Cost</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['productcost']?>" name="productcost"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Type</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['producttype']?>" name="producttype"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Company</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['productcompany']?>" name="productcompany"  />
												</td>
											</tr>
											 <tr>
												<td>
													<label>Product Stock</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['productstock']?>" name="productstock"  />
												</td>
											</tr>
											 
											
											 <tr>
												<td>
												</td>
												<td>
													<input class="but" type="submit" name="update" Value="Update" />
													<input class="but" type="submit" name="delete" value="Delete" />
												</td>
											</tr>
										</table>
								</form>
									<button style="margin-left:20px;background-color:white;"> <a style="text-decoration:none;color:blue;font-size:20px;" href="foodDetails.php">Go back</a></button>

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