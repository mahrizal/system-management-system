{{ flash.output() }}
{{ link_to('system/addnew', 'Add New' , 'class': 'btn btn-default btn-sm pull-right', 'style' : 'margin-bottom:10px') }}

		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
				
					<th>Name</th>
				
					<th>Description</th>
				
					<th>Action</th>
				</th>
			</thead>
			<tbody>
			{% set i = 1 %}
			
			{% for system in systems %}
				<tr>
					<td> {{ i }}. </td>
					<td> {{ system.name }} </td>
					<td> {{ system.description }} </td>
					<td>
						{{ link_to('system/detail/'~ system.id, '<button class="btn btn-default btn-sm">Detail</button>'	) }} 
						
						{{ link_to('system/edit/'~ system.id, '<button class="btn btn-warning btn-sm">Edit</button>'	) }} 
						{{ link_to('system/delete/'~ system.id, '<button class="btn btn-danger btn-sm">Delete</button>'	) }} 
						
					</td>
				</tr>
				{% set i=i+1 %}
			{% endfor %}
			</tbody>
		</table>
		
		
		
  


 