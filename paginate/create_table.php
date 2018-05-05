<?php 
	$con = new PDO('mysql:host=localhost;dbname=paginate','root','');
	$statement = $con->prepare("
		create table people(
		id serial,
		name varchar(255) not null,
		email varchar(255) not null,
		age int(11) not null
		)
		");

	$statement->execute();
	echo "Successfully created table";

?>