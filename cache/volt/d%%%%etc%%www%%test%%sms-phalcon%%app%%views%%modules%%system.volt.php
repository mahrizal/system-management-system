<?php echo $this->flash->output(); ?>
<?php echo $this->tag->linkTo(array('modules/addnew/' . $system->id, 'Add New', 'class' => 'btn btn-default btn-sm pull-right', 'style' => 'margin-bottom:10px')); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="200px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 1; ?>
	<?php foreach ($system->modules as $modules) { ?>
		<tr>
			<td><?php echo $i; ?>.</td>
			<td><?php echo $modules->name; ?></td>
			<td><?php echo $modules->description; ?></td>
			<td>
				<?php echo $this->tag->linkTo(array('modules/detail/' . $modules->id, '<button class="btn btn-default btn-sm">Detail</button>')); ?>
				<?php echo $this->tag->linkTo(array('modules/edit/' . $modules->id . '/' . $modules->system_id, '<button class="btn btn-warning btn-sm">Edit</button>')); ?>
				<?php echo $this->tag->linkTo(array('modules/delete/' . $modules->id . '/' . $modules->system_id, '<button class="btn btn-danger btn-sm">Delete</button>')); ?>
			</td>
		</tr>
		<?php $i = $i + 1; ?>
		<?php } ?>
	</tbody>
</table>