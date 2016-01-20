
{{ flash.output() }}
{{ link_to('bugs/addnew/'~ system.id, 'Add New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

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
	{% set i = 1 %}
	{% for bug in system.bugs %}
		<tr>
			<td>{{ i }}.</td>
			<td>#{{ bug.number }}</td>
			<td>{{ bug.date_found }}</td>
			<td>{{ bug.description }}</td>
			<td>
				{% if bug.modules_id !== '0' %}
					{{ bug.modules.name }}
				{% endif %}
			</td>
			<td>
				&nbsp; {{ link_to('activity/edit/'~bug.id~'/'~bug.system_id, '<span class="glyphicon glyphicon-pencil"></span>') }}
				&nbsp; {{ link_to('activity/delete/'~bug.id~'/'~bug.system_id, '<span class="glyphicon glyphicon-trash"></span>') }}
			</td>
		</tr>
		{% set i = i + 1 %}
		{% endfor %}
	</tbody>
</table>