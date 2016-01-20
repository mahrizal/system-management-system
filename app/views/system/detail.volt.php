<div class="page-header">
    <h4><?php echo $system->name; ?></h4>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-3 col-xs-7">
			<ul class="nav nav-pills nav-stacked">
			    <li role="presentation" class="active"><a href="">About</a></li>
			    <li role="presentation"><a href="<?php echo $this->url->get('modules/system/' . $system->id); ?>">Modules</a></li>
				<li role="presentation"><a href="#">Actiivities</a></li>
				<li role="presentation"><a href="#">Versions</a></li>
			</ul>
		</div>
		<div class="col-md-9 cols-xs-13">
				<h4>Detail</h4>
			<table class="">
				
					<tr>
						<th width="170px">Name</th>
						<td width="30px">:</td>
						<td><?php echo $system->name; ?></td>
					</tr>
					<tr>
						<th width="170px">Description</th>
						<td>:</td>
						<td><?php echo $system->description; ?></td>
					</tr>
					<tr>
						<th width="170px">Launching Date</th>
						<td>:</td>
						<td><?php echo $system->launching_date; ?></td>
					</tr>
				
				
			</table>
		
		</div>
	</div>
</div>