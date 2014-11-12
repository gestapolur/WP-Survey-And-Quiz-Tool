<div id="sub_form_multiple" class="sub_form">
	<h3><?php _e('Multiple Choice Answers', 'wp-survey-and-quiz-tool'); ?></h3>
	
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<thead>
			<tr>
				<td><?php _e('Name', 'wp-survey-and-quiz-tool'); ?></td>
				<td><?php _e('Correct', 'wp-survey-and-quiz-tool'); ?></td>
				<td><?php _e('Selected By Default', 'wp-survey-and-quiz-tool'); ?></td>
				<td><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></td>
			</tr>
		</thead>
		<tbody>
			<?php   $i = 0;
					foreach( $answers as $key => $answer ) { ?>
				<tr>
					<td><input type="text" name="multiple_name[<?php echo $i; ?>]" value="<?php echo esc_attr(wp_kses_stripslashes($answer["text"])); ?>" style="width: 98%;" /></td>
					<td><input type="checkbox" name="multiple_correct[<?php echo  $i; ?>]" <?php if ( $answer["correct"] == "yes" ){ ?> checked="checked"<?php }?> value="yes" /></td>
					<td><input type="radio" name="multiple_default" <?php if ( isset($answer["default"]) && $answer["default"] == "yes" ){ ?> checked="checked"<?php }?> value="<?php echo $i; ?>" /></td>
					<td><input type="checkbox" name="multiple_delete[<?php echo  $i; ?>]" value="yes" /></td>
				</tr>
			<?php	
					$i++; 
				} ?>
		</tbody>
	</table>
	
	
	<p><a href="#" class="button-secondary" title=<?php _e('Add New Answer', 'wp-survey-and-quiz-tool'); ?> id="wsqt_multi_add"><?php _e('Add New Answer', 'wp-survey-and-quiz-tool'); ?></a></p>
			
</div>