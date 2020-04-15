<?php
//open connection to data base
//$conn = mysql_connect("server name","username for data base","password you can put in db ","db name");
$conn = mysqli_connect("localhost","root","","ecommerce");
	if(!$conn){
		die("cannot connect to server");
	}