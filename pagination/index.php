<?php
	//$page = isset($_GET['page']) ? $_GET['page'] : 1;

	// $page = isset($_GET['page']) ? $_GET['page'] : 1;

 // 2 +2 == 4 ? 'true' : 'false';

	// if (isset($_GET['page'])) {
	// 	$page = $_GET['page'];
	// } else {
	// 	$page = 1;
	// }


	$page = $_GET['page'] ?? 1;
	$limit = 10;
	$offset = $page * $limit -$limit;

	$con = new PDO('mysql:host=localhost;dbname=pagination','root','');
	$result = $con->query("select * from people limit $limit offset $offset");
	$person = $result->fetchAll(PDO::FETCH_OBJ);
	//print_r($person);
// 1 10  0
// 2 10  10 $page * $limit -$limit;
// 3 10 20

//$total_page = 72/10

$result2 = $con->query("select * from people");
$total_row = $result2->rowCount();
// echo "$total_row";
$total_page = ceil($total_row/$limit);
// echo "$total_row";
// echo "<br/>";
// echo "$total_page";














?>

<!DOCTYPE html>
<html>
<head>
	<title>Pagination</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body class="bg-info">
	<div class="container mt-5">
		<div class="card bg-success">
			<div class="card-header">
				<h2>All Person</h2>
			</div>
			<div class="card-body">
				<table class="table table-borderd">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
					</tr>
				<?php foreach ($person as $people): ?>
						
						
					<tr>
						<td><?php echo $people->id;?></td>
						<td><?php echo $people->name;?></td>
						<td><?php echo $people->email;?></td>
						
					</tr>
				<?php endforeach; ?>

				</table>


	<nav aria-label="...">
		  <ul class="pagination">
		    <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''?>">
		      <a class="page-link" href="/?page=<?php echo $page - 1;?>" tabindex="-1">Previous</a>
		    </li>

		    
		   <?php for($i = 1; $i <= $total_page; $i++): ?>
		    <li class="page-item <?php echo $page == $i ? 'active' : ''?>">
		    <a class="page-link" href="/?page=<?php echo $i;?>"><?php echo $i;?></a>
		    </li>
		     <?php endfor;?>


		    <li class="page-item <?php echo $page >= $total_page ? 'disabled' : ''?>">
		         <a class="page-link" href="/?page=<?php echo $page + 1;?>" tabindex="-1">Next</a>
		    </li>
		  </ul>
	</nav>



			</div>
		</div>
	</div>
</body>
</html>