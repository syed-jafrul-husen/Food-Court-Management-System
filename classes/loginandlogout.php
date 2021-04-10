<?php
 namespace App\classes;
// use App\classes\Database;

	class AdminLogin{
		public function adminLogin($data){
			$connect=mysqli_connect("localhost","root","","database");

			$uname=$data['User'];
			$pass=$data['Pass'];

			$sql="select * from loginform where User='$uname' and Pass='$pass'";
			if(mysqli_query($connect,$sql)){
				
				$queryResult=mysqli_query($connect,$sql);
				
				$admins=mysqli_fetch_assoc($queryResult);
				
				 if($admins){
					session_start();
					$_SESSION['User']=$admins['User'];
					$_SESSION['Pass']=$admins['Pass'];
					header("Location: main/home.php");
				}

				else{
					$massage="Wrong username or password";
					return $massage;
				}
			}
			else{
				die("Query problem".mysqli_error($connect));
			}

		}

		public function adminLogout(){
			session_start();

			unset($_SESSION['username']);
			unset($_SESSION['password']);

			header("Location: login.php");
		}
	}
?>