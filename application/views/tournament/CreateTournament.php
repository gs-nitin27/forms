
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
clear();
    
$('#save').click(function(){
var data1 = {


    "id"                      : "", 
    "userid"                  : "16",
    "catagory"                : $("#tcatagory").val(),
    "address_line1"           : $("#add1").val(), 
    "address_line2"           : $("#add2").val(), 
    "tournament_name"         : $("#tname").val(),
    "city"                    : $("#city").val(), 
    "pin"                     : $("#pin").val(), 
    "state"                   : $("#state").val(),
    "description"             : $("#tdesc").val(),
    "eligibility1"            : $("#criteria1").val(),
    "eligibility2"            : $("#criteria2").val(),
    "tournament_level"        : $("#tlevel").val(),
    "tournament_gender"       : $("#tgen").val(),
    "terms_and_conditions1"   : $("#terms1").val(),
    "terms_and_conditions2"   : $("#terms2").val(),
    "organizer_name"          : $("#orgName").val(),
    "mobile"                  : $("#contact").val(),
    "organizer_address_line1" : $("#orgadd1").val(), 
    "organizer_address_line2" : $("#orgadd2").val(), 
    "organizer_city"          : $("#orgcity").val(), 
    "organizer_pin"           : $("#orgpin").val(),
    "orgemail"                : $("#orgemail").val(),
    "organizer_state"         : $("#orgstate").val(),
    "tournament_links"        : $("#evlink").val(),
    "start_date"              : $("#startD").val(),
    "end_date"                : $("#endD").val(),
    "sport"                   : $("#tsport").val(),
    "entry_start_date"        : $("#estartD").val(),
    "entry_end_date"          : $("#eendD").val(),
    "emailid"                 : $("#email").val(),
    "tournament_ageGroup"     : $("#tage").val(),
    "file_name"               : $("#filename").val()

 


};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>';
var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveTournament'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
		$( "#msgdiv" ).show();
		$( "#msg" ).html(result);
		setTimeout(function() {
			$('#msgdiv').fadeOut('fast');
		}, 2000);
		window.location.href = url+"/forms/gettournament";
		clear();
    }


});

    
});});

 
  $(function() {
    $( "#startD" ).datepicker();
    $( "#endD" ).datepicker();
    $( "#estartD" ).datepicker();
    $( "#eendD" ).datepicker();
    
    
  });


function clear()
{

$("#tcatagory").val('');
    $("#add1").val(''); 
    $("#add2").val('');
    $("#tname").val('');
    $("#city").val(''); 
    $("#pin").val('');
    $("#state").val('');
    $("#tdesc").val('');
    $("#criteria1").val('');
    $("#criteria2").val('');
    $("#tlevel").val('');
    $("#tgen").val('');
    $("#terms1").val('');
    $("#terms2").val('');
    $("#orgName").val('');
    $("#contact").val('');
    $("#orgadd1").val(''); 
    $("#orgadd2").val(''); 
    $("#orgcity").val(''); 
    $("#orgpin").val('');
    $("#orgemail").val('');
    $("#orgstate").val('');
    $("#evlink").val('');
    $("#startD").val('');
    $("#endD").val('');
    $("#tsport").val('');
    $("#estartD").val();
    $("#eendD").val('');
    $("#email").val('');
    $("#tage").val('');
    $("#filename").val('');


}

  </script>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Tournament
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
		<div class="col-md-11">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Tournament Details </a></li>
              <li><a href="#tab_info" data-toggle="tab">Tournament Info</a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Organiser Details</a></li>
              <li><a href="#tab_eligible" data-toggle="tab">Eligibility Criteria</a></li>
             </ul> 	 
             <form role="form" action="" class="register">  
             <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
			   <div class="box-header with-border">
                <h4>Tournament Details:</h4 > 	
				</div>
                <div class="box-body">
					<div class="form-group">
					  <label>Tournament Description</label>
					  <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="tdesc" ></textarea>
					</div>
					<div class="form-group">
					  <label for="eventName">Tournament Name</label>
					  <input type="text" class="form-control"  id="tname" >
					</div >
					
					 <div class="form-group">
						<?php  
						// SPORTS IS ID BASED
						$sports = $this->register->getSport();
							
						?>
					  <label for="sports">Sport</label>
						<select id="tsport" class="form-control" >
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
						<?php  
						// LEVEL IS ID BASED
						$levels = $this->register->getLevel();
							
						?><label for="level">Level</label>
						<select id="tlevel" class="form-control" >
						<option value="0">- Select -</option>
							<?php if(!empty($levels)){
									foreach($levels as $level){?>
								<option value ="<?php echo $level['id'];?>"><?php echo $level['level'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					</div>
					
					<div class="form-group">
						<?php  
						// LEVEL IS ID BASED
						$Categories = $this->register->getTournamentCategory();
							
						?><label for="sports">Category</label>
						<select id="tcatagory" class="form-control" >
						<option value="0">- Select -</option>
							<?php if(!empty($Categories)){
									foreach($Categories as $Category){?>
								<option value ="<?php echo $Category['id'];?>"><?php echo $Category['category'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					</div>
					
					<div class="form-group">
					<label for="sports">Age Group</label>
						<select id="tage" class="form-control" >
							<option></option>
							<option id="15-18">15-18</option>
							<option id="18-22">18-22</option>
							<option id="20-25">20-25</option>
							<option id="24-28">24-28</option>
						</select>
					</div>
					<div class="form-group">
					<label for="sports">Gender</label>
						<select id="tgen" class="form-control" >
							<option></option>
							<option id="Male">Male</option>
							<option id="Female">Female</option>
							<option id="Transgender">Transgender</option>
						</select>
					</div>

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
			  
			  
			  <div class="tab-pane" id="tab_info">
			   <div class="box-header with-border">
                <h4>Tournament Info</h4> 	
			  </div>
                <div class="box-body">
					
					
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
					</div>
					
					<!-- STATE IS ID BASED -->
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
					  <label for="pin">Tournament Link</label>
					  <input type="text" class="form-control"  id="evlink" value="http://" />
					</div >
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" placeholder="Enter Start Date">
					</div >
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" class="form-control"  id="eendD" placeholder="Enter End Date">
					</div >
				</div>
              </div>
			  
              <div class="tab-pane" id="tab_organiser">
			   <div class="box-header with-border">
                <h4>Organiser Details:</h4> 	
			  </div>
                <div class="box-body">
					
					 <div class="form-group">
					  <label for="eventName">Organiser Name</label>
					  <input type="text" class="form-control" id="orgName" >
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email">
					</div >
					<div class="form-group">
					  <label for="eventName">Contact No.</label>
					  <input type="text" class="form-control" id="contact">
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
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Tournament" name="Create">
			</div>
			 </form>
			
          </div>
	  </div>
		
	  
</div>
</div>
</section>

