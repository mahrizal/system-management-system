<?php echo $this->flash->output(); ?>
<?php echo $this->tag->linkTo(array('system/addnew', 'Add New', 'class' => 'btn btn-default btn-sm pull-right', 'style' => 'margin-bottom:10px')); ?>

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
				
					<th>Name</th>
				
					<th>Description</th>
				
					<th>Action</th>
				</th>
			</thead>
			<tbody>
			<?php $i = 1; ?>
			
			<?php foreach ($systems as $system) { ?>
				<tr>
					<td> <?php echo $i; ?>. </td>
					<td> <?php echo $system->name; ?> </td>
					<td> <?php echo $system->description; ?> </td>
					<td>
						<?php echo $this->tag->linkTo(array('system/detail/' . $system->id, '<button class="btn btn-default btn-sm">Detail</button>')); ?> 
						
						<?php echo $this->tag->linkTo(array('system/edit/' . $system->id, '<button class="btn btn-warning btn-sm">Edit</button>')); ?> 
						<?php echo $this->tag->linkTo(array('system/delete/' . $system->id, '<button class="btn btn-danger btn-sm">Delete</button>')); ?> 
						
					</td>
				</tr>
				<?php $i = $i + 1; ?>
			<?php } ?>
			</tbody>
		</table>
		
		
		
  


 