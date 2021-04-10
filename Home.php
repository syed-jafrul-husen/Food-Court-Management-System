<?php 
	include ("include/config.php");
	include ("include/Database.php");
 ?>
 <?php
	$db= new Database();
	$query= "select * from homepage";
	$read= $db->select($query);
 ?>
<!DOCTYPE html>
<html>

	<head>
		<title>
			Home
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
					<li><a href="About.php">About</a></li>
					<li><a href="Help.php">Help</a></li>
                    <li><a href="main/login.php">login</a></li>
					</ul>
				</div>
				
			</div>
			
			
			<!-- 3st DIV -->
			<div class="Feed">
				
				<!-- div updateing -->
				
				<div id="parentHome">

					<img src="image/cover1.jpg"  class="addHome" id="1">
					<img src="image/cover2.jpg"  class="addHome" id="2">
					<img src="image/cover3.jpg"  class="addHome" id="3">
					<img src="image/coverSide.jpg" class="addHome" id = "4"> 
				
					<script>
						var i=0;
						function x()
						{
							if(i==0)
							{
								document.getElementById('1').style.display='block';
								document.getElementById('2').style.display='none';
								document.getElementById('3').style.display='none';
								document.getElementById('4').style.display='none';
								i=1;
								document.getElementById('parentHome').style.background = '#E1E4EB';
								setTimeout(function(){x();},800);
							}
							else if(i==1)
							{
								document.getElementById('1').style.display='none';
								document.getElementById('2').style.display='block';
								document.getElementById('3').style.display='none';
								document.getElementById('4').style.display='none';
								document.getElementById('parentHome').style.background = '#EEF9FF';
								i=2;
								setTimeout(function(){x();},1200);
							}
							else if(i==2)
							{
								document.getElementById('1').style.display='none';
								document.getElementById('2').style.display='none';
								document.getElementById('3').style.display='block';
								document.getElementById('4').style.display='none';
								document.getElementById('parentHome').style.background = '#C8CBD2';
								i = 3;
								setTimeout(function(){x();},1800);
							}
							else
							{
								document.getElementById('1').style.display='none';
								document.getElementById('2').style.display='none';
								document.getElementById('3').style.display='none';
								document.getElementById('4').style.display='block';
								document.getElementById('parentHome').style.background = '#C8CBD2';
								i = 0;
								setTimeout(function(){x();},2500);
							}
							
						}
						x();
					</script>
				</div>
				<div class="welcomeText">
					
					<?php if($read){?>
					<?php while($row =$read->fetch_assoc()){?>
					<h1 style="text-align:center;"><?php echo $row['title'] ?> </h1>
					<p style=" display:block;color:black;text-align:center;padding-left:80px; padding-right:80px;"><?php echo $row['post'] ?></p>
					<?php } ?>
					<?php } else{ ?>
					<p>Data is not avilable !!</p>
					<?php } ?>
					
					
										
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