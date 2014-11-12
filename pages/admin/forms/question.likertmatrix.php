<div id="sub_form_likertmatrix" class="sub_form">
	<h3><?php _e('Likert Matrix Answers', 'wp-survey-and-quiz-tool'); ?></h3>
	
	<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<thead>
			<tr>
				<td><?php _e('Name', 'wp-survey-and-quiz-tool'); ?></td>
				<td><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></td>
			</tr>
		</thead>
		<tbody>
			<?php   $i = 0;
					foreach( $answers as $key => $answer ) { ?>
				<tr>
					<td><input type="text" name="likertmatrix_name[<?php echo $i; ?>]" value="<?php echo esc_attr(wp_kses_stripslashes($answer["text"])); ?>" /></td>
					<td><input type="checkbox" name="likertmatrix_delete[<?php echo  $i; ?>]" value="yes" /></td>
				</tr>
			<?php	
					$i++; 
				} ?>
		</tbody>
	</table>

	<p><a href="#" class="button-secondary" title=<?php _e('Add New Answer', 'wp-survey-and-quiz-tool'); ?> id="wsqt_likertmatrix_add"><?php _e('Add New Answer', 'wp-survey-and-quiz-tool'); ?></a></p>
			
</div>