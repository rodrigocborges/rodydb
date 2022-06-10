<?php
	header("Content-Type: application/json");
	require_once('autoload.php');

	use RodyDB\Core\RodyDatabase;

	$db = new RodyDatabase('1234');

	$db->create('users', [
		[ 'id' => 1, 'name' => 'john'],
		[ 'id' => 2, 'name' => 'bill'],
		[ 'id' => 3, 'name '=> 'steve'],					 
	]);

	$db->create('config', [
		'theme' => 'blue',
		'darkMode' => true
	]);

	echo $db->show('users', '1234');
    //echo $db->show('config');	

?>