
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> -->
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
	$job = $required['job'][0]; ?>
<div class="main container">
	<div class="sec1 row">
<!-- <i class="fa fa-arrow-left"></i> -->
<img src="<?php echo base_url('img/arrow.png');?>" />
<p>Job Details</p>
	</div>
	<div class="sec2 row">
		<p style="margin-bottom:5px;"><strong><?php echo ucfirst($job['title']);?></strong></p>
		<p><?php echo $job['organisation_name'];?>	</p>
		<p><?php echo $job['city_org'];?></p>
		<i>Job posted 72 days ago</i>
	</div>
		<div class="sec3 row">
<div class="cust_head"> 
<strong>Job Description</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><?php echo ucfirst($job['description']);?></td>
             </tr>

    
  </table>


<div class="cust_head"> 
<strong>Job Details</strong>
</div>
 <table class="table">
         
    
      <tr>
        <td><strong>Employment Type</strong></td> 
        <td><?php echo ucfirst($job['title']);?></td>
             </tr>

<tr>
        <td><strong>Key Requirement</strong></td> 
        <td><?php echo $job['key_requirement'];?></td>
             </tr>

<tr>
        <td><strong>Experience</strong></td> 
        <td><?php echo $job['work_experience'];?></td>
             </tr>

<tr>
        <td><strong>Desired Skills</strong></td> 
        <td><?php echo @$job['skill'];?></td>
             </tr>



    
  </table>

<div class="cust_head"> 
<strong>About the Employer </strong>
</div>
<table class="table">
         
    
      <tr>
        <td><?php echo $job['about'];?></td>
             </tr>

    
  </table>




</div>




		<div class="sec4 row"><!--color="#1400aa"-->
<p><strong>Already Applied</strong></p>
	</div>


</div>

</body>
</html>

<?php  exit;?>