<?php 

	/**
	* Database Class.
	*/
	class Database{
		
		public $host   = DB_HOST;
		public $user   = DB_USER;
		public $pass   = DB_PASS;
		public $dbname = DB_NAME;

		public $link;
		public $error;

		function __construct(){
			$this->connectDB();
		}
		//Database connection function. 
		private function connectDB(){
			$this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
			if (!$this->link) {
				$this->error = "Connection Fail".$this->link->connect_error;
				return false;
			}
		}
		//Select or Read data:We can read data by this function.
		public function select($rcv_query){
			$result = $this->link->query($rcv_query) or die($this->link->error.__LINE__);
			if ($result->num_rows > 0) {
				return $result;
			} else {
				return false;
			}
			
		}
		//Insert data:We can insert data to Database by this function.
		public function insert($rcv_query){
			$insert_data = $this->link->query($rcv_query) or die($this->link->error.__LINE__);
			if ($insert_data) {
				header("Location: index.php?msg=".urldecode('Data inserted successfully.'));
				exit();
			} else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}
		}

		//Insert data:We can update data to Database by this function.
		public function update($rcv_query){
			$update_data = $this->link->query($rcv_query) or die($this->link->error.__LINE__);
			if ($update_data) {
				header("Location: index.php?msg=".urldecode('Data updated successfully.'));
				exit();
			} else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}
		}

		//Insert data:We can deleted data to Database by this function.
		public function delete($rcv_query){
			$delete_data = $this->link->query($rcv_query) or die($this->link->error.__LINE__);
			if ($delete_data) {
				header("Location: index.php?msg=".urldecode('Data deleted successfully.'));
				exit();
			} else{
				die("Error:(".$this->link->errno.")".$this->link->error);
			}
		}
	}

?>