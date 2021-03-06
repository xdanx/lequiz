<!DOCTYPE html>
<html lang="en">
<head>
	<title>:: Kaspersky Academy - Quiz ::</title>
	<meta http-equiv = "Content-Type" content = "text/html; charset=utf-8">
	
	<!-- JQuery (requirement set by Bootstrap) -->
	<script src = "media/js/jquery-2.0.3.min.js"></script>
	<!-- Bootstrap : Main CSS -->
	<link rel = "stylesheet" href = "media/css/bootstrap.min.css">
	<!-- Bootstrap : Optional theme -->
	<link rel = "stylesheet" href = "media/css/bootstrap-theme.min.css">
	<!-- Bootstrap : Latest compiled and minified JavaScript -->
	<script src = "media/js/bootstrap.min.js"></script>
	<!-- JQuote 2 : Custom-->
	<script src = "media/js/jquery.jqote2.min.js"></script>

	<!-- Self -->
	<link rel = "stylesheet" href = "media/css/style.css">
	<script src = "media/js/ka.quiz.vars.js"></script>
	<script src = "media/js/ka.quiz.state.js"></script>	
	<script src = "media/js/ka.quiz.loader.js"></script>

	<!-- Templates -->
	<script id="template" type="text/x-jqote-template">
    	<![CDATA[
        	<button id="quiz_question" class="btn btn-success" data-target="#quiz_modal" entry="<%= this.class + '_' + this.level + '_' + this.id %>">
        		<%= this.level %>
        	</button>	
    	]]>
	</script>

	<script id="template_team_head" type="text/x-jqote-template">
    	<![CDATA[
    		<th class="th_team_names">
    			<%= this.name %>
    		</th>
    	]]>
	</script>

	<script id="template_team_scores" type="text/x-jqote-template">
    	<![CDATA[
    		<td id="<%= this.name %>" class="td_team_scores"> 
        		<%= this.score %>
        	</td>	
    	]]>
	</script>

	<script id="template_quiz_modal_teams" type="text/x-jqote-template">
		<![CDATA[
			<label id="team_checkbox_label" class="btn btn-primary btn-xs" class-toggle="btn-danger">
  				<input id="<%= 'team_checkbox_' + this.name %>" type="checkbox"><%= this.name %>
  			</label>
		]]>
	</script>
</head>

<body>

	<!--
		MAIN MENU
	-->
	<div id="head_row" style="clear: both;">	
		<div id="head_row_container_left">
		 	<a id="head_row_logo" href="http://academy.kaspersky.com/" title="Academy – English – Global – academy.kaspersky.com">
		 		<img src="./media/imgs/logo_transparent.png" width="180" />
			</a>
		</div>

		<div id="head_row_container_right">
			<div id="head_row_menu">
				<p>Last saved: <span id="head_row_time">Never</span></p>
				<p>Log message: <span id="head_row_msg">None</span></p>
				<button id="load_state" class="btn btn-primary btn-xs" type="button">Load state</button>
				<button id="save_state" class="btn btn-primary btn-xs" type="button">Save state</button>
				<button id="reset_state" class="btn btn-primary btn-xs btn-warning" type="button">Reset state</button>
			</div>			
		</div>
	</div>


	<!--
		SCORE BOARD
	-->
	<div id="scoreboard_table" style="clear: both;" align="center">
	<table>
		<thead>
			<tr id="team_names"></tr>
	  	</thead>
	  	<tbody>
	  		<tr id="team_scores"></tr>
	  	</tbody>
	  </table>
	</div>

	<br />

	<!--
		QUESTIONS
	-->
	<div id="questions_table" style="clear: both;" align="center" >
	<table>
		<thead>
			<tr id="class_header">
				<th class="label_container">
					&nbsp;
				</th>
		  		<th class="class_header_cell" id="class_trivia">Trivia</th>
		  		<th class="class_header_cell" id="class_web">Web</th>
		  		<th class="class_header_cell" id="class_misc">Misc</th>
		  		<th class="class_header_cell" id="class_appsec">App Sec</th>
		  		<th class="class_header_cell" id="class_malware">Malware</th>
			</tr>
	  	</thead>
	  	<tbody>
	  		<tr id="level_100">
	  			<td class="label_container">
	  				<span class="label label-default label_vertical">EASIEST</span>
	  			</td>
	  			<td class="quiz_question_tdcell" id="level_100_trivia"></td>
	  			<td class="quiz_question_tdcell" id="level_100_web"></td>	  			
	  			<td class="quiz_question_tdcell" id="level_100_misc"></td>
	  			<td class="quiz_question_tdcell" id="level_100_appsec"></td>
	  			<td class="quiz_question_tdcell" id="level_100_malware"></td>
	  		</tr>

	  		<tr id="level_200">
	  			<td class="label_container">
					<span class="label label-default label_vertical">EASY</span>
	  			</td>
	  			<td class="quiz_question_tdcell" id="level_200_trivia"></td>
	  			<td class="quiz_question_tdcell" id="level_200_web"></td>	  			
	  			<td class="quiz_question_tdcell" id="level_200_misc"></td>
	  			<td class="quiz_question_tdcell" id="level_200_appsec"></td>
	  			<td class="quiz_question_tdcell" id="level_200_malware"></td>
	  		</tr>

	  		<tr id="level_300">
	  			<td class="label_container">
	  				<span class="label label-default label_vertical">NORMAL</span>
	  			</td>
	  			<td class="quiz_question_tdcell" id="level_300_trivia"></td>
	  			<td class="quiz_question_tdcell" id="level_300_web"></td>	  			
	  			<td class="quiz_question_tdcell" id="level_300_misc"></td>
	  			<td class="quiz_question_tdcell" id="level_300_appsec"></td>
	  			<td class="quiz_question_tdcell" id="level_300_malware"></td>
	  		</tr>

	  		<tr id="level_400">
	  			<td class="label_container">
	  				<span class="label label-default label_vertical">HARD</span>
	  			</td>
	  			<td class="quiz_question_tdcell" id="level_400_trivia"></td>
	  			<td class="quiz_question_tdcell" id="level_400_web"></td>	  			
	  			<td class="quiz_question_tdcell" id="level_400_misc"></td>
	  			<td class="quiz_question_tdcell" id="level_400_appsec"></td>
	  			<td class="quiz_question_tdcell" id="level_400_malware"></td>
	  		</tr>

	  		<tr id="level_500">
	  			<td class="label_container">
	  				<span class="label label-default label_vertical">HARDEST</span>
	  			</td>
	  			<td class="quiz_question_tdcell" id="level_500_trivia"></td>
	  			<td class="quiz_question_tdcell" id="level_500_web"></td>	  			
	  			<td class="quiz_question_tdcell" id="level_500_misc"></td>
	  			<td class="quiz_question_tdcell" id="level_500_appsec"></td>
	  			<td class="quiz_question_tdcell" id="level_500_malware"></td>
	  		</tr>
	  	
	  	</tbody>
	
	</table>
	</div>

	<!-- START of MODAL -->
  	<div id="quiz_modal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="quiz_modal_aria" aria-hidden="true">
  		<div class="modal-dialog">
        	<div class="modal-content">

        		<!-- Header -->
  				<div class="modal-header" id="quiz_modal_header">   				
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
    					&times;
    				</button>
        			<h3 class="modal-title" style="font-weigth: bold;">
        				Question: <span id="quiz_modal_title"></span>
        			</h3>
  				</div>

  				<!-- Body -->
  				<div class="modal-body" id="quiz_modal_body">
  					<p id="quiz_modal_question">
  						What is the answer to the fundamental question?
  					</p>
					<div id="quiz_modal_answer" class="quiz_modal_answer_class">
						<div id="quiz_modal_answer_text">
							<!-- Empty space for answer -->
						</div>
						<div id="quiz_modal_teams_container" class="alert alert-info">
							<p style="margin: 0px;">
								Select team who answered correctly
							</p>
							<div id="quiz_modal_teams" class="btn-group" data-toggle="buttons">
								<!-- Empty space for team buttons -->
							</div>
						</div>
					</div>
				</div>

				<!-- Footer -->
				<div class="modal-footer" id="quiz_modal_footer">
					<button id="quiz_modal_time_start"  class="btn btn-success" status="ready_start" style="float: left">
						Start!
					</button>
					<button id="quiz_modal_time_cancel" class="btn btn-danger" data-dismiss="modal" aria-hidden="true" style="float: right">
						Close
					</button>			
					<div> 
						<span id="quiz_modal_time_left">
							Time left: <span id="time_left_seconds">30</span>s
						</span>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- END of MODAL -->

</body>
</html>