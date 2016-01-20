<div class="page-header">
    <h4>New System</h4>
</div>

{{ form('system/submit', 'id': 'registerForm') }}
	<fieldset>

        <div class="control-group">
             <label for="name">Name</label>
            <div class="controls">
                {{ text_field('name') }}          
            </div>
        </div>
		<div class="control-group">
             <label for="name">Description</label>
            <div class="controls">
				{{ text_area("description", "cols": "40", "rows": 6) }}
            </div>
        </div>
		<div class="control-group">
             <label for="name">Launching date</label>
            <div class="controls">
                {{ dateField('launching_date') }}          
            </div>
        </div>
		<div class="control-group">
             <label for="name"></label>
            <div class="controls">
               <button class="btn btn-default">Submit</button>
            </div>
        </div>
   
	</fieldset>

</form>