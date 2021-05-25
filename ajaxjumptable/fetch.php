<?php

//fetch.php

$connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");

$column = array("customer_id", "customer_first_name", "customer_last_name", "customer_email", "customer_gender");

$query = "SELECT * FROM customer_table ";

if(isset($_POST["search"]["value"]))
{
	$query .= '
	WHERE customer_id LIKE "%'.$_POST["search"]["value"].'%" 
	OR customer_first_name LIKE "%'.$_POST["search"]["value"].'%" 
	OR customer_last_name LIKE "%'.$_POST["search"]["value"].'%" 
	OR customer_email LIKE "%'.$_POST["search"]["value"].'%" 
	OR customer_gender LIKE "%'.$_POST["search"]["value"].'%" 
	';
}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY customer_id DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
	$query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$result = $connect->query($query . $query1);

$data = array();

foreach($result as $row)
{
	$sub_array = array();

	$sub_array[] = $row['customer_id'];

	$sub_array[] = $row['customer_first_name'];

	$sub_array[] = $row['customer_last_name'];

	$sub_array[] = $row['customer_email'];

	$sub_array[] = $row['customer_gender'];

	$data[] = $sub_array;
}

function count_all_data($connect)
{
	$query = "SELECT * FROM customer_table";

	$statement = $connect->prepare($query);

	$statement->execute();

	return $statement->rowCount();
}

$output = array(
	"draw"		=>	intval($_POST["draw"]),
	"recordsTotal"	=>	count_all_data($connect),
	"recordsFiltered"	=>	$number_filter_row,
	"data"		=>	$data
);

echo json_encode($output);

?>