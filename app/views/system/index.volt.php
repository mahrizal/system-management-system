
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
				
					<th>Name</th>
				
					<th>Description</th>
				
					<th>Action</th>
				</th>
			</thead>
			<tbody>
			
			<?php foreach ($systems as $system) { ?>
				<tr>
					<td> <?php echo $system->id; ?> </td>
					<td> <?php echo $system->name; ?> </td>
					<td> <?php echo $system->description; ?> </td>
					<td> Edit | Delete </td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		
		
		
  


 