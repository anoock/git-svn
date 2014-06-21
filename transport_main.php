<?php
$order = "id";
if ($_GET['order'] == 'from') $order= "from";
if ($_GET['order'] == 'to') $order= "to";
if ($_GET['order'] == 'ready_time') $order= "ready_time";

$con=mysqli_connect("localhost","root","","delivermedb");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo'
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Страница транспорта</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="stylesheet" href="style.css" />
	
</head>

<body>
<div class="table-title">
<h3>Transport Table</h3>
</div>
<table class="table-fill"."sortable" cellpadding="5" cellspacing="5" border="2" id="table">

<thead>
<tr>
<th class="text-left">ID</th>
<th class="text-left"><a href=transport_main.php?order=from&add>Откуда</th>
<th class="text-left"><a href=transport_main.php?order=to&add>Куда</th>
<th class="text-left">Транспорт</th>
<th class="text-left"><a href=transport_main.php?order_by=ready_time>Готовность</th>
<th class="text-left">Информация</th>
</tr>
</thead>
';

echo'
<tbody class="table-hover">';
$query = mysqli_query($con,"SELECT * FROM transport_order_record order by transport_order_record.$order asc");

while($row = mysqli_fetch_array($query)) {

  echo '
<tr>
<td class="text-left">'."t".$row[id]; echo'</td>
<td class="text-left">'.$row[from]; echo'</td>
<td class="text-left">'.$row[to]; echo'</td>
<td class="text-left">'.$row[transport_type]; echo'</td>
<td class="text-left">'.$row[ready_time]; echo'</td>
<td class="text-left">'.""; echo'</td>

</tr>
  ';
  
   }
    mysqli_close($con);
  echo'
</tbody>
</table>
  

  </body>


';


?>