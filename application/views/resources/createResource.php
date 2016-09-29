
   <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
 
clear();
   
$('#save').click(function(){

var data1 = {


    "id"                      : "", 
    "userid"                  : "16",
    "title"                   : $("#jtitle").val(),
    "address_line1"           : $("#jadd1").val(), 
    "address_line2"           : $("#jadd2").val(), 
    "type"                    : $("#jtype").val(),
    "city"                    : $("#jcity").val(), 
    "pin"                     : $("#jpin").val(), 
    "state"                   : $("#jstate").val(),
    "description"             : $("#jdesc").val(),
    "work_experience"         : $("#jexp").val(),
    "desired_skills"          : $("#skill").val(),
    "description"             : $("#jdesc").val(),
    "qualification"           : $("#jqualification").val(),
    "key_requirement"         : $("#jreq").val(),
    "about"                   : $("#abOrg").val(),
    "organisation_name"       : $("#orgName").val(),
    "mobile"                  : $("#contact").val(),
    "org_address1"            : $("#add1").val(), 
    "org_address2"            : $("#add2").val(), 
    "org_city"                : $("#orgcity").val(), 
    "org_pin"                 : $("#orgpin").val(),
    "email_app_collection"    : $("#email").val(),
    "contact"                 : $("#cont").val(),
    "org_state"               : $("#orgstate").val(),
    "tournament_links"        : $("#evlink").val(),
    "start_date"              : $("#startD").val(),
    "end_date"                : $("#endD").val(),
    "sports"                  : $("#jsports").val(),
    "gender"                  : $('input[name=gender]:checked').val()

 


};

console.log(JSON.stringify(data1));

var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveJob'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
		$( "#msgdiv" ).show();
		$( "#msg" ).html(result);
		setTimeout(function() {
			$('#msgdiv').fadeOut('fast');
		}, 2000);
clear();
    }


});

    
});});

function clear()
{

    $("#jtitle").val('');
    $("#jadd1").val('');
    $("#jadd2").val(''); 
    $("#jtype").val('');
    $("#jcity").val(''); 
    $("#jpin").val('');
    $("#jstate").val('');
    $("#jdesc").val('');
    $("#jexp").val('');
    $("#skill").val('');
    $("#jdesc").val('');
    $("#jqualification").val('');
    $("#jreq").val('');
    $("#abOrg").val('');
    $("#orgName").val('');
    $("#contact").val('');
    $("#add1").val('');
    $("#add2").val('');
    $("#orgcity").val(''); 
    $("#orgpin").val('');
    $("#email").val('');
    $("#cont").val('');
    $("#orgstate").val('');
    $("#jlink").val('');
    $("#startD").val('');
    $("#endD").val('');
    $("#jsports").val('');
    $("input[name='gender']:checked").val(''); 

}

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
            <!-- form start -->
            <form role="form" enctype='multipart/form-data' id="form_resource"  action="<?php echo site_url('forms/createresources'); ?>" 	method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Link">
                </div>
                <div class="form-group">
				 <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
				 <div class="form-group">
				  <label for="exampleInputEmail1">Content</label>
                   <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file" accept="image/*">

                  <p class="help-block">Upload image file only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input id="sub" type="submit" class="btn btn-primary" value="Submit"/>
              </div>
            </form>
          </div>
	  </div>
	  
</div>
</div>
</section>


