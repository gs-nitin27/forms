
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
 });


function save()
{
$("#imagelodar").show();
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
    	$("#imagelodar").hide();
		$( "#msgdiv" ).show();
		$( "#msg" ).html(result);
		setTimeout(function() {
			$('#msgdiv').fadeOut('fast');
		}, 2000);
		window.location.href = url+"/forms/getevent";
    }
});
} 
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
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
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
                    <label id="description_error" hidden>Description is required .</label> 
					  
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
					  <label id="name_error" hidden>Event Name is required .</label> 
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
						<label id="type_error" hidden>Event Type is required .</label> 
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
						<label id="sport_error" hidden>Sport is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="add1" placeholder="Enter Address">
					<label id="address_line1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="add2" placeholder="Enter Address">
				    <label id="address_line2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="city" placeholder="Enter City">
					<label id="city_error" hidden>City is required .</label> 
					</div >
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="state">
					  <input type="text" class="form-control"  id="state_value" placeholder="Enter State" disabled>
					  <label id="state_error" hidden>State is required .</label> 
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="pin" placeholder="Enter Pin">
					  <label id="pin_error" hidden>Pin is required .</label> 
					</div >
					<div class="form-group">
					  <label for="link">Event Link</label>
					  <input type="text" class="form-control"   id="evlink" placeholder="Enter Pin">
					  <label id="event_links_error" hidden>Event Link is required .</label> 
					</div >
					<div class="form-group">
					  <label for="link">Start Date</label>
					  <input type="text" class="form-control"  id="startD" placeholder="Enter Start Date">
					  <label id="start_date_error" hidden>Start Date is required .</label> 
					</div >
					<div class="form-group">
					  <label for="link">End Date</label>
					  <input type="text" class="form-control"  id="endD" placeholder="Enter End Date">
					   <label id="end_date_error" hidden>End Date is required .</label> 
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
					 <label id="organizer_name_error" hidden>Organiser Name is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email_app_collection" >
				    	<label id="email_app_collection_error" hidden>Email is required .</label> 
					</div>
					<div class="form-group">
					  <label for="eventName">Phone No.</label>
					  <input type="text" class="form-control" id="contact" >
					  <label id="mobile_error" hidden>Phone No. is required .</label> 
					</div>
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="orgadd1" placeholder="Enter Address">
				   	<label id="organizer_address_line1_error" hidden>Address Line1 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="orgadd2" placeholder="Enter Address">
					  <label id="organizer_address_line2_error" hidden>Address Line2 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="orgcity" placeholder="Enter City">
					<label id="organizer_city_error" hidden>City is required .</label> 
					</div>
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="orgstate">
					  <input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State" disabled>
					  <label id="organizer_state_error" hidden>State is required .</label> 
					</div>
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin">
				   	<label id="organizer_pin_error" hidden>Pin is required .</label> 
					</div>
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
				      <label id="eligibility1_error" hidden>Criteria 1 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="eventName">Criteria 2</label>
					  <input type="text" class="form-control" id="criteria2" placeholder="Enter Eligibility">
				   	<label id="eligibility2_error" hidden>Criteria 2 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" placeholder="Enter Start Date">
					<label id="entry_start_date_error" hidden>Entry Start Date is required .</label> 
					</div>
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" class="form-control"  id="eendD" placeholder="Enter End Date">
					<label id="entry_end_date_error" hidden>Entry End Date is required .</label> 
					</div>
					<div class="box-header with-border">
					<h4>Terms & Conditions:</h4> 
					</div>	
					  <div class="form-group">
					  <label for="eventName">T & C 1</label>
					  <input type="text" class="form-control" id="terms1" placeholder="">
					<label id="terms_and_conditions1_error" hidden>Terms & Conditions is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">T & C 2</label>
					  <input type="text" class="form-control" id="terms2" placeholder="">
					  <label id="terms_and_conditions2_error" hidden>Terms & Conditions is required .</label> 
					  <input type="hidden" class="form-control" id="filename" placeholder="">
					<!--   <label id="file_name_error" hidden>Terms & Conditions is required .</label>  -->
					</div >
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
			<div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Create Event" name="Create">
			</div>
			 </form>
			
          </div>
	  </div>
</section>
</div>

<script type="text/javascript">	
  
	$("#save").click(function()
	{
     var name                      = $("#evname").val();
     var type                      = $("#evtype").val();
     var address_line1             = $("#add1").val();
     var address_line2             = $("#add2").val();
     var city                      = $("#city").val(); 
     var pin                       = $("#pin").val();
     var description               = $("#edesc").val();
     var eligibility1              = $("#criteria1").val();
     var eligibility2              = $("#criteria2").val();
     var state                     = $("#state").val();
     var terms_and_conditions1     = $("#terms1").val();
     var terms_and_conditions2     = $("#terms2").val();
     var organizer_name            = $("#orgName").val();
     var mobile                    = $("#contact").val();
     var organizer_address_line1   = $("#orgadd1").val(); 
     var organizer_address_line2   = $("#orgadd2").val(); 
     var organizer_city            = $("#orgcity").val();
     var organizer_pin             = $("#orgpin").val();
     var organizer_state           = $("#orgstate").val();
     var event_links               = $("#evlink").val();
     var start_date                = $("#startD").val();
     var end_date                  = $("#endD").val();
     var sport                     = $("#sport").val();
     var entry_start_date          = $("#estartD").val();
     var entry_end_date            = $("#eendD").val();
     var email_app_collection      = $("#email_app_collection").val();
     // var file_name                 = $("#filename").val();
      
    if(name != "" && type != 0 &&  address_line1 != "" &&  address_line2 != "" &&  city != "" &&  pin != "" &&  description != "" && eligibility1 != "" && eligibility2 != "" && state != "" && terms_and_conditions1 != "" && terms_and_conditions2 != "" &&  organizer_name != "" &&  mobile != "" &&  organizer_address_line1 != "" &&   organizer_address_line2 != "" &&  organizer_city != "" &&  organizer_pin != "" &&  organizer_state != "" && event_links != "" && start_date != "" &&  end_date != "" &&  sport != 0 &&  entry_start_date != "" &&    entry_end_date != "" && email_app_collection != "")
      {
           save();
      }  
      else
      {
           if(name =="")
           {
              $("#name_error").show();
              $("#name_error").css("color","red");
            }else{
            		//alert(name);
            $("#name_error").hide();
            }
            if(type == 0){
            $("#type_error").show();
            $("#type_error").css("color","red");
            }else{
            $("#type_error").hide();	
            }
            if(address_line1 ==""){
                $("#address_line1_error").show();
                $("#address_line1_error").css("color","red");
            }else{
            	$("#address_line1_error").hide();	
            }
            if(address_line2 == ""){
            $("#address_line2_error").show();
            $("#address_line2_error").css("color","red");
            }else{
            	$("#address_line2_error").hide();	
            }
            if(city == ""){
            $("#city_error").show();
            $("#city_error").css("color","red");
            }else{
            	$("#city_error").hide();	
            }
            if(pin == ""){
            $("#pin_error").show();
            $("#pin_error").css("color","red");
            }else{
            	$("#pin_error").hide();	
            }
            if(description == ""){
            $("#description_error").show();
            $("#description_error").css("color","red");
            }else{
            	$("#description_error").hide();	
            }
            if(eligibility1 == ""){
            $("#eligibility1_error").show();
            $("#eligibility1_error").css("color","red");
            }else{
            	$("#eligibility1_error").hide();	
            }
            if(eligibility2 == ""){
            $("#eligibility2_error").show();
            $("#eligibility2_error").css("color","red");
            }else{
            	$("#eligibility2_error").hide();	
            }
            if(state == ""){
            $("#state_error").show();
            $("#state_error").css("color","red");
            }else{
            	$("#state_error").hide();	
            }
            if(terms_and_conditions1 == ""){
            $("#terms_and_conditions1_error").show();
            $("#terms_and_conditions1_error").css("color","red");
            }else{
            	$("#terms_and_conditions1_error").hide();	
            }
            if(terms_and_conditions2 == ""){
            $("#terms_and_conditions2_error").show();
            $("#terms_and_conditions2_error").css("color","red");
            }else{
            	$("#terms_and_conditions2_error").hide();	
            }
            if(organizer_name == ""){
            $("#organizer_name_error").show();
            $("#organizer_name_error").css("color","red");
            }else{
            	$("#organizer_name_error").hide();	
            }
            if(mobile == ""){
            $("#mobile_error").show();
            $("#mobile_error").css("color","red");
            }else{
            	$("#mobile_error").hide();	
            }
            if(organizer_address_line1 == ""){
            $("#organizer_address_line1_error").show();
            $("#organizer_address_line1_error").css("color","red");
            }else{
            	$("#organizer_address_line1_error").hide();	
            }
            if(organizer_address_line2 == ""){
            $("#organizer_address_line2_error").show();
            $("#organizer_address_line2_error").css("color","red");
            }else{
            	$("#organizer_address_line2_error").hide();	
            }
            if(organizer_city == ""){
            $("#organizer_city_error").show();
            $("#organizer_city_error").css("color","red");
            }else{
            	$("#organizer_city_error").hide();	
            }
            if(organizer_pin == ""){
            $("#organizer_pin_error").show();
            $("#organizer_pin_error").css("color","red");
            }else{
            	$("#organizer_pin_error").hide();	
            }
            if(organizer_state  == ""){
            $("#organizer_state_error").show();
            $("#organizer_state_error").css("color","red");
            }else{
            	$("#organizer_state_error").hide();	
            }
            if(event_links == ""){
            $("#event_links_error").show();
            $("#event_links_error").css("color","red");
            }else{
            	$("#event_links_error").hide();	
            }
            if(start_date == ""){
            $("#start_date_error").show();
            $("#start_date_error").css("color","red");
            }else{
            	$("#start_date_error").hide();	
            }
            if(end_date == ""){
            $("#end_date_error").show();
            $("#end_date_error").css("color","red");
            }else{
            	$("#end_date_error").hide();	
            }
            if(sport == 0){
            $("#sport_error").show();
            $("#sport_error").css("color","red");
            }else{
            	//alert(sport);
            	$("#sport_error").hide();	
            }
            if(entry_start_date == ""){
            $("#entry_start_date_error").show();
            $("#entry_start_date_error").css("color","red");
            }else{
            	$("#entry_start_date_error").hide();	
            }
             if(entry_end_date == ""){
            $("#entry_end_date_error").show();
            $("#entry_end_date_error").css("color","red");
            }else{
            	$("#entry_end_date_error").hide();	
            }
            if(email_app_collection  == ""){
            $("#email_app_collection_error").show();
            $("#email_app_collection_error").css("color","red");
            }else{
            	$("#email_app_collection_error").hide();	
            }
            // if(file_name == ""){
            //  $("#file_name_error").show();
            //  $("#file_name_error").css("color","red");
            // }else{
            //  $("#file_name_error").hide();	
            // }
      }  
	});
</script>