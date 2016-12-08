
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
						// SPORTS IS ID BASED
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
			<div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Job" name="Create">
			</div>
			 </form>
			
          </div>
	  </div>
	  
</div>
</div>
</section>



