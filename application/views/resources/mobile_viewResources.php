
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
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
	$resource = $required['resource'][0]; 
  print_r($resource);

  ?>
<div class="main container">
	<div class="sec1 row">
<!-- <i class="fa fa-arrow-left"></i> -->
<img src="<?php echo base_url('img/arrow.png');?>" />
<p>Resource Details</p>
	</div>
	<div class="sec2 row">
		<p style="margin-bottom:5px;"><strong><?php echo ucfirst($resource['title']);?></strong></p>
		<p><?php echo $resource['url'];?>	</p>
		<p><?php echo $resource['summary'];?></p>
		
	</div>
		<div class="sec3 row">
 <table class="table">
      <tr>
        <td><?php echo ucfirst($resource['description']);?></td>
             </tr>  
  </table>

</div>


</div>
</body>
</html>

<?php  exit;?>



