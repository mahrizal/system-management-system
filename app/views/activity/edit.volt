
{{ form('activity/edit/'~activity.id~'/'~activity.system_id, 'id': 'modulesForm') }}

    <fieldset>
        <div class="control-group">
            {{ form.label('date', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('date', ['class': 'form-control']) }}
                <p class="help-block">(required)</p>
            </div>
        </div>
		 <div class="control-group">
            {{ form.label('start_hour', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('start_hour', ['class': 'form-control']) }}
                <p class="help-block">(required)</p>
            </div>
        </div>
		 <div class="control-group">
            {{ form.label('finish_hour', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('finish_hour', ['class': 'form-control']) }}
                <p class="help-block">(required)</p>
            </div>
        </div>
		
		
		<div class="control-group">
            {{ form.label('modules_id', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('modules_id', ['class': 'form-control']) }}
                <p class="help-block">(required)</p>
            </div>
        </div>

        <div class="control-group">
            {{ form.label('description', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('description', ['class': 'form-control']) }}
                <p class="help-block">(required)</p>
              
            </div>
        </div>	
      <div class="form-actions">
             {{ form.render('id', ['class': 'form-control']) }}
            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
          
        </div>

    </fieldset>
</form>
