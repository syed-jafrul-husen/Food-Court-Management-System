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
	<head> <link href="stylelogin.css" rel="stylesheet"></head>
	<body>
	<div class="wrapper">
	<?php include 'include/header.php';
	include "include/leftsidebar.php";
	include ("include/config.php");
	include ("include/Database.php");
	 ?>
	     <?php
				$db= new Database();
				if(isset($_POST['submit'])){
					$title = mysqli_real_escape_string($db->link, $_POST['title']); 
					$post = mysqli_real_escape_string($db->link, $_POST['post']); 
					
					
					
						
					if($title==''||$post==''){
						$error="Field must not be Empty !!";
					}else{
						$query = "INSERT INTO homepage(title,post) Values('$title','$post')";
						$create = $db->insert($query);
					}
				}
		?>
			 
			 <?php
				if(isset($error)){
					echo "<span style='color:red'>".$error."</span>";
				}
			 ?>
 
		 
		 <form action="create.php" method="post" enctype="multipart/form-data">
			 <table>
			 
				 <tr><br>
					<td>Title</td>
					<td><input type="text" name="title" placeholder="please enter your title"/></td>
				 </tr>
				 <tr>
					<td><br>Post</td>
					<td><br><input type="text" name="post" placeholder="please enter your post"/></td> 
					
				 </tr>
				 <tr>
					<td></td>
					<td>
						<br>
						<input type="submit" name="submit" value="POST" />
						<input type="reset" value="cancel" />
					</td> 
				 </tr>
			 </table>
		 </form>
			 <br>
			<button style="margin-left:20px;background-color:white;"> <a style="text-decoration:none;color:blue;font-size:20px;" href="index.php">Go back</a></button>
 
  
		<?php 
			include 'include/footer.php'; 
		?>
		

   </div>
   </body>
   </html>