
<?php 
$chartWidth = get_option('wpsqt_chart_width');
$chartHeight = get_option('wpsqt_chart_height');
$chartTextColour = get_option('wpsqt_chart_text_colour');
$chartTextSize = get_option('wpsqt_chart_text_size');
$chartAbbreviations = get_option('wpsqt_chart_abbreviation');
$chartBackgroundColour = get_option('wpsqt_chart_bg');
$chartColour = get_option('wpsqt_chart_colour');


if (!isset($chartWidth) || $chartWidth == NULL)
	$chartWidth = 400;
if (!isset($chartHeight) || $chartHeight == NULL)
	$chartHeight = 185;
if (!isset($chartTextColour) || $chartTextColour == NULL)
	$chartTextColour = '000000';
if (!isset($chartTextSize) || $chartTextSize == NULL)
	$chartTextSize = 13;
if (!isset($chartBackgroundColour) || $chartBackgroundColour == NULL)
	$chartBackgroundColour='FFFFFF';
if (!isset($chartColour) || $chartColour == NULL)
	$chartColour='FF0000';

if ( $question['type'] == "Multiple Choice" ||
   	$question['type'] == "Dropdown" ) {
	$valueArray    = array();
	$nameArray     = array();
	$google_chart_data = array();
	$google_chart_data[] = array('Answer', 'Count');
	foreach ( $question['answers'] as $answer ) {
		$google_chart_data[] = array($answer['text'], $answer['count']);
   	}
?>
	<div id="chart_<?= $questonKey?>"></div>
<?php 

} else if ($question['type'] == "Free Text") {

	$i = 1; // Variable used to count answers - used later

	?> <em>All answers for this question</em> <?php

	foreach($uncachedresults as $uresult) {
		$usection = unserialize($uresult['sections']);

		foreach($usection as $result) {

			foreach($result['answers'] as $uanswerkey => $uanswer) {
				if($uanswerkey == $questonKey && in_array($uanswerkey, $freetextq)) {
					echo '<p>'.$i.') '.$uanswer['given'][0].'</p>';
					$i++;
				}

			}
		}

	}
} else if ($question['type'] == "Likert") {
	$numAnswers = count($question['answers']);
	
	// Populates data array
	$google_chart_data = array();
	$google_chart_data[] = array('Answer', 'Count');

	if (array_key_exists('Disagree', $question['answers'])) {
		$titles = array('Strongly Disagree', 'Disagree', 'No Opinion', 'Agree', 'Strongly Agree');
	} else {
		$titles = array_keys($question['answers']);
	}
	$i = 0;
	foreach ( $question['answers'] as $key => $answer ) {
		$google_chart_data[] = array($titles[$i], $answer['count']);
		$i++;
	}
?>

	<div id="chart_<?= $questonKey?>"></div>
<?php
} else if ($question['type'] == "Likert Matrix") {
  		
  		if (isset($question['scale']) && $question['scale'] == 'disagree/agree') {
  			$wordScale = true;
  		} else {
  			$wordScale = false;
		}

		// Remove the 'other' answers if it isn't allowed
		$questionMeta = $wpdb->get_row('SELECT meta FROM '.WPSQT_TABLE_QUESTIONS.' WHERE id = "'.$questonKey.'"', ARRAY_A);
		$questionMeta = unserialize($questionMeta['meta']);
		if ($questionMeta['likertmatrixcustom'] == 'no'){
			unset($question['answers']['other']);
		}

		$google_chart_data = array();

		if ($wordScale == true){
			$titles = array('Answer', 'Strongly Disagree', 'Disagree', 'No Opinion', 'Agree', 'Strongly Agree');
		}else{
			$titles = array('Answer', '1', '2', '3', '4', '5');
		}
		$google_chart_data[] = $titles;
  		foreach($question['answers'] as $optionKey => $matrixOption) {
			$row = array();
			$row[] = $optionKey;
			foreach ($matrixOption as $answer) {
				$row[] = $answer['count'];
			}
			$google_chart_data[] = $row;
		}
?>

			<div id="chart_<?= $questonKey?>"></div>
<?php
  } else {
		echo 'Something went really wrong, please report this bug to the GitHub Issues page. Here\'s a var dump which might make you feel better.<pre>'; var_dump($question); echo '</pre>';
  } 

  $google_chart_data = json_encode($google_chart_data); 
?>

<script>
	// Load the Visualization API and the piechart package.
	google.load('visualization', '1.0', {'packages':['corechart']});
      
     // Set a callback to run when the Google Visualization API is loaded.
     google.setOnLoadCallback(drawChart<?=$questonKey?>);


    // Callback that creates and populates a data table, 
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart<?=$questonKey?>() {
    	console.info(<?= $google_chart_data ?>);
		var data = google.visualization.arrayToDataTable(<?= $google_chart_data ?>);

		var options = {
		    title: '<?= $question['name'] ?>',
		    width: '<?= $chartWidth ?>',
        	height: '<?= $chartHeight ?>',
        	hAxis:{ title:'Answers', showTextEvery:1 }
		  };

		var chart = new google.visualization.ColumnChart(document.getElementById('chart_<?= $questonKey?>'));

		chart.draw(data, options);
	}
</script>