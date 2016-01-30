
{{ form('bugs/edit/'~bugs.id~'/'~bugs.system_id, 'id': 'modulesForm') }}

    <fieldset>
        <div class="control-group">
            {{ form.label('date_found', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('date_found', ['class': 'form-control']) }}
                <p class="help-block">(optional)</p>
            </div>
        </div>

	    <div class="control-group">
            {{ form.label('number', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('number', ['class': 'form-control', 'value' : max_number ]) }}
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
		 <div class="control-group">
            {{ form.label('is_solved', ['class': 'control-label']) }}
			<div class="controls">
				Not yet {{ form.render('is_solved2', ['class': 'form-control']) }}
			</div>
            <div class="controls">
				Yes {{ form.render('is_solved', ['class': 'form-control']) }}
        
            </div>
			  
        </div>
		
      <div class="form-actions">
			 {{ form.render('id', ['class': 'form-control']) }}
            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
          
        </div>

    </fieldset>
</form>
<p></p>
