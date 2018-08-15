$(document).ready(function(){
        var count;
        if(localStorage.getItem("remain")){
          count = localStorage.getItem("remain");
          localStorage.removeItem("remain");
        }else{
          count = 1800;
        }
        var counter = setInterval(timer, 1000); //1000 will  run it every 1 second

        function timer() {
            count = count - 1;
            if (count == -1) {
                clearInterval(counter);
                localStorage.removeItem("remain");
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
    });


