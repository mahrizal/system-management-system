

<?php echo $this->tag->form(array('modules/addsubmit', 'id' => 'modulesForm')); ?>

    <fieldset>

        <div class="control-group">
            <?php echo $form->label('name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('name', array('class' => 'form-control')); ?>
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
			<input type="hidden" name="system_id" value="<?php echo $system->id; ?>" />

            <?php echo $this->tag->submitButton(array('Submit', 'class' => 'btn btn-primary')); ?>
          
        </div>

    </fieldset>
</form>
