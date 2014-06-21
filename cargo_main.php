<?php
$con=mysqli_connect("localhost","root","","delivermedb");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

echo'
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Страница груза</title>
	<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
	<link rel="stylesheet" href="style.css" />
	
</head>

<body>
<div class="table-title">
<h3>Cargo Table</h3>
</div>
<table class="table-fill"."sortable" cellpadding="5" cellspacing="5" border="2" id="table">


<thead>
<tr>
<th class="text-left">ID</th>
<th class="text-left">Откуда</th>
<th class="text-left">Куда</th>
<th class="text-left">Груз</th>
<th class="text-left">Готовность груза</th>
<th class="text-left">Дата публикации</th>
<th class="text-left">Информация</th>
</tr>
</thead>
';

echo'
<tbody class="table-hover">';


$result = mysqli_query($con,"SELECT * FROM cargo_order_record order by cargo_order_record.to asc");

while($row = mysqli_fetch_array($result)) {
$originalDate = $row["time_range_start"];
$newDate = date("m ([ .\t-])* dd [,.stndrh\t ]*", strtotime($originalDate));
  echo '
 
<tr>
<td class="text-left">'."c".$row["id"]; echo'</td>
<td class="text-left">'.$row["from"]; echo'</td>
<td class="text-left">'.$row["to"]; echo'</td>
<td class="text-left">'.$row["cargo_type"]; echo'</td>
<td class="text-left">'."с ".$newDate." по ".$row["time_range_end"]; echo'</td>
<td class="text-left">'.$row["publish_date"]; echo'</td>
<td class="text-left"><a href="cargo_info.php?ID='	.$row["id"]; echo'">Подробнее</td>
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