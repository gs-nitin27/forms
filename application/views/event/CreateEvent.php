
  <script>
//document.domain = "getsporty.in";

		
$(document).ready(function(){
		$('#city').focusout(function(){
			var city_key = $('#city').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity'); ?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#state_value" ).val( res.state );
				$( "#state" ).val( res.id );
				
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

  $('#filename').on('change', function()
    {
      $("#preview").html('');
      $("#preview").html('<img src="loader.gif" alt="Uploading...."/>');
      $("#con").ajaxForm(
      {
        target: '#preview'
      }).submit();
    });
  

$('#save').click(function(){
	
var data1 = {


    "id"                      : "", 
    "userid"                  : $("#userid").val(),
    "name"                    : $("#evname").val(),
    "type"                    : $("#evtype").val(),
    "address_line1"           : $("#add1").val(), 
    "address_line2"           : $("#add2").val(), 
    "city"                    : $("#city").val(), 
    "pin"                     : $("#pin").val(), 
    "description"             : $("#edesc").val(),
    "eligibility1"            : $("#criteria1").val(),
    "eligibility2"            : $("#criteria2").val(),
    "state"                   : $("#state").val(),
    "terms_and_conditions1"   : $("#terms1").val(),
    "terms_and_conditions2"   : $("#terms2").val(),
    "organizer_name"          : $("#orgName").val(),
    "mobile"                  : $("#contact").val(),
    "organizer_address_line1" : $("#orgadd1").val(), 
    "organizer_address_line2" : $("#orgadd2").val(), 
    "organizer_city"          : $("#orgcity").val(), 
    "organizer_pin"           : $("#orgpin").val(),
    "organizer_state"         : $("#orgstate").val(),
    "event_links"             : $("#evlink").val(),
    "start_date"              : $("#startD").val(),
    "end_date"                : $("#endD").val(),
    "sport"                   : $("#sport").val(),
    "entry_start_date"        : $("#estartD").val(),
    "entry_end_date"          : $("#eendD").val(),
    "email_app_collection"    : $("#email_app_collection").val(),
    "file_name"               : $("#filename").val()

 


};
var url = '<?php echo site_url();?>';
console.log(JSON.stringify(data1));

var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/event'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
		$( "#msgdiv" ).show();
		$( "#msg" ).html(result);
		setTimeout(function() {
			$('#msgdiv').fadeOut('fast');
		}, 2000);
		window.location.href = url+"/forms/getevent";
    }


});

    
});});

 
  $(function() {
    $( "#startD" ).datepicker();
    $( "#endD" ).datepicker();
    $( "#estartD" ).datepicker();
    $( "#eendD" ).datepicker();
    
    
  });




  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Event
        
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
              <li class="active"><a href="#tab_event" data-toggle="tab">Event </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Organiser</a></li>
              <li><a href="#tab_eligible" data-toggle="tab">Eligibility</a></li>
             </ul> 	 
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
                
				<div class="box-header with-border">
					<h4>Event Details:</h4 > 		
				</div>
                <div class="box-body">
					<div class="form-group">
					  <label>Event Description</label>
					  <textarea class="form-control" rows="3" style="resize:none;" placeholder="Enter ..." class="desc" id="edesc" ></textarea>
					</div>



              <?php
          $data=$this->session->userdata('item');
          $userid=$data['userid'];
          {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
            </div>
          <?php }?>




					 <div class="form-group">
					  <label for="eventName">Event Name</label>
					  <input type="text" class="form-control"  id="evname" placeholder="Enter Event">
					</div >
					<div class="form-group">
						<?php  $types = $this->register->getEventType();
							
						?>
					  <label for="eventtype">Event Type</label>
						<select id="evtype" class="form-control" >
						<option value="0">- Select -</option> 
							<?php if(!empty($types)){
								
									foreach($types as $type){?>
								<option value ="<?php echo $type['id'];?>"><?php echo $type['type'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					</div >
					<div class="form-group">
						<?php  $sports = $this->register->getSport();
							
						?>
					  <label for="sports">Sport</label>
						<select id="sport" class="form-control" >
						<option value="0">- Select -</option> 
							<?php if(!empty($sports)){
									foreach($sports as $sport){?>
								<option value ="<?php echo $sport['id'];?>"><?php echo $sport['sports'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					</div >
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="add1" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="add2" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="city" placeholder="Enter City">
					</div >
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="state">
					  <input type="text" class="form-control"  id="state_value" placeholder="Enter State" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="pin" placeholder="Enter Pin">
					</div >
					<div class="form-group">
					  <label for="link">Event Link</label>
					  <input type="text" class="form-control" value="http://"  id="evlink" placeholder="Enter Pin">
					</div >
					<div class="form-group">
					  <label for="link">Start Date</label>
					  <input type="text" class="form-control"  id="startD" placeholder="Enter Start Date">
					</div >
					<div class="form-group">
					  <label for="link">End Date</label>
					  <input type="text" class="form-control"  id="endD" placeholder="Enter End Date">
					</div >
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
			  <div class="box-header with-border">
                <h4>Organiser Details:</h4 > 	
			</div>
                <div class="box-body">
					
					 <div class="form-group">
					  <label for="eventName">Organiser Name</label>
					  <input type="text" class="form-control" id="orgName" >
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email_app_collection" >
					</div >
					<div class="form-group">
					  <label for="eventName">Phone No.</label>
					  <input type="text" class="form-control" id="contact" >
					</div >
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="orgadd1" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="orgadd2" placeholder="Enter Address">
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="orgcity" placeholder="Enter City">
					</div >
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="orgstate">
					  <input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin">
					</div >
					
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible">
                 <div class="box-header with-border">
					<h4>Eligibility Criteria:</h4 > 		
				</div>
				
				

                <div class="box-body">
					
					 <div class="form-group">
					  <label for="eventName">Criteria 1</label>
					  <input type="text" class="form-control" id="criteria1" placeholder="Enter Eligibility">
					</div >
					<div class="form-group">
					  <label for="eventName">Criteria 2</label>
					  <input type="text" class="form-control" id="criteria2" placeholder="Enter Eligibility">
					</div >
					
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" placeholder="Enter Start Date">
					</div >
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" class="form-control"  id="eendD" placeholder="Enter End Date">
					</div >
					
					<div class="box-header with-border">
					<h4>Terms & Conditions:</h4> 
					</div>	
					  <div class="form-group">
					  <label for="eventName">T & C 1</label>
					  <input type="text" class="form-control" id="terms1" placeholder="">
					</div >
					<div class="form-group">
					  <label for="eventName">T & C 2</label>
					  <input type="text" class="form-control" id="terms2" placeholder="">
					  <input type="hidden" class="form-control" id="filename" placeholder="">
					  
					</div >
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
			<div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Event" name="Create">
			</div>
			 </form>
			
          </div>
	  </div>
	  
	 
        
       
    



</section>
</div>