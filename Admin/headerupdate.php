<!DOCTYPE html>
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
	$query= "SELECT * FROM header WHERE id=$id";
	$getData= $db->select($query)->fetch_assoc();
	?>
<?php
	if(isset($_POST['update'])){
		$title = mysqli_real_escape_string($db->link, $_POST['title']); 
		if($title=='' || $post==''){
			$error="Field must not be Empty !!";
		}else{
			$query = " UPDATE header
			SET
			title='$title',
			post='$post'
			WHERE id= $id";
			$update = $db->update($query);
		}
	}
 ?>
 <?php
	$query = "select * from header where id='$id'";
	$getImg = $db->select($query);
	
	if(isset($_POST['delete'])){
		$query="DELETE FROM header WHERE id=$id";
		$deleteData = $db->delete($query);	 
	//image delete from folder 	
		if ($getImg) {
			while ($imgdata = $getImg->fetch_assoc()) {
			$delimg = $imgdata['image'];
			unlink($delimg);
			}
		}
 
	}
 ?>


 
 
 <?php
	if(isset($error)){
		echo "<span style='color:red'>".$error."</span>";
	}
 ?>
 
 <form action="headerupdate.php?id=<?php echo $id;?>" method="post">
	 <table>
		 <tr><br>
			<td>Title</td>
			<td><input type="text" name="title" value="<?php echo $getData['title']?>" /><td> 
		 </tr>
		 
		 <tr>
			<td></td>
			<td>
			<br>
			<input type="submit" name="update" value="Update" />
			<input type="reset" value="cancel" />
			<input type="submit" name="delete" value="Delete" />
			</td> 
		 </tr>
	 </table>
 </form>
 <br>
 <button style="margin-left:20px;background-color:white;"> <a style="text-decoration:none;color:blue;font-size:20px;" href="headerpost.php">Go back</a></button>
 
 
 
 
 
  
<?php include 'include/footer.php'; ?> 
</div>
</body>
</html>