
<div class="table-responsive" >
	<table class="table table-hover table-bordered ">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Category Name</th>
				<th>No of Products</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$i = 1;
			foreach ($query->result() as $row) {
                            echo "<tr>"; 
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row->CategoryName . "</td>";
                            echo "<td>" . $row->noOfProdcuts . "</td>";
                            echo "</tr>"; 
			}
		?>
		</tbody>
	</table>
</div>
