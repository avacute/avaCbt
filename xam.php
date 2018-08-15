<?php 
include_once("header.php");
if(isset($_SESSION['candId']) &&  isset($_SESSION['islogin']) && $_SESSION['islogin'] == 1)
{
	$userid = $_SESSION['candId'];
?>

<script type="text/javascript">
	var results =[];
	var marks = 0;
	var userid = <?php echo json_encode($userid); ?>;
	// var myoptions = "";
</script>
<!-- load jquery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<!-- load bootstrap javascript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<!-- <script type="text/javascript" src="js/timer.js"></script> -->
<script type="text/javascript" src="js/questions_loader.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
			var i = 0;

			 var count;
        if(localStorage.getItem("remain")){
          count = localStorage.getItem("remain");
          localStorage.removeItem("remain");
        }else{
          count = 60;
        }
        var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

        function timer() {
            count = count - 1;
            if (count == -1) {
                clearInterval(counter);
                localStorage.removeItem("remain");

                for(var i=0; i<results.length ;i++)
            	{
            		if(myquestions[i][0] == results[i][0][0])
            		{
            			if(myquestions[i][2] == results[i][0][1])
            			{
            				// myoptions.concat(results[i][0]);
            				marks += 1;
            			}
            		}
            	}

                var params = {score: marks, user: userid}; // etc.

                var ser_data = jQuery.param( params );   // arbitrary variable name

                $.ajax({
                            type: "POST",
                            url: "controllers/congrat.php",
                            data: ser_data,
                            success: function(result)
                            {
                                alert("Congratulations, Submission Successful !!");
                                window.location.href = 'index.php';
                            }

                });

                return;
            }

            localStorage.setItem("remain", count);
            var seconds = count % 60;
            var minutes = Math.floor(count / 60);
            var hours = Math.floor(minutes / 60);
            minutes %= 60;
            hours %= 60;

            document.getElementById("timer-place").innerHTML = hours + " : " + minutes + " : " + seconds;
        }

			$('#question').text(myquestions[i][1]);
			$("#prequestion").prop("disabled",true);
				$('#ansA').text(myquestions[i][3]);
	            $('#ansB').text(myquestions[i][4]);
	            $('#ansC').text(myquestions[i][5]);
	            $('#ansD').text(myquestions[i][6]);
	       

			
			$('#nextquestion').click(function() {
				
				valt = $('input[name=answers]:checked').val();
				

				results[i] = [[myquestions[i][0],valt]];

				
				$('input[type="radio"]').prop('checked', false);

				if(i < myquestions.length-1){
					i = i + 1; 
	                $('#question').text(myquestions[i][1]);
	                $('#ansA').text(myquestions[i][3]);
	                $('#ansB').text(myquestions[i][4]);
	                $('#ansC').text(myquestions[i][5]);
	                $('#ansD').text(myquestions[i][6]);
	                if(typeof results[i]!== 'undefined'){
	                	$('input[name=answers][value=' + results[i][0][1] + ']').prop("checked",true);
	                }

	                $("#prequestion").prop("disabled",false);
	            }else{
	            		$("#nextquestion").prop("disabled",true);
	            }	
            });


            $('#prequestion').click(function() {
            
            	valt = $('input[name=answers]:checked').val();
				results[i] = [[myquestions[i][0],valt]];
				$('input[type="radio"]').prop('checked', false);

				if(i > 0){
					i = i - 1; 
                	$('#question').text(myquestions[i][1]);
                	$('#ansA').text(myquestions[i][3]);
	                $('#ansB').text(myquestions[i][4]);
	                $('#ansC').text(myquestions[i][5]);
	                $('#ansD').text(myquestions[i][6]);
	                if(typeof results[i]!== 'undefined'){
	                	$('input[name=answers][value=' + results[i][0][1] + ']').prop("checked",true);
	                }
                	$("#nextquestion").prop("disabled",false); 
            	}else{
            		$("#prequestion").prop("disabled",true);
            	}	
            });

            $('#submit').click(function() {

            	for(var i=0; i<results.length ;i++)
            	{
            		if(myquestions[i][0] == results[i][0][0])
            		{
            			if(myquestions[i][2] == results[i][0][1])
            			{
            				// myoptions.concat(results[i][0]);
            				marks += 1;
            			}
            		}
            	}
	 		
	 			var params = {score: marks, user: userid}; // etc.

				var ser_data = jQuery.param( params );   // arbitrary variable name

	 			$.ajax({
						 	type: "POST",
						    url: "controllers/congrat.php",
						    data: ser_data,
						 	success: function(result)
						 	{
						 		alert("Congratulations, Submission Successful !!");
						 		window.location.href = 'index.php';
							}

 				});

            });
			
	});
</script>
<body>
	
<div class="container-fluid xam_wrapper">
		<div  class="timer-place">
			<p id="timer-place"></p>
		</div>

		<div class="container-fluid">

			<div class="col-md-2 col-lg-2 xam-left"  >
				<ul id='quest_list'>
				</ul>
				
			</div>

			<div class="col-md-10 col-lg-10 xam-right">
				<div class="quest-pane">
					<div style="height: 300px;">
						<div>
							<p style="text-align: center;" id='question'> </p>
							<p style="text-align: center;" id="quest"> </p>
						</div>

						
						<div >
							
							<form>
								<input type="radio" name ='answers' value="A">   <label id="ansA"></label><br>
								<input  type="radio" name ='answers' value="B">   <label id="ansB"></label><br>
								<input  type="radio" name ='answers' value="C">   <label id="ansC"></label><br>
								<input  type="radio" name ='answers' value="D">   <label id="ansD"></label><br>
							</form>


						</div>

					</div>

					<div class="row">
					<div class="col-md-6 col-lg-6" style="text-align: left;"><button class="btn btn-lg btn-warning" style="width: 130px; border-radius: 0;" id = "prequestion"> << Previous </div>
					<div class="col-md-6 col-lg-6" style="text-align: right;"><button class="btn btn-lg btn-warning" style="width: 130px; border-radius: 0;" id="nextquestion" >Next >> </button></div>
					</div>

					<div class="row" style="margin: 0 auto; padding-top: 30px; padding-bottom: 20px; text-align: center;">
						<button id='submit' class="btn-success btn-lg" style="border: 0; border-radius: 0;">Submit Answers</button>
					</div>
					
				</div>

			</div>

			<div class="clearfix"></div>
		
		</div>
</div>
<!-- load jquery -->
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>

<!-- load bootstrap javascript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<?php 
}else{
	header('Location:index.php?error=Please login to access Exams');
}
?>

