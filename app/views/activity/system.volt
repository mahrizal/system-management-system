
{{ flash.output() }}
{{ link_to('activity/addnew/'~ system.id, 'Add New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

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
	{% set i = 1 %}
	{% for activity in system.activities %}
		<tr>
			<td>{{ i }}.</td>
			<td>{{ activity.date }}</td>
			<td>{{ activity.start_hour }} - {{ activity.finish_hour }}</td>
			<td>{{ activity.description }}</td>
			<td>
				{% if activity.modules_id %}
					{{ activity.modules.name }} 
				{% endif %}
				{% if activity.bugs_id %}
					- bug #{{ link_to('activity',activity.bugs.number ) }}
				{% endif %}
			</td>
			<td>
				{{ link_to('activity/system/detail/'~activity.id, '<span class="glyphicon glyphicon-folder-open"></span>') }}
				&nbsp; {{ link_to('activity/edit/'~activity.id~'/'~activity.system_id, '<span class="glyphicon glyphicon-pencil"></span>') }}
				&nbsp; {{ link_to('activity/delete/'~activity.id~'/'~activity.system_id, '<span class="glyphicon glyphicon-trash"></span>') }}
			</td>
		</tr>
		{% set i = i + 1 %}
		{% endfor %}
	</tbody>
</table>