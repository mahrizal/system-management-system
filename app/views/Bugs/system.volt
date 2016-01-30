
{{ flash.output() }}
{{ link_to('bugs/addnew/'~ system.id, 'Add New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

<table class="table table-bordered">
	<thead>
		<tr>
			<th width="20px">No</th>
			<th width="70px">Number</th>
			<th width="100px">Found Date</th>
			<th>Description</th>
			<th width="80px">Module</th>
			<th width="120px">Is Solved</th>
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
			{% if bug.is_solved == '0' %}
				Not solved yet
			{% else  %}
				Solved
			{% endif %}
			</td>
			<td>
				&nbsp; {{ link_to('bugs/edit/'~bug.id~'/'~bug.system_id, '<span class="glyphicon glyphicon-pencil"></span>') }}
				&nbsp; {{ link_to('bugs/delete/'~bug.id~'/'~bug.system_id, '<span class="glyphicon glyphicon-trash"></span>') }}
			</td>
		</tr>
		{% set i = i + 1 %}
		{% endfor %}
	</tbody>
</table>