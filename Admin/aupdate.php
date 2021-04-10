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
	$id=$_GET['id'];
	$db= new Database();
	$query= "SELECT * FROM aboutpage WHERE id=$id";
	$getData= $db->select($query)->fetch_assoc();
	
	
	if(isset($_POST['submit'])){
		$post = mysqli_real_escape_string($db->link, $_POST['post']); 
		$contact = mysqli_real_escape_string($db->link, $_POST['contact']); 
		if($post=='' || $contact==''){
			$error="Field must not be Empty !!";
		}else{
			$query = " UPDATE aboutpage
			SET
			post='$post',
			contact='$contact'
			WHERE id= $id";
			$update = $db->update($query);
		}
	}
 ?>
 


 
 
 <?php
	if(isset($error)){
		echo "<span style='color:red'>".$error."</span>";
	}
 ?>
			
 
 <form action="aupdate.php?id=<?php echo $id;?>" method="post">
	 <table>
		 <tr>
			<td><br>About details</td>
			<td><br><input type="text" name="post" value="<?php echo $getData['post']?>"/><td> 
		 </tr>
		 <tr>
			<td><br>Contact</td>
			<td><br><input type="text" name="contact" value="<?php echo $getData['contact']?>"/><td> 
		 </tr>
		 <tr>
			<td></td>
			<td>
			<br>
			<input type="submit" name="submit" value="Update" />
			<input type="reset" value="cancel" />
			<input type="submit" name="delete" value="Delete" />
			</td> 
		 </tr>
	 </table>
 </form>
 <br>
 <button style="margin-left:20px;background-color:white;"> <a style="text-decoration:none;color:blue;font-size:20px;" href="aboutuspost.php">Go back</a></button>
 
 <?php


	$query = "select * from aboutpage where id='$id'";
	$getImg = $db->select($query);

	if(isset($_POST['delete'])){
		$query="DELETE FROM aboutpage WHERE id=$id";
		$deleteData = $db->delete($query);
	

 
	}
 ?>
 
 
 
  
<?php include 'include/footer.php'; ?> 
</div>
</body>
</html>