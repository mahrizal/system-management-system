
<?php echo $this->flash->output(); ?>
<?php echo $this->tag->linkTo(array('bugs/addnew/' . $system->id, 'Add New', 'class' => 'btn btn-default btn-sm pull-right', 'style' => 'margin-bottom:10px')); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Number</th>
			<th>Date found</th>
			<th>Description</th>
			<th>Module</th>
			<th width="70px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 1; ?>
	<?php foreach ($system->bugs as $bug) { ?>
		<tr>
			<td><?php echo $i; ?>.</td>
			<td>#<?php echo $bug->number; ?></td>
			<td><?php echo $bug->date_found; ?></td>
			<td><?php echo $bug->description; ?></td>
			<td>
				<?php if ($bug->modules_id !== '0') { ?>
					<?php echo $bug->modules->name; ?>
				<?php } ?>
			</td>
			<td>
				&nbsp; <?php echo $this->tag->linkTo(array('activity/edit/' . $bug->id . '/' . $bug->system_id, '<span class="glyphicon glyphicon-pencil"></span>')); ?>
				&nbsp; <?php echo $this->tag->linkTo(array('activity/delete/' . $bug->id . '/' . $bug->system_id, '<span class="glyphicon glyphicon-trash"></span>')); ?>
			</td>
		</tr>
		<?php $i = $i + 1; ?>
		<?php } ?>
	</tbody>
</table>