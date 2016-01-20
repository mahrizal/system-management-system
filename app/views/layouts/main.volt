<div class="page-header">
    <h4>{{ system.name }}</h4>
</div>

<div class="container">

	<div class="row">
		<div class="col-md-3 col-xs-7">
			<ul class="nav nav-pills nav-stacked">
			    <li role="presentation"><a href="{{ url('system/detail/'~ system.id) }}"">About</a></li>
			    <li role="presentation"><a href="{{ url('modules/system/'~ system.id) }}">Modules</a></li>
				<li role="presentation"><a href="{{ url('activity/system/'~ system.id) }}">Activities</a></li>
				<li role="presentation"><a href="{{ url('bugs/system/'~ system.id) }}">Bugs</a></li>
				<li role="presentation"><a href="{{ url('versions/system/'~ system.id) }}">Versions</a></li>
			</ul>
		</div>
		<div class="col-md-9 cols-xs-13">
			<h4>{{ page }}</h4>
			{{ content() }}		
		</div>
	</div>
</div>