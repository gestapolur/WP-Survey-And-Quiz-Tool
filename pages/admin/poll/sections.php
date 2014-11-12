
<div class="wrap">

	<?php if ( isset($successMessage) ) {?>
		<div class='updated'><?php echo $successMessage; ?></div>
				
	<?php } ?>
	<div id="icon-tools" class="icon32"></div>
	<h2>
		<?php _e('WP Survey And Quiz Tool - Poll Sections', 'wp-survey-and-quiz-tool'); ?>
	</h2>
		
	<?php require WPSQT_DIR.'pages/admin/misc/navbar.php'; ?>
	
	
	<?php if ( isset($_GET['new']) &&  $_GET['new'] == "true" ) { ?>
	<div class="updated">
		<strong><?php _e('Quiz successfully added.', 'wp-survey-and-quiz-tool'); ?></strong>
	</div>
	<?php } ?>
	
	<?php if ( isset($errorArray) && !empty($errorArray) ) { ?>
		<ul class="error">
			<?php foreach($errorArray as $error ){ ?>
				<li><?php echo $error; ?></li>
			<?php } ?>
		</ul>
	<?php } ?>
	<form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="section_form">
		<input type="hidden" name="wpsqt_nonce" value="<?php echo WPSQT_NONCE_CURRENT; ?>" />
	
		<table class="form-table" id="section_table" >
				<thead>
					<tr>
						<th><?php _e('Name', 'wp-survey-and-quiz-tool'); ?></th>
						<th><?php _e('Difficulty', 'wp-survey-and-quiz-tool'); ?></th>
						<th><?php _e('Limit', 'wp-survey-and-quiz-tool'); ?></th>
						<th><?php _e('Order Of Questions', 'wp-survey-and-quiz-tool'); ?></th>
						<th><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></th>
					</tr>
				</thead>
				<tbody>	
					<?php foreach ($validData as $key => $data) {?>			
					<tr>
						<td>
							<input type="hidden" name="sectionid[<?php echo $key; ?>]" value="<?php echo $data['id']; ?>" />
							<input type="text" name="section_name[<?php echo $key; ?>]" value="<?php echo stripslashes($data['name']); ?>" size="30" id="name_<?php echo $key; ?>" />
						</td>
						<td>
							<select name="difficulty[<?php echo $key; ?>]" id="difficulty_<?php echo $key; ?>">
								<option value="easy"<?php if ($data['difficulty'] == 'easy'){?> selected="yes"<?php }?>><?php _e('Easy', 'wp-survey-and-quiz-tool'); ?></option>
								<option value="medium"<?php if ($data['difficulty'] == 'medium'){?> selected="yes"<?php }?>><?php _e('Medium', 'wp-survey-and-quiz-tool'); ?></option>
								<option value="hard"<?php if ($data['difficulty'] == 'hard'){?> selected="yes"<?php }?>><?php _e('Hard', 'wp-survey-and-quiz-tool'); ?></option>
								<option value="mixed"<?php if ($data['difficulty'] == 'mixed'){?> selected="yes"<?php }?>><?php _e('Mixed', 'wp-survey-and-quiz-tool'); ?></option>
							</select>
						</td>
						<td><input type="text" name="number[<?php echo $key; ?>]" value="<?php echo $data['limit']; ?>" size="10" id="number_<?php echo $key; ?>" /></td>
						<td>
							<select name="order[<?php echo $key; ?>]">
								<option value="asc"<?php if ($data['order'] == 'asc'){?> selected="yes"<?php }?>><?php _e('Ascending', 'wp-survey-and-quiz-tool'); ?></option>
								<option value="desc"<?php if ($data['order'] == 'desc'){?> selected="yes"<?php }?>><?php _e('Descending', 'wp-survey-and-quiz-tool'); ?></option>
								<option value="random"<?php if ($data['order'] == 'random'){?> selected="yes"<?php }?>><?php _e('Random', 'wp-survey-and-quiz-tool'); ?></option>
							</select>
						</td>
						<td>
							<input type="checkbox" name="delete[<?php echo $key; ?>]" value="yes" />
						</td>
					</tr>					
					<?php } ?>
				</tbody>
		</table>
	
		<p><a href="#" class="button-secondary" title=<?php _e('Add New Section', 'wp-survey-and-quiz-tool'); ?> id="add_section_quiz">Add Section</a></p>
		<input type="hidden" name="row_count" value="<?php echo sizeof($validData); ?>" id="row_count" />	
		<p class="submit">
			<input class="button-primary" type="submit" name=<?php _e('Save', 'wp-survey-and-quiz-tool'); ?> value=<?php _e('Save', 'wp-survey-and-quiz-tool'); ?> id="submitbutton" />
		</p>
	</form>
		
	<a name="number_of_questions"></a>
	<h4><?php _e('Limit', 'wp-survey-and-quiz-tool'); ?></h4>
	
	<p>The number of questions that will be shown in the section, if left blank it will default to zero. If the number of questions is zero then it will just return all the questions in the section.</p> 
	<p>This field was designed to be used in conjunction with the random order to give random questions per quiz.</p>
	
	<a name="difficutly_def"></a>
	<h4><?php _e('Difficulty Meanings', 'wp-survey-and-quiz-tool'); ?></h4>
	
	<ul>
		<li><strong><?php _e('Easy', 'wp-survey-and-quiz-tool'); ?></strong> - <?php _e('All questions will be ranked as easy.', 'wp-survey-and-quiz-tool'); ?></li>
		<li><strong><?php _e('Medium', 'wp-survey-and-quiz-tool'); ?></strong> - <?php _e('All questions will be ranked as medium - Suggested.', 'wp-survey-and-quiz-tool'); ?></li>
		<li><strong><?php _e('Hard', 'wp-survey-and-quiz-tool'); ?></strong> - <?php _e('All questions will be ranked as hard.', 'wp-survey-and-quiz-tool'); ?></li>
		<li><strong><?php _e('Mixed', 'wp-survey-and-quiz-tool'); ?></strong> - <?php _e('An even number of questions from all sections, unless total number of questions is not dividable by 3. Then it will random choose which difficulty gets the most/least.', 'wp-survey-and-quiz-tool'); ?></li>
	</ul>
	
	<h4><?php _e('Type Meanings', 'wp-survey-and-quiz-tool'); ?></h4>

	<ul>
		<li><strong><?php _e('Multiple Choice', 'wp-survey-and-quiz-tool'); ?></strong> - <?php _e('Displays questions that are multiple choice both multiple and single correct answers.', 'wp-survey-and-quiz-tool'); ?> <strong><?php _e('Has auto marking.', 'wp-survey-and-quiz-tool'); ?></strong></li>
		<li><strong><?php _e('Text Input', 'wp-survey-and-quiz-tool'); ?></strong>  - <?php _e('Displays questions that require text input by the user.', 'wp-survey-and-quiz-tool'); ?> <strong><?php _e('No auto marking.', 'wp-survey-and-quiz-tool'); ?></strong></li>
	</ul>
</div>
<?php require_once WPSQT_DIR.'/pages/admin/shared/image.php'; ?>
