

{{ form('modules/addsubmit', 'id': 'modulesForm') }}

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
			<input type="hidden" name="system_id" value="{{ system.id }}" />

            {{ submit_button('Submit', 'class': 'btn btn-primary') }}
          
        </div>

    </fieldset>
</form>
