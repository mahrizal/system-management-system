

{{ form('modules/edit/'~modules.id~'/'~system.id, 'id': 'modulesForm') }}

    <fieldset>

        <div class="control-group">
            {{ form.label('name', ['class': 'control-label']) }}
            <div class="controls">
                {{ form.render('name', ['class': 'form-control']) }}
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
                {{ form.render('system_id', ['class': 'form-control']) }}
                {{ form.render('id', ['class': 'form-control']) }}

            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
          
        </div>

    </fieldset>
</form>
