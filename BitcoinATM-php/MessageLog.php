<?php
require_once 'db_link.php';

class MessageLog {
	private $tableName = '';
	
	function __construct($tableName, $textLength = 100) {
		$tableName = db_input($tableName);
		$this->tableName = $tableName;
		$sql = "SELECT `id` FROM `$tableName` WHERE `id` = 1;";
		$result = db_query($sql);
		if ($result) return;
		
		$sql = <<< SQL
			CREATE TABLE `$tableName` (
				`id` INT NOT NULL AUTO_INCREMENT,
				`message` CHAR($textLength),
				`time` BIGINT NOT NULL,
			INDEX(`id`)) ENGINE = MYISAM CHARACTER SET utf8 COLLATE utf8_bin;
SQL;
		$result = db_query($sql);
		if (!$result) throw new Exception(db_last_error());
	}
	
	public function write($message) {
		$tableName = $this->tableName;
		$message = db_input($message);
		$time = time();
		$sql = "INSERT INTO `$tableName` (`message`, `time`) VALUES ('$message', $time);";
		$result = db_query($sql);
		if (!$result) throw new Exception(db_last_error());
	}
}
?>