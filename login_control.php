<?php
	function ck_login()
	{
		include "mysql_control.php";
		session_start();
		if(session_id() == '' || !isset($_SESSION['login']))
		{
			if (isset($_POST['username']) && isset($_POST['password'])) 
			{
				$username = $_POST['username'];
				$password = $_POST['password'];
					
				if(empty($username) and empty($password))
				{
					echo "Please Login!!!! Go to login Page in 3 Seconde";
					header('refresh:3; url=index.php');
					exit();	
				}
			
				$result = $database->select("employee_password","*",["Email"=>$username]);

				if(!empty($result))
				{
					if (password_verify($password, $result[0]['Hash_password'])) 
					{
						$_SESSION['login'] = $username;
					} 
					else 
					{
						echo 'Invalid password !!! Go to login Page in 3 Seconde';
						header('refresh:3; url=index.php');
						exit();	
					}
				}
				else
				{
					echo "Not Found Username : $username !!! Go to login Page in 3 Seconde";
					header('refresh:3; url=index.php');
					exit();	
				}
				
			}
			else
			{
				echo "Please Login!!!! Go to login Page in 3 Seconde";
				header('refresh:3; url=index.php');
				exit();	
			}
		}
	}
	
	function ck_logout()
	{
		session_start();
		if(isset($_SESSION['login']))
		{
			echo "Please Logout!!!! Go to Main Page in 3 Seconde";
			header('refresh:3; url=1.php?category=products');
			exit();		
		}
	}
?>