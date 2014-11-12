<?php 
if ( !isset($rowCount) ){ 
	$rowCount = 1;
}
?>
<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2><?php _e('WP Survey And Quiz Tool - Poll Questions', 'wp-survey-and-quiz-tool'); ?></h2>
		
	<?php require WPSQT_DIR.'pages/admin/misc/navbar.php'; ?>
	
	
	<?php if ( isset($successMessage) ){ ?>
		<div class="updated" id="question_added"><?php echo $successMessage; ?></div>
	<?php } ?>
	
	<?php if ( !empty($errorArray) ){ ?>
		<div class="error">
			<ul>
				<?php foreach ( $errorArray as $error ) { ?>
					<li><?php echo $error; ?></li>
				<?php } ?>
			</ul>
		</div>
	<?php } ?>
	
	
	<form method="POST" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" id="question_form">
		
		<input type="hidden" name="wpsqt_nonce" value="<?php echo WPSQT_NONCE_CURRENT; ?>" />
	
		<?php echo $objForm->display(); ?>
		
		<?php echo $subForm; ?>
		
		<p class="submit">
			<input <?php if (empty($sections)){ ?> disabled="disabled"<?php }?> class="button-primary" type="submit" name=<?php _e('Save', 'wp-survey-and-quiz-tool'); ?> value=<?php _e('Save Question', 'wp-survey-and-quiz-tool'); ?> id="submitbutton" />
		</p>
		
	</form>	
</div>
<?php require_once WPSQT_DIR.'/pages/admin/shared/image.php'; ?>