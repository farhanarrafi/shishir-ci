
<div class="table-responsive">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Serial</th>
				<th>Product Name</th>
				<th>Product Category</th>
				<th>Product Quantity</th>
				<th>Product Price</th>
				<th>Product Image</th>
			</tr>
		</thead>
		<tbody>
                    <?php
                    $i=1;
                    foreach($query->result() as $row) {
                        echo "<tr>";
                        echo "<td>" .$i++. "</td>";
                        echo "<td>" .$row->ProductName . "</td>";
                        echo "<td>" .$row->CategoryName . "</td>";
                        echo "<td>" .$row->Stock . "</td>";
                        echo "<td>" .$row->Price . "</td>";
                        $imgsource = base_url()."asset/uploads/".$row->ImageSource;
                        //echo "<td>" .$imgsource. "</td>";
                        echo "<td><img src='". $imgsource ."' alt='...' class='img-thumbnail' /></td>";
                        echo "</tr>";
                    }
                    ?>
		</tbody>
	</table>
</div>
