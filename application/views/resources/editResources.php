 <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
   
$('#save').click(function(){

var data1 = {


    "id"                      : $("#rid").val(), 
    "user_id"                 : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : $("#rdescription").val(), 
    "summary"                 : $("#rsummary").val()
   
  
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",

    url: '<?php echo site_url('forms/saveEditResources'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
  window.location.href = url+"/forms/getResources";
    }


});

    
});});



</script>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Create Resources
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  <?php if(isset($msg) && $msg != ""){?>
		<div class="col-md-8">
		<div class=" alert alert-success" id="msgdiv" >
			<strong>Info! <span id = "msg"><?php echo $msg;?></span></strong> 
		</div>
		<?php }?>
<div class="col-md-8">
			<div class="box box-primary">
       
            <!-- /.box-header -->

       <?php  $Resources = $this->register->editresources($id); 
           // print_r($contant); 
             foreach ($Resources as $value) 
              
            {?>

            <!-- form start -->

            <!-- <form role="form" enctype='multipart/form-data' id="form_resource"  action="<?php// echo site_url('forms/createresources'); ?>" 	method="post"> -->
            <form>
              <div class="box-body">

            <?php
          $data=$this->session->userdata('item');
          $name=$data['userid'];
        {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="userid" value="<?php echo $name;?>">
            </div>
        <?php }?>

              <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="rid" value="<?php echo $value['id']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="rtitle" id="rtitle" placeholder="Enter title" value="<?php echo $value['title']; ?>">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link" value="<?php echo $value['url']; ?>">
                </div>
                <div class="form-group">
				 <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" id="rsummary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['summary']; ?></textarea>
                </div>
				 <div class="form-group">
				  <label for="exampleInputEmail1">Description</label>
                   <textarea class="textarea" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['description']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file" accept="image/*">

                  <p class="help-block">Upload image file only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->
               <?php } ?>
              <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Save Resources" name="Save">
              </div>
            </form>
          </div>
	  </div>
	  
</div>
</div>
</section>


