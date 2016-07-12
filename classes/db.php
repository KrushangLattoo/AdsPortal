<?php
	
	class DB{
		public $conn;
		public $result;		
		
		public function connect()
		{
			$servername = "localhost";
			$username = "root";
			$password = "root";

			// Create connection
		
			$this->conn=  new mysqli($servername, $username, $password, "TheBigAds");
			if ($this->conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			} 
			
    			
			
			// Check connection	
			
		}
		public function disconnect()
		{		
			mysqli_close($this->conn);
		}	
		public function execute($sql)
		{		
			$this->conn->query($sql);
			header("location:../html/dash.php"); 
		}
		public function selectExecute($sql)
		{	
			$result=$this->conn->query($sql);		
			return $result;
				
		}
	}
?>
