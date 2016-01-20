

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Date</th>
			<th>Time</th>
			<th>Description</th>
			<th width="200px">Action</th>
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
				<?php echo $this->tag->linkTo(array('activity/system/detail/' . $activity->id, '<button class="btn btn-default btn-sm">Detail</button>')); ?>
				<?php echo $this->tag->linkTo(array('activity/system/edit/' . $activity->id, '<button class="btn btn-warning btn-sm">Edit</button>')); ?>
				<?php echo $this->tag->linkTo(array('activity/system/delete/' . $activity->id, '<button class="btn btn-danger btn-sm">Delete</button>')); ?>
			</td>
		</tr>
		<?php $i = $i + 1; ?>
		<?php } ?>
	</tbody>
</table>