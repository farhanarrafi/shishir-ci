
<form action="" name="user-input-form" method="POST" role="form">
	<table class="table table-hover table-bordered">
		<thead>
			<tr>
				<th>Serial</th>
				<th>User Email</th>
				<th>First Name</th>
				<th>last Name</th>
			</tr>
		</thead>
		<tbody>
                    <?php
                    $i=1;
                    foreach($result as $row) {
                        echo "<tr>";
                        echo "<td>" .$i++. "</td>";
                        echo "<td>" .$row->Email . "</td>";
                        echo "<td>" .$row->Firstname . "</td>";
                        echo "<td>" .$row->Lastname . "</td>";
                        echo "</tr>";
                    }
                    ?>
		</tbody>
	</table>
	                                                       
</form>