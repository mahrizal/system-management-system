
<?php echo $this->flash->output(); ?>
<?php echo $this->tag->linkTo(array('activity/addnew/' . $system->id, 'Add New', 'class' => 'btn btn-default btn-sm pull-right', 'style' => 'margin-bottom:10px')); ?>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Time</th>
			<th>Description</th>
			<th>Module</th>
			<th width="100px">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $i = 1; ?>
	<?php foreach ($system->activities as $activity) { ?>
		<tr>
			<td><?php echo $i; ?>.</td>
			<td><?php echo $activity->date; ?></td>
			<td><?php echo $activity->start_hour; ?> - <?php echo $activity->finish_hour; ?></td>
			<td><?php echo $activity->description; ?></td>
			<td>
				<?php if ($activity->modules_id) { ?>
					<?php echo $activity->modules->name; ?> 
				<?php } ?>
				<?php if ($activity->bugs_id) { ?>
					- bug #<?php echo $this->tag->linkTo(array('activity', $activity->bugs->number)); ?>
				<?php } ?>
			</td>
			<td>
				<?php echo $this->tag->linkTo(array('activity/system/detail/' . $activity->id, '<span class="glyphicon glyphicon-folder-open"></span>')); ?>
				&nbsp; <?php echo $this->tag->linkTo(array('activity/edit/' . $activity->id . '/' . $activity->system_id, '<span class="glyphicon glyphicon-pencil"></span>')); ?>
				&nbsp; <?php echo $this->tag->linkTo(array('activity/delete/' . $activity->id . '/' . $activity->system_id, '<span class="glyphicon glyphicon-trash"></span>')); ?>
			</td>
		</tr>
		<?php $i = $i + 1; ?>
		<?php } ?>
	</tbody>
</table>