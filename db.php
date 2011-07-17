<?php 
define("SERVER", "localhost");
define("DB", "comic-unstable");
define("USR", "root");
define("PWD", "fbgn9251");



class comicDbHandler{
	public $con;
	
	public function __construct($server, $db, $user, $pwd){
		//conects to a database, sets $self->con as connection link
		$con =mysql_connect($server, $user, $pwd);
		if(!$con) {
			die('Could not connect: ' .mysql_error());
		}
		
		$db_selected = mysql_select_db($db, $con);
		
		if (!$db_selected){
			die ("Can\'t use test_db : " . mysql_error());
		}
		$this->con = $con;
		
	}
	public function __destruct(){
		
		mysql_close($this->con);
		
	}
	public function close(){
		mysql_close($this->con);
	}


	public function retrieve_val_at_id($id){ 
		//returns the value at a given id as an array
		
		$sql = "SELECT * from comics WHERE id=".$id;
		$result = (mysql_query($sql, $this->con));
		$array=mysql_fetch_array($result);
		return $array;
		
	}
	
	public function retrieve_max_id(){ 
		//returns the last id in a db as an int
		
		$sql = "SELECT max(id) from comics";	
		$result = (mysql_query($sql, $this->con));
		$array=mysql_fetch_array($result);
		
		
		
		return (int)$array[0];
		
	}    
	
	
	public function add_comic($title, $url, $author){
		//Inserts a comic at the end, and returns id at of that comic as an int
		
		$id= $this->retrieve_max_id()+1;
		$sql = "INSERT INTO comics VALUES ('$id','$title', '$url', '$author')";
		$result = mysql_query($sql, $this->con);
		
		
		
		return (int)$id;
		
		
		
	}
	
	public function delete_comic($id){
		$sql = "Delete FROM comics WHERE id='$id'";
		$result = mysql_query($sql, $this->con);
	}
	public function count(){
		$sql = "SELECT * FROM comics";
		$result = mysql_query($sql, $this->con);
		
		return (int)mysql_num_rows($result);
	}
	public function rehash(){
		//store everything in an array
		
		for($i=1;$i<=$this->retrieve_max_id();$i++){
			if( $this->retrieve_val_at_id($i) != ''){
				$array[$i]=$this->retrieve_val_at_id($i);
			}
			
		}
		//delete everything
		for($i=1;$i<=$this->retrieve_max_id();$i++){
			$this->delete_comic($i);
		}
		
		
		//insert everything to db
		foreach ($array as $comic) {
			$this->add_comic($comic['title'], $comic['url'], $comic['author']);
			
		}
	}
}






