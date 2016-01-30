
<?php echo $this->flash->output(); ?>
<?php echo $this->tag->linkTo(array('versions/addnew/' . $system->id, 'Create New', 'class' => 'btn btn-default btn-sm pull-right', 'style' => 'margin-bottom:10px')); ?>

	<?php foreach ($versions as $version) { ?>
		<h3><?php echo $version->version; ?> </h3>
	<p class="pull-right">Date : <?php echo $version->date; ?> &nbsp;&nbsp; 	
				&nbsp; <?php echo $this->tag->linkTo(array('versions/edit/' . $version->id . '/' . $version->system_id, '<span class="glyphicon glyphicon-pencil"></span>')); ?>
				&nbsp; <?php echo $this->tag->linkTo(array('versions/delete/' . $version->id . '/' . $version->system_id, '<span class="glyphicon glyphicon-trash"></span>')); ?>
			</span></p>
		
		<?php
	

	$last_version = Versions::findFirst(
		array(
			"date < '{$version->date}'",
			"order" => "date DESC",
			"limit" => 1
		)
	);
	if($last_version)
	{
		$last_date =  $last_version->date;
	}else{
		$last_date = '0000-00-00';
	}
			
				$date = $version->date;
				$activities = Activities::query()
				->where('date <= :date:')
				->andWhere('system_id = :system_id: ')
				->andWhere('date > :last_date: ')
				->bind(array('date' => $version->date, 'system_id'  => $version->system_id, 'last_date' => $last_date ))
				->order('date')
				->execute();
				
			
				?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Date</th>
						<th>Time</th>
						<th>Description</th>
						<th>Module</th>
					</tr>
				</thead>
					<?php $i = 1; ?>
				<?php foreach ($activities as $activity) { ?>
			
					<tr>
						<td><?php echo $i; ?>.</td>
						<td><?php echo $activity->date; ?></td>
						<td><?php echo $activity->start_hour; ?> - <?php echo $activity->finish_hour; ?></td>
						<td><?php echo $activity->description; ?></td>
						<td><?php echo $activity->modules->name; ?></td>
			
					</tr>
					<?php $i = $i + 1; ?>
				<?php } ?>
			</table>
				<hr />

	<?php } ?>
