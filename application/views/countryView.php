<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Country Name Display</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    .country-table {
                        width: 50%;
                        border: thin #000;
                        margin: 0 auto;
                    }
                </style>
	</head>
	<body>
		<h1 class="text-center">Display Country Names</h1>
                <table  class="table table-hover country-table">
			<thead>
				<tr>
					<th>Serial No</th>
                                        <th>Country Name</th>
				</tr>
			</thead>
			<tbody>
<?php
$i = 1;
    foreach($result as $row) {
        echo "<tr>";
        echo "<td>" . $i++ ."</td>";
        echo "<td>" . $row->CountryName ."</td>";
        echo "</tr>";
    }
?>
			</tbody>
		</table>
		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>