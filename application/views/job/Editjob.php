
   <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
	$('input[value=All]').prop("checked",true);
  $('#jcity').focusout(function(){
			var city_key = $('#jcity').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity'); ?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#jstate_value").val( res.state );
				$( "#jstate" ).val( res.id );
				
			  });
		});
		$('#orgcity').focusout(function(){
			var city_key = $('#orgcity').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity'); ?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#orgstate_value").val( res.state );
				$( "#orgstate" ).val( res.id );
				
			  });
		});


$('#save').click(function(){

var data1 = {


    "id"                      : $("#jid").val(),
    "userid"                  : $("#userid").val(),
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
    "sports"                  : $("#sport").val(),
    "image"                   : $("#photo_url").val(),
    "gender"                  : $('input[name=gender]:checked').val()

};
var url = '<?php echo site_url();?>';
console.log(JSON.stringify(data1));
//console.log($("input[name='gender']:checked").val()+'nitin');return; 
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
		window.location.href = url+"/forms/getJob";

    }


});

    
});});
</script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Job
      </h1>
    </section>
    <section class="content"> 
         <?php $job = $this->register->getJobInfo($id); 
		    if(!empty($job)){
			$job = $job[0];
			}
			
			?>
    <div class="row">
	<div class="col-md-12">
    <div class=" alert alert-success" id="msgdiv" style="display:none">
	<strong>Info! <span id = "msg"></span></strong> 
	</div>
	<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#tab_event" data-toggle="tab">Job Details </a></li>
    <li><a href="#tab_organiser" data-toggle="tab">Organisation</a></li>
    <li><a href="#tab_eligible" data-toggle="tab">Requirements</a></li>
    </ul> 	 
    <form role="form" action="" class="register">  
    <div class="tab-content">
    <div class="tab-pane active" id="tab_event">
	<div class="box-header with-border">
    <h4>Job Details:</h4 > 	
	</div>
    <div class="box-body">
	<input type="hidden" class="form-control"  id="jid" value="<?php echo $job['infoId'];?>" >
	<div class="form-group">
	<label for="eventName">Job Title</label>
	<input type="text" class="form-control"  id="jtitle" value="<?php echo $job['title'];?>" >
	</div >
     <?php
          $data=$this->session->userdata('item');
          $userid=$data['userid'];
          {  ?>
    <div class="form-group">
    <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
    </div>
          <?php }?>
	<div class="form-group">
	<label>Job Description</label>
	<textarea class="form-control" rows="3" style="resize:none;" class="desc" id="jdesc" value="<?php echo $job['description'];?>"  ></textarea>
	</div>	 
	<div class="form-group">
	<label for="eventtype">Job Type</label>
	<select id="jtype" class="form-control" >
	<option value="<?php echo $job['type'];?>"><?php echo $job['type'];?></option>
	<option value ="Part Time">Part Time </option>
	<option value ="Full Time">Full Time </option>
	</select>
	</div>
	<div class="form-group">
        <?php  $sports = $this->register->getSport();   
        ?>
    <label for="sports">Sport</label>
    <select id="sport" class="form-control" >
    <option ><?php echo $job['sport']; ?></option> 
        <?php if(!empty($sports)){
              foreach($sports as $sport){?>
    <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
        <?php   }
                } 
        ?>
    </select>
    </div>
	<div class="form-group">
	<label for="city">Job Location</label>
	<input type="text" class="form-control"  id="jcity" placeholder="Enter City" value="<?php echo $job['city_name'];?>">
	</div>
	<div class="form-group">
	<label for="address1">Address Line1</label>
	<input type="text" class="form-control"  id="jadd1" placeholder="Enter Address" value="<?php echo $job['address1'];?>">
	</div >
	<div class="form-group">
	<label for="address2">Address Line2</label>
	<input type="text" class="form-control"  id="jadd2" placeholder="Enter Address" value="<?php echo $job['address2'];?>">
	</div >
	<!-- STATE IS ID BASED -->
	<div class="form-group">
	<label for="state">State</label>
	<input type="hidden" class="form-control"  id="jstate">
	<input type="text" class="form-control"  id="jstate_value" placeholder="Enter State" value="<?php echo $job['state_name'];?>"  disabled>
	</div >
    <div class="form-group">
	<label for="pin">Pin</label>
	<input type="text" class="form-control"  id="jpin" placeholder="Enter Pin" value="<?php echo $job['pin'];?>">
	</div >		
    </div>
    </div>
     <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_organiser">
	<div class="box-header with-border">
    <h4>Organisation Details:</h4> 	
	</div>
    <div class="box-body">
	<div class="form-group">
	<label for="eventName">Organisation Name</label>
	<input type="text" class="form-control" id="orgName" value="<?php echo $job['organisation_name'];?>">
	</div >
	<div class="form-group">
	<label>About Organisation</label>
	<textarea class="form-control" rows="3" style="resize:none;" class="desc" id="abOrg"  ><?php echo $job['about'];?></textarea>
	</div>
	<div class="form-group">
	<label for="address1">Address Line1</label>
	<input type="text" class="form-control"  id="add1" placeholder="Enter Address" value="<?php echo $job['org_address1'];?>">
	</div >
	<div class="form-group">
	<label for="address2">Address Line2</label>
	<input type="text" class="form-control"  id="add2" placeholder="Enter Address" value="<?php echo $job['org_address2'];?>">
	</div >
	<div class="form-group">
	<label for="city">Location</label>
	<input type="text" class="form-control"  id="orgcity" placeholder="Enter City" value="<?php echo $job['city_org'];?>">
	</div>	
	<!-- STATE IS ID BASED -->
	<div class="form-group">
	<label for="state">State</label>
	<input type="hidden" class="form-control"  id="orgstate">
	<input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State" value="<?php echo $job['state_org'];?>" disabled>
	</div >
	<div class="form-group">
	<label for="pin">Pin</label>
	<input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin" value="<?php echo $job['org_pin'];?>">
	</div >
	<div class="form-group">
	<label for="eventName">Email</label>
	<input type="text" class="form-control" id="email" value="<?php echo $job['email'];?>">
	</div >
	<div class="form-group">
	<label for="eventName">Contact No.</label>
	<input type="text" class="form-control" id="cont" value="<?php echo $job['contact'];?>">
	</div >
	</div>
    </div>
    <!-- /.tab-pane -->
    <div class="tab-pane" id="tab_eligible">
	<div class="box-header with-border">
    <h4>Requirements:</h4> 	
	</div>
    <div class="box-body">
	<div class="form-group">
	<label for="eventName">Work Experience</label>
	<select id="jexp" class="form-control"><?php echo $job['work_experience']." Years";?>
		<?php for($i=0; $i<=10; $i++){?>	
	<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT)." year";?></option>
		<?php } ?>
	</select>
	</div >
	<div class="form-group">
	<label for="eventName">Qualifications</label>
	<input type="text" class="form-control" id="jqualification" value="<?php echo $job['qualification'];?>"  >
	</div >	
	<div class="form-group">
	<label for="link">Desired skills</label>
	<input type="text" class="form-control"  id="skill" >
	</div >
	<div class="form-group">
	<label for="link">Key Requirement</label>
	<input type="text" class="form-control"  id="jreq" value="<?php echo $job['key_requirement'];?>">
	</div >
	<div class="form-group">
	<label for="link">Gender</label>
    <div class="radio">
    <label>
    <input type="radio" name="gender" value="Male" >
         Male
    </label>
    </div>
    <div class="radio">
    <label>
    <input type="radio" name="gender"  value="Female" >
        Female
    </label>
    </div>
    <div class="radio">
    <label>
    <input type="radio" name="gender" value="All">
        All 
    </label>
    </div>
    </div>
	</div>
    </div>
    <!-- /.tab-pane -->
    </div>
    <!-- /.tab-content -->
    </form>
    <img style="display:block; border:2px solid SteelBlue"; width="300px" height="220px" src = "<?php  echo base_url()."uploads/job/".$job['image']; ?>">
    <form id="form"  method="post" enctype="multipart/form-data">
            Image : <input type="file" name="file" id="file" />
    <div class="form-group">
    <input type="hidden" class="form-control" name="path"   id="path" value="uploads/job/">
    <input type="hidden" class="form-control" name="height" id="height" value="512">
    <input type="hidden" class="form-control" name="width"  id="width" value="512">
    <input type="hidden" class="form-control" name="oldimage" id="oldimage" value="<?php echo $job['image']; ?>">
    <input type="hidden" class="form-control" name="oldimageid" id="oldimageid" value="<?php echo $job['infoId']?>">
    </div>
    <input id="button" type="submit" value="Upload">
    </form>
    <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img> 
    <input type="hidden" class="form-control" name="photo" id="photo_url" value="<?php echo $job['image'];?>"> 
    <div id="mess" hidden>Image Uploded</div>
	<div class="box-footer">
	<input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Job" name="Create">
	</div>
    </div>
	</div>  
	</div>
	</div>
	</section>

<script type="text/javascript">
     $(document).ready(function (e) {
     $("#form").on('submit',(function(e) {
     $('#loader_img').show();
      e.preventDefault();
      $.ajax({
      url: "<?php echo site_url('forms/imageupload'); ?>",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
          cache: false,
      processData:false,
      beforeSend : function()
      {
        $("#err").fadeOut();
      },
      success: function(data)
        {
          //alert(data);
               $('#loader_img').hide();
                $('#mess').show();
                $("#photo_url").val(data);   
        },
        error: function(e) 
        {
      
        }           
     });
  }));
});

</script>

