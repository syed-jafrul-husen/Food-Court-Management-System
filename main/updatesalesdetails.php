
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
	$id=$_GET['id'];
	$db= new Database();
	$query= "SELECT * FROM sales_details WHERE id=$id";
	$getData= $db->select($query)->fetch_assoc();
?>


<?php
	if(isset($_POST['update'])){
		$c_name = mysqli_real_escape_string($db->link, $_POST['c_name']); 
		$c_phone = mysqli_real_escape_string($db->link, $_POST['c_phone']);
		$p_name = mysqli_real_escape_string($db->link, $_POST['p_name']);
		$p_company = mysqli_real_escape_string($db->link, $_POST['p_company']);
		$p_cost = mysqli_real_escape_string($db->link, $_POST['p_cost']);
		$p_quantity = mysqli_real_escape_string($db->link, $_POST['p_quantity']);

		
		if($c_name=='' || $c_phone==''|| $p_name==''|| $p_company==''|| $p_cost==''|| $p_quantity==''){
			$error="Field must not be Empty !!";
		}else{
			$query = " UPDATE sales_details
			SET
			c_name='$c_name',
			c_phone='$c_phone',
			p_name='$p_name',
			p_company='$p_company',
			p_cost='$p_cost',
			p_quantity='$p_quantity'
			WHERE id= $id";
			$update = $db->update($query);
		}
	}
?>


<?php
	$query = "select * from addfood where id='$id'";
	$getImg = $db->select($query);
	
	if(isset($_POST['delete'])){
		$query="DELETE FROM sales_details WHERE id=$id";
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
													<label>Customer Name</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['c_name']?>" name="c_name"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Customer Number</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['c_phone']?>" name="c_phone"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Name</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['p_name']?>" name="p_name"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Company</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['p_company']?>" name="p_company"  />
												</td>
											</tr>
											<tr>
												<td>
													<label>Product Cost</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['p_cost']?>" name="p_cost"  />
												</td>
											</tr>
											 <tr>
												<td>
													<label>Product Quantity</label>
												</td>
												<td>
													<input id="A" type="text" value="<?php echo $getData['p_quantity']?>" name="p_quantity"  />
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
									<button style="margin-left:20px;background-color:white;height:40px;width:120px;border-radius:10px;border: 1px solid blue"> <a style="text-decoration:none;color:black;font-size:18px;" href="salesDetails.php">Go back</a></button>

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