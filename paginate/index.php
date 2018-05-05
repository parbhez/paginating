<?php
	$page = 1;
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	}
	$limit = 5;
	//$offset = 0;
	$offset = $page * $limit - $limit;
/**
page Limit Offset
1     5      0 {($page * $limit) - $limit = $offset}
2 	  5  	 5 {($page * $limit) - $limit = $offset}
3     5      10 {($page * $limit) - $limit = $offset}
4     5      15 {($page * $limit) - $limit = $offset}
5     5      20 {($page * $limit) - $limit = $offset}
*/

/**
$number_of_page = ceil(44 / 5) = 9
*/


	$con = new PDO('mysql:dbname=paginate;host=localhost','root','');
	$statement = $con->prepare("select * from people limit $limit offset $offset");
	$statement->execute();
	$people = $statement->fetchAll(PDO::FETCH_OBJ);

	$statement2 = $con->prepare("select * from people");
	$statement2->execute();
	$total_row = $statement2->rowCount();
	$total_page	= ceil($total_row / $limit);
	// echo "$total_row";
	// echo "<br/>";
	// echo "$total_page";




?>



<!DOCTYPE html>
<html>
<head>
	<title>Paginate</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body class="bg-success">
	<div class="container mt-5">
		<div class="card bg-info">
			<div class="card-header">
				<h1>All people</h1>
			</div>
				<div class="card-body">
					<table class="table table-bordered">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Age</th>
						</tr>
						<?php foreach ($people as $person): ?>
							<tr>
								<td><?php echo $person->id; ?></td>
								<td><?php echo $person->name; ?></td>
								<td><?php echo $person->email; ?></td>
								<td><?php echo $person->age; ?></td>
							</tr>
						<?php endforeach; ?>
					</table>

			<nav aria-label="...">
  <ul class="pagination">
    <li class="page-item <?php echo $page <= 1 ? 'disabled' : '' ?>">
      <a class="page-link" href="/?page=<?php echo $page - 1;?>" tabindex="-1">Previous</a>
    </li>
    
    <?php for($i = 1; $i <= $total_page; $i++) :?>
    <li class="page-item <?php echo $i == $page ? 'active' : '' ?>">
    <a class="page-link" href="/?page=<?php echo $i;?>"><?php echo $i;?></a>
    </li>
     <?php endfor;?>

    <li class="page-item <?php echo $page >= $total_page ? 'disabled' : '' ?>">
         <a class="page-link" href="/?page=<?php echo $page + 1;?>" tabindex="-1">Next</a>
    </li>
  </ul>
</nav>
		</div>
		</div>
	</div>
</body>
</html>