
<?php echo $this->tag->form(array('versions/addsubmit', 'id' => 'modulesForm')); ?>

    <fieldset>
		<div class="control-group">
            <?php echo $form->label('date', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('date', array('class' => 'form-control', 'placeholder' => 'Type date')); ?>
                <p class="help-block">(optional)</p>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label('version', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->render('version', array('class' => 'form-control', 'placeholder' => 'Type Version', 'value' => $last_version)); ?>
                <p class="help-block">(optional)</p>
            </div>
        </div>

	 
        <div class="form-actions">
			<?php echo $this->tag->hiddenField(array('system_id', 'value' => $system->id)); ?>
            <?php echo $this->tag->submitButton(array('Create', 'class' => 'btn btn-default btn-sm')); ?>       
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
		<?php $i = 1; ?>
				<?php foreach ($activities as $activity) { ?>
			
					<tr>
						<td><?php echo $i; ?>.</td>
						<td><?php echo $activity->date; ?></td>
						<td><?php echo $activity->start_hour; ?> - <?php echo $activity->finish_hour; ?></td>
						<td><?php echo $activity->description; ?></td>
						<td><?php echo $activity->modules->name; ?></td>
			
					</tr>
					<?php $i = $i + 1; ?>
				<?php } ?>
			</table>
