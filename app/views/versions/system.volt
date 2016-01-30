
{{ flash.output() }}
{{ link_to('versions/addnew/'~ system.id, 'Create New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

	{% for version in versions %}
		<h3>{{ version.version }} </h3>
	<p class="pull-right">Date : {{ version.date }} &nbsp;&nbsp; 	
				&nbsp; {{ link_to('versions/edit/'~version.id~'/'~version.system_id, '<span class="glyphicon glyphicon-pencil"></span>') }}
				&nbsp; {{ link_to('versions/delete/'~version.id~'/'~version.system_id, '<span class="glyphicon glyphicon-trash"></span>') }}
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
					{% set i = 1 %}
				{% for activity in activities %}
			
					<tr>
						<td>{{ i }}.</td>
						<td>{{ activity.date }}</td>
						<td>{{ activity.start_hour }} - {{ activity.finish_hour }}</td>
						<td>{{ activity.description }}</td>
						<td>{{ activity.modules.name }}</td>
			
					</tr>
					{% set i = i + 1 %}
				{% endfor %}
			</table>
				<hr />

	{% endfor %}
