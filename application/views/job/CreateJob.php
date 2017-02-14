
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
				$( "#jstate_value" ).val( res.state );
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
				$( "#orgstate_value" ).val( res.state );
				$( "#orgstate" ).val( res.id );
				
			  });
		});
clear();

$('#save').click(function()
{
var data1 = {
    "id"                      : "", 
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
    "sports"                  : $("#jsports").val(),
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
    $("input[name='gender']:checked").val('All'); 

}

  </script>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Job
        
      </h1>
     
    </section>
         <section class="content"> 
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
					
					<div class="form-group">
					  <label for="eventName">Job Title</label>
					  <input type="text" class="form-control"  id="jtitle" >
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
					  <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="jdesc" ></textarea>
					</div>
					 
					<div class="form-group">
						
					  <label for="eventtype">Job Type</label>
						<select id="jtype" class="form-control" >
						<option value="0">- Select -</option> 
							
						<option value ="Part Time">Part Time </option>
						<option value ="Full Time">Full Time </option>
							
						</select>
					</div >
					<div class="form-group">
					<?php  
					$sports = $this->register->getSport();	
					?>
					  <label for="sports">Sport</label>
						<select id="jsports" class="form-control" >
						<option value="0">- Select -</option> 
						<?php if(!empty($sports)){
					     foreach($sports as $sport){?>
					     <option value ="<?php echo $sport['id'];?>"><?php echo $sport['sports'];?> </option>
						<?php 	}
						      }	
							?>
						</select>
					</div>
					<div class="form-group">
					  <label for="city">Job Location</label>
					  <input type="text" class="form-control"  id="jcity" placeholder="Enter City">
					</div>
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="jadd1" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="jadd2" placeholder="Enter Address">
					</div >
					<!-- STATE IS ID BASED -->
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="jstate">
					  <input type="text" class="form-control"  id="jstate_value" placeholder="Enter State" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="jpin" placeholder="Enter Pin">
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
					  <input type="text" class="form-control" id="orgName" >
					</div >
					<div class="form-group">
					  <label>About Organisation</label>
					  <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="abOrg" ></textarea>
					</div>
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="add1" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="add2" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="city">Location</label>
					  <input type="text" class="form-control"  id="orgcity" placeholder="Enter City">
					</div>
					<!-- STATE IS ID BASED -->
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="orgstate">
					  <input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin">
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email">
					</div >
					<div class="form-group">
					  <label for="eventName">Contact No.</label>
					  <input type="text" class="form-control" id="cont">
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
					   <select id="jexp" class="form-control">
							<?php for($i=0; $i<=10; $i++){?>	
							<option value="<?php echo $i;?>"><?php echo str_pad($i, 2, '0', STR_PAD_LEFT)." year";?></option>
							<?php } ?>
						</select>
					</div >
					<div class="form-group">
					  <label for="eventName">Qualifications</label>
					  <input type="text" class="form-control" id="jqualification" >
					</div >
					<div class="form-group">
					  <label for="link">Desired skills</label>
					  <input type="text" class="form-control"  id="skill" >
					</div >
					<div class="form-group">
					  <label for="link">Key Requirement</label>
					  <input type="text" class="form-control"  id="jreq">
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
            <form id="form"  method="post" enctype="multipart/form-data">
	             <!--  Image : <input type="file" name="file" id="file" /> -->
	 <div class="container">
    <div class="row">    
        <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left;margin-left: 0%;">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
                <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="glyphicon glyphicon-remove"></span> Clear
                    </button>
                    <!-- image-preview-input -->
                    <div class="btn btn-default image-preview-input">
                        <span class="glyphicon glyphicon-folder-open"></span>
                        <span class="image-preview-input-title">Browse</span>
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="file"/>
                        
                         <!-- rename it -->
                    </div>
                     <input id="button" type="submit" class="btn btn-danger" value="Upload Image" name="submit">
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>
</div>
	              <div class="form-group">
	              <input type="hidden" class="form-control" name="oldimageid" id="pid" value="0">
	              <input type="hidden" class="form-control" name="path"   id="path" value="uploads/job/">
	              <input type="hidden" class="form-control" name="height" id="height" value="512">
	              <input type="hidden" class="form-control" name="width"  id="width" value="512">
	              </div>
	             <!--  <input id="button" type="submit" value="Upload"> -->
            </form>
              <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img> 
              <input type="hidden" class="form-control" name="photo" id="photo_url"> 
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

<style>
  .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
  </style>
  <script type="text/javascript">
    
    $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'top'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });    
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
  </script>

