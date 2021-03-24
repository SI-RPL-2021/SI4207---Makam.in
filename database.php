<?php 
 
class database{
 
	var $host = "localhost";
	var $uname = "root";
	var $pass = "";
	var $db = "makamin";
 
	function __construct(){
		mysql_connect($this->host, $this->uname, $this->pass);
		mysql_select_db($this->db);
	}
}

?>