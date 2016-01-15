
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
				
					<th>Name</th>
				
					<th>Description</th>
				
					<th>Action</th>
				</th>
			</thead>
			<tbody>
			
			{% for system in systems %}
				<tr>
					<td> {{ system.id }} </td>
					<td> {{ system.name }} </td>
					<td> {{ system.description }} </td>
					<td> Edit | Delete </td>
				</tr>
			{% endfor %}
			</tbody>
		</table>
		
		
		
  


 