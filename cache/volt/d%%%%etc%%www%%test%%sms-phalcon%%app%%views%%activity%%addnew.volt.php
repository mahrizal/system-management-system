
<?php echo $this->tag->form(array('activity/addsubmit', 'id' => 'modulesForm')); ?>

    <fieldset>
        <div class="control-group">
            <?php echo $form->label('date', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('date', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
		 <div class="control-group">
            <?php echo $form->label('start_hour', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('start_hour', array('class' => 'form-control')); ?>
                <p class="help-block">(required)</p>
            </div>
        </div>
		 <div class="control-group">
            <?php echo $form->label('finish_hour', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('finish_hour', array('class' => 'form-control')); ?>
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
            <?php echo $form->label('bugs_id', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('bugs_id', array('class' => 'form-control')); ?>
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
      <div class="form-actions">
			<?php echo $this->tag->hiddenField(array('system_id', 'value' => $system->id)); ?>
            <?php echo $this->tag->submitButton(array('Submit', 'class' => 'btn btn-primary')); ?>
          
        </div>

    </fieldset>
</form>
