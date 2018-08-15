 var myquestions;
 var t='';
 $.ajax({
 	type: "POST",
    url: "controllers/questions.php",
 	success: function(data)
 	{
 		myquestions =JSON.parse(data);

 		
	 	// console.log(atc);
	 	
	 	for(var i=0;i<myquestions.length;i++)
	 	{
	 		a = i + 1;
			t += '<li id ="' + myquestions[i][0] + '"><a href="#">' + a + '</a></li>';


			// $("#quest_list").append('<li id=''><a href="/user/messages">' + myquestions[i][0] +'</a></li>')
			
			// var node = document.createElement("li");                 // Create a <li> node
			// $(node).addClass('background: red');
			// var textnode = document.createTextNode(myquestions[i][0]);         // Create a text node
			// node.appendChild(textnode);                              // Append the text to <li>
			// document.getElementById("quest_list").appendChild(node);
	 	}
	 	$("#quest_list").append(t);
	 	
	}

 });

 






	
							
			
            
            // $('#nextquestion').click(function() {	
                 
            //      $('#questionPane').html(atc[j][1]);   

            // });
 