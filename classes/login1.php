<?php
	class auth{
		 public function authenticate($username, $password){
	    		$file = explode( PHP_EOL, file_get_contents( "../html/index.txt" ));
    			$line = null;

    			foreach ( $file as $line ) 
    			{
			        list($usernam, $passwor) = explode(",", $line);
			        if ($username== $usernam && $password == $passwor)
		            {
		            	session_start();
		            	$_SESSION["id"] = $usernam ;
		            	header('Location: ../html/dash.php');
		          	}
				else
					$unap= "Username and Password doesn't match.";
    			}
    			return false;
		}
	}
?>
