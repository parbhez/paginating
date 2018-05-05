<?php
	$con = new PDO('mysql:dbname=pagination;host=localhost','root','');
	 $con->query("
	 	create table people (
	 		id serial,
	 		name varchar(25),
	 		email varchar(60)

	 		)

	 	");


echo "created";

$people = ['masud','parbhez','karim','shohag','mithila','sarika',' sokh','tumpa','sumi','monisa','tusi','shohan'];
foreach ($people as $person) {
	$con->query("insert into people(name,email) values('$person','$person@gmail.com')");
}
foreach ($people as $person) {
	$con->query("insert into people(name,email) values('$person','$person@gmail.com')");
}
foreach ($people as $person) {
	$con->query("insert into people(name,email) values('$person','$person@gmail.com')");
}
foreach ($people as $person) {
	$con->query("insert into people(name,email) values('$person','$person@gmail.com')");
}
foreach ($people as $person) {
	$con->query("insert into people(name,email) values('$person','$person@gmail.com')");
}

echo "data inserted successfully";
?>