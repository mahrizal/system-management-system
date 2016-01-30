
{{ form('versions/addsubmit', 'id': 'modulesForm') }}

    <fieldset>
		<div class="control-group">
            {{ form.label('date', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('date', ['class': 'form-control', 'placeholder' : 'Type date']) }}
                <p class="help-block">(optional)</p>
            </div>
        </div>
        <div class="control-group">
            {{ form.label('version', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('version', ['class': 'form-control', 'placeholder' : 'Type Version', 'value' : last_version]) }}
                <p class="help-block">(optional)</p>
            </div>
        </div>

	 
        <div class="form-actions">
			{{ hidden_field('system_id', 'value' : system.id) }}
            {{ submit_button('Create', 'class': 'btn btn-default btn-sm') }}       
        </div>

    </fieldset>
</form>
<p>&nbsp;</p>

<table class="table table-bordered">
				<thead>
					<tr>
						<th width="20px">No</th>
						<th width="100px">Date</th>
						<th width="150px">Time</th>
						<th>Description</th>
						<th width="70px">Module</th>
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
