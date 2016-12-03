
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
	$event = $required['event'][0]; ?>
<div class="main container">
	<div class="sec1 row">
<!-- <i class="fa fa-arrow-left"></i> -->
<img src="<?php echo base_url('img/arrow.png');?>" />
<p>Event Details</p>
	</div>
	<div class="sec2 row">
		<p style="margin-bottom:5px;"><strong><?php echo ucfirst($event['name']);?></strong></p>
		<p><?php echo $event['type'];?>	</p>
		<p><?php echo $event['address_1'];?></p>
		<!-- <i>Job posted 72 days ago</i> -->
	</div>
		<div class="sec3 row">
<div class="cust_head"> 
<strong>Event Description</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><?php echo ucfirst($event['description']);?></td>
             </tr>

    
  </table>


<div class="cust_head"> 
<strong>Event Details</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><strong>Event  Location </strong></td> 
        <td><?php echo ucfirst($event['location']);?></td>
             </tr>

<tr>
        <td><strong>Sport</strong></td> 
        <td><?php echo $event['sport'];?></td>
             </tr>

<tr>
        <td><strong>Eligibility</strong></td> 
        <td><?php echo $event['eligibility1'];?></td>
             </tr>

<tr>
        <td><strong>Eligibility</strong></td> 
        <td><?php echo @$event['eligibility2'];?></td>
             </tr>
    
  </table>


<table class="table">
         

        <div  class="timeline-item">
            <h5 class="timeline-header no-border" style="color: rgb(0,0,255);opacity:0.6"><b> Link: </b>&nbsp;
              <a href="<?php echo ucfirst($event['event_links']);?>" target="_blank"><?php echo ucfirst($event['event_links']);?></a></h5>
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