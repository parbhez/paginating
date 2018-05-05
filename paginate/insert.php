<?php
	$con = new PDO('mysql:host=localhost;dbname=paginate','root','');
	$statement = $con->prepare("insert into people(name,email,age) values(:name,:email,:age)");

for ($i = 1; $i <= 50 ; $i++) { 
	$statement->execute([
		":name" => 'Sumon'.$i,
		":email" => 'Sumon'.$i.'@gmail.com',
		":age" => '20'
		]);
}
	


?>