<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2>
		<?php _e('WP Survey And Quiz Tool - Quizes', 'wp-survey-and-quiz-tool'); ?>
	</h2>
		
	<?php require WPSQT_DIR.'pages/admin/misc/navbar.php'; ?>
	
	
	<div class="tablenav">
		<div class="alignleft">
			<a href="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>&action=create" class="button-secondary" title="Add New Quiz"><?php _e('Add New Quiz','wp-survey-and-quiz-tool'); ?></a>
		</div>
	
		<div class="tablenav-pages">
		   <?php echo Wpsqt_Core::getPaginationLinks($currentPage, $numberOfPages); ?>
		</div>
	</div>
	
	<table class="widefat">
		<thead>
			<tr>
				<th>ID</th>
				<th><?php _e('Quiz Name', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Status', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('View Results', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Questions', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Sections', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Form', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Configure', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>ID</th>
                                <th><?php _e('Quiz Name', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Status', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('View Results', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Questions', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Sections', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Edit Form', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Configure', 'wp-survey-and-quiz-tool'); ?></th>
				<th><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></th>
			</tr>
		</tfoot>
		<tbody>
			
			<?php
			if ( empty($quizList) ){
				?>
				<tr>
					<td colspan="7"><div style="text-align: center;"><?php _e('No quizes or surveys yet!','wp-survey-and-quiz-tool')?></div></td>
				</tr>
				<?php 
			}
			else {
				foreach ( $quizList as $quiz ) { ?>
			<tr>
				<td><?php echo $quiz['id']; ?></td>
				<td><?php echo stripslashes($quiz['name']); ?></td>
				<td><?php echo ucfirst( stripslashes($quiz['status']) ); ?></td>
				<td><a href="admin.php?page=<?php echo WPSQT_PAGE_QUIZ_RESULTS; ?>&action=list&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="View Results"><?php _e('View Results', 'wp-survey-and-quiz-tool'); ?></a></td>
				<td><a href="admin.php?page=<?php echo WPSQT_PAGE_QUESTIONS; ?>&action=list&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="Edit Questions"><?php _e('Edit Questions', 'wp-survey-and-quiz-tool'); ?></a></td>
				<td><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=sections&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="Edit Sections"><?php _e('Edit Sections', 'wp-survey-and-quiz-tool'); ?></a></td>
				<td><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=forms&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="Edit Form"><?php _e('Edit Form', 'wp-survey-and-quiz-tool'); ?></a></td>
				<td><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=configure&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="Configure Quiz"><?php _e('Configure Quiz', 'wp-survey-and-quiz-tool'); ?></a></td>
				<td><a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=delete&quizid=<?php echo $quiz['id']; ?>" class="button-secondary" title="Delete Quiz"><?php _e('Delete', 'wp-survey-and-quiz-tool'); ?></a></td>
			</tr>
			<?php } 
				}?>
		</tbody>
	</table>
	
	<div class="tablenav">
		<div class="alignleft">
			<a href="<?php echo $_SERVER['REQUEST_URI']; ?>&action=create" class="button-secondary" title="Add New Quiz"><?php _e('Add New Quiz','wp-survey-and-quiz-tool'); ?></a>
		</div>
	
		<div class="tablenav-pages">
		   <?php echo Wpsqt_Core::getPaginationLinks($currentPage, $numberOfPages); ?>
		</div>
	</div>
</div>
<?php require_once WPSQT_DIR.'/pages/admin/shared/image.php'; ?>