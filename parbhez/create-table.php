<?php 

$con = new PDO('mysql:host=localhost;dbname=parbhez', 'root', '');
$con->query('drop table if exists person');
$con->query("create table person(
	id serial,
	name varchar(30),
	email varchar(30)
)");


$person = [
	'tasnia', 'mimi', 'tanim', 'mithu', 'nizam', 'asraf', 'akbar', 'sujon', 'rajib', 'sarif', 'parvez', 'helal', 'fahim', 'faria', 'nila', 'faysal', 'sumon', 'sarwar', 'riaz', 'palash', 'milky', 'rabby', 'hasnath', 'sarif'
];

foreach($person as $people) {
	$con->query("insert into person (name, email) values('$people', '$people@gmail.com')");
}
foreach($person as $people) {
	$con->query("insert into person (name, email) values('$people', '$people@gmail.com')");
}
foreach($person as $people) {
	$con->query("insert into person (name, email) values('$people', '$people@gmail.com')");
}
foreach($person as $people) {
	$con->query("insert into person (name, email) values('$people', '$people@gmail.com')");
}
echo "success";





