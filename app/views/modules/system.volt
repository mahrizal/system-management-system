{{ flash.output() }}
{{ link_to('modules/addnew/'~ system.id, 'Add New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

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
	{% set i = 1 %}
	{% for modules in system.modules %}
		<tr>
			<td>{{ i }}.</td>
			<td>{{ modules.name }}</td>
			<td>{{ modules.description }}</td>
			<td>
				{{ link_to('modules/system/detail/'~modules.id, '<button class="btn btn-default btn-sm">Detail</button>') }}
				{{ link_to('modules/edit/'~modules.id~'/'~modules.system_id, '<button class="btn btn-warning btn-sm">Edit</button>') }}
				{{ link_to('modules/delete/'~modules.id~'/'~modules.system_id, '<button class="btn btn-danger btn-sm">Delete</button>') }}
			</td>
		</tr>
		{% set i = i + 1 %}
		{% endfor %}
	</tbody>
</table>