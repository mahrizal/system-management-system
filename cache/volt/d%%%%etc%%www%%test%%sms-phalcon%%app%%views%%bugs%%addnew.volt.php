
<?php echo $this->tag->form(array('bugs/addsubmit', 'id' => 'modulesForm')); ?>

    <fieldset>
        <div class="control-group">
            <?php echo $form->label('date_found', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('date_found', array('class' => 'form-control')); ?>
                <p class="help-block">(optional)</p>
            </div>
        </div>

	    <div class="control-group">
            <?php echo $form->label('number', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('number', array('class' => 'form-control', 'value' => $max_number)); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
		
		<div class="control-group">
            <?php echo $form->label('modules_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('modules_id', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->label('description', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('description', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
              
            </div>
        </div>	
		 <div class="control-group">
            <?php echo $form->label('is_solved', array('class' => 'control-label')); ?>
			<div class="controls">
				Not yet <?php echo $form->render('is_solved2', array('class' => 'form-control')); ?>
			</div>
            <div class="controls">
				Yes <?php echo $form->render('is_solved', array('class' => 'form-control')); ?>
        
            </div>
			  
        </div>
		
      <div class="form-actions">
			<?php echo $this->tag->hiddenField(array('system_id', 'value' => $system->id)); ?>
            <?php echo $this->tag->submitButton(array('Submit', 'class' => 'btn btn-primary')); ?>
          
        </div>

    </fieldset>
</form>
<p></p>
