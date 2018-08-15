<?php
						$limit = 1;  
						if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
						$start_from = ($page-1) * $limit;  
  
		 
							$rst = mysqli_query($conn, "SELECT id,quest,answer,option_a,option_b,option_c,option_d FROM questions ORDER BY RAND() LIMIT $start_from, $limit");
									if (mysqli_num_rows($rst) > 0){
									
										
										echo "<form method='post' action=''>";
										while ($row = mysqli_fetch_array($rst))
								{
									echo $row['quest']. "<br/>";
									echo "<input type='radio' value='answer1' name=".$row['id']. ">" .$row['option_a']. "<br/>";
									echo "<input type='radio' value='answer1' name=".$row['id']. ">".$row['option_b']. "<br/>";
									echo "<input type='radio' value='answer1' name=".$row['id']. ">" .$row['option_c']. "<br/>";
									echo "<input type='radio' value='answer1' name=".$row['id']. ">" .$row['option_d']. "<br/>";
								}	;

							}
	

       						 
       						 $limit = 1;
       						 
							$total_records = 5;  
							$total_pages = ceil($total_records / $limit); 
						?>
						<div align="center">
<ul class='pagination text-center' id="pagination">
<?php if(!empty($total_pages)):for($i=1; $i<=$total_pages; $i++):  
 if($i == 1):?>
            <li class='active'  id="<?php echo $i;?>"><a href='xam.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> 
 <?php else:?>
 <li id="<?php echo $i;?>"><a href='xam.php?page=<?php echo $i;?>'><?php echo $i;?></a></li>
 <?php endif;?> 
<?php endfor;endif;?>  
</div>


<script>
jQuery(document).ready(function() {
jQuery("#target-content").load("xam.php?page=1");
    jQuery("#pagination li").live('click',function(e){
 e.preventDefault();
 jQuery("#target-content").html('loading...');
 jQuery("#pagination li").removeClass('active');
 jQuery(this).addClass('active');
        var pageNum = this.id;
        jQuery("#target-content").load("xam.php?page=" + pageNum);
    });
    });
</script>


<link rel="stylesheet" type="text/css" href="jsimplePagination.css">
<script type="text/javascript" src="jquery.simplePagination.js"></script>


// $ctrl = $('<input/>').attr({ type: 'radio', name: myquestions[i][0] , value:'text'}).addLabel("text");
			// $("#ansA").append($ctrl);