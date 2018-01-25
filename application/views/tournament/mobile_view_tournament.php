
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
 <style>
   @font-face {
  font-family: 'gotham book';
  src: url('font/gotham_medium.ttf')  format('truetype')
}
 </style>
</head>
<body>
<?php 
	//print_r();
	$tournament = $required['tournament'][0]; ?>
<div class="main container">
	<div class="sec1 row">
<!-- <i class="fa fa-arrow-left"></i> -->
<img src="<?php echo base_url('img/arrow.png');?>" />
<p>Tournament Details</p>
	</div>
	<div class="sec2 row">
		<p style="margin-bottom:5px;"><strong><?php echo ucfirst($tournament['name']);?></strong></p>
		<p><?php echo $tournament['level'];?>	</p>
		<p><?php echo $tournament['address_1'];?></p>
		<!-- <i>Job posted 72 days ago</i> -->
	</div>
		<div class="sec3 row">
<div class="cust_head"> 
<strong>Tournament Description</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><?php echo ucfirst($tournament['description']);?></td>
             </tr>

    
  </table>


<div class="cust_head"> 
<strong>Tournament Details</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><strong>Tournament Age Group </strong></td> 
        <td><?php echo ucfirst($tournament['age_group']);?></td>
             </tr>

<tr>
        <td><strong>Sport</strong></td> 
        <td><?php echo $tournament['sport'];?></td>
             </tr>

<tr>
        <td><strong>Eligibility</strong></td> 
        <td><?php echo $tournament['eligibility1'];?></td>
             </tr>

<tr>
        <td><strong>Eligibility</strong></td> 
        <td><?php echo @$tournament['eligibility2'];?></td>
             </tr>
    
  </table>


<table class="table">
         

        <div  class="timeline-item">
            <h5 class="timeline-header no-border" style="color: rgb(0,0,255);opacity:0.6"><b> Link: </b>&nbsp;
              <a href="<?php echo ucfirst($tournament['tournaments_link']);?>" target="_blank"><?php echo ucfirst($tournament['tournaments_link']);?></a></h5>
          </div>


    <!-- 
      <tr>
        <td><?php// echo $event['event_links'];?></td>
             </tr> -->

    
  </table>




</div>



</div>

</body>
</html>

<?php  exit;?>