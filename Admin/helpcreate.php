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
				$db= new Database();
				if(isset($_POST['submit'])){
					$question = mysqli_real_escape_string($db->link, $_POST['question']); 
					$answer = mysqli_real_escape_string($db->link, $_POST['answer']); 
					
					
						
					if($question==''||$answer==''){
						$error="Field must not be Empty !!";
					}else{
						$query = "INSERT INTO helppage(question,answer) Values('$question','$answer')";
						$create = $db->insert($query);
					}
				}
		?>
			 
			 <?php
				if(isset($error)){
					echo "<span style='color:red'>".$error."</span>";
				}
			 ?>
 
		 
		 <form action="helpcreate.php" method="post" enctype="multipart/form-data">
			 <table>
				 <tr>
					<td><br>question</td>
					<td><br><input type="text" name="question" placeholder="please enter your question"/></td> 
					
				 </tr>
				 <tr>
					<td><br>answer</td>
					<td><br><input type="text" name="answer" placeholder="please enter your answer"/></td> 
					
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
			<button style="margin-left:20px;background-color:white;"> <a style="text-decoration:none;color:blue;font-size:20px;" href="helppost.php">Go back</a></button>
			 
 
 
 
 
  
		<?php 
			include 'include/footer.php'; 
		?>
		

   </div>
   </body>
   </html>