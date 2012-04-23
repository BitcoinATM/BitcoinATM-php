<?php
	$link = mysql_connect('localhost', 'MySQL55', 'todd5535');
//if (!$link) {
  //  die('Not connected : ' . mysql_error());
	
	function db_select($db) {
		mysql_select_db($db)
			or die(mysql_error());
	}

	function db_query($sql) {
		return mysql_query($sql);
	}
	
	function db_num_rows($result) {
		return mysql_num_rows($result);
	}
	
	function db_fetch_array($result) {
		return mysql_fetch_array($result);
	}
	
	function db_data_seek($result, $row_number) {
		return mysql_data_seek($result, $row_number);
	}
	
	function db_input($string) {
		return mysql_real_escape_string($string);
	}
	
	function db_last_error() {
		return mysql_error();
	}
	
	function db_close() {
		mysql_close($db_link);
	}
	
	db_select('');
?>