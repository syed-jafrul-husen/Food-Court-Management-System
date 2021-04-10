

<?php 
	include ("include/config.php");
	include ("include/Database.php");
 ?>
 <?php
	$db= new Database();
	$query= "select * from aboutpage";
	$read= $db->select($query);
 ?>

<!DOCTYPE html>
<html>

	<head>
		<title>
			About
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
			
				<?php
					include ("include/headermain.php");
				?>
				<!-- 5st DIV -->
				
				
				<!--<hr style="width:100%; height:1px;float:left;background:#162199">-->
				
				<!-- 6st DIV -->
				<div id="Head2">
					
					<!-- manu -->
					<ul>
                    <li><a href="Home.php">Home</a></li>
					<li><a href="About.php">About</a></li>
					<li><a href="Help.php">Help</a></li>
                    <li><a href="main/login.php">login</a></li>
					</ul>
				</div>
			</div>
			
			
			<!-- 3st DIV -->
			<div class="Feed">
				<!-- div updateing -->
				
				<div class="about">
					<div class="about_titel">
						<h1 style="color:black;">About</h1>
					</div>
					<div  class="about_body">
						
						 <?php if($read){?>
						 <?php while($row =$read->fetch_assoc()){?>
						 <p><?php echo $row['post'];  ?></p>
						 <p><b><?php echo $row['contact'] ?></b></p>
						 
						 <?php } ?>
						 <?php } else{ ?>
						 <p>Data is not avilable !!</p>
						 <?php } ?>
					</div>
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