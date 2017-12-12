<?php 
	session_start();

	session_unset();
	session_destroy(); 
	setcookie('user',$name,time()-10,"","", 0); //this piece of code are newly added.
	setcookie('pass',$pass,time()-10,"","", 0);

	$uri .= "/OOP_final";			  
	header('Location: '.$uri.'/index.php');

?>