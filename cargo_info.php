<?php




$con=mysqli_connect("localhost","root","","delivermedb");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$urlid = $_GET['ID'];

echo'
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Информация о грузе</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="stylesheet" href="style.css" />
	
</head>

<body>
<div class="table-title">
<h3>Cargo info</h3>
</div>
<table class="table-fill"."sortable" cellpadding="5" cellspacing="5" border="2" id="table">


<thead>
<tr>
<th class="text-left">ID</th>
<th class="text-left">Откуда</th>
<th class="text-left">Куда</th>
<th class="text-left">Груз</th>
<th class="text-left">Актуальное время перевозки</th>
<th class="text-left">Вес груза</th>
<th class="text-left">Объем груза</th>
<th class="text-left">Готовность груза</th>
<th class="text-left">Дата публикации</th>
<th class="text-left">Цена</th>
<th class="text-left">Хрупкость</th>
<th class="text-left">Статус груза</th>
</tr>
</thead>
';

echo'
<tbody class="table-hover">';
$result = mysqli_query($con,"SELECT * FROM cargo_order_record");

while($row = mysqli_fetch_array($result)) {

  echo '
<tr>
<td class="text-left">'."c".$row["id"]; echo'</td>
<td class="text-left">'.$row["from"]; echo'</td>
<td class="text-left">'.$row["to"]; echo'</td>
<td class="text-left">'.$row["cargo_type"]; echo'</td>
<td class="text-left">'."с ".$row["time_range_start"]." по ".$row["time_range_end"]; echo'</td>
<td class="text-left">'.$row["cargo_weight"]; echo'</td>
<td class="text-left">'.$row["cargo_volume"]; echo'</td>
<td class="text-left">'.$row["ready_time"]; echo'</td>
<td class="text-left">'.$row["publish_date"]; echo'</td>
<td class="text-left">'.$row["price"]; echo'</td>
<td class="text-left">'.$row["fragile"]; echo'</td>
<td class="text-left">'.$row["status"]; echo'</td>
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