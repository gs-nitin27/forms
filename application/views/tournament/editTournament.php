
<script>
$(document).ready(function(){
   $('#city').focusout(function(){
			var city_key = $('#city').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity');?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#state_value" ).val( res.state );
				$( "#state" ).val( res.state );
				
			  });
		});
		
		$('#orgcity').focusout(function(){
			var city_key = $('#orgcity').val();
			$.ajax({
			    method: "POST",
			    url: '<?php echo site_url('forms/getStateByCity');?>',
				data: { key: city_key }
			}).done(function( html ) {
				var res = jQuery.parseJSON(html)
				$( "#orgstate_value" ).val( res.state );
				$( "#orgstate" ).val( res.state );
				
			  });
		});
 });
    
function save(){
   $("#imagelodar").show();
var data1 = {
  

    "id"                      : $("#id").val(), 
    "userid"                  : $("#userid").val(),
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
      // $("#imagelodar").hide();
       if(result == '1')
         {

         $.confirm({
         title: 'Congratulations!',
         content: 'Tournament is Updated.',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/gettournament?tournament";
                }
            },
            close: function () {
            window.location.href = url+"/forms/gettournament?tournament";
            }
        }
    });
      }
      else
      { 
      	     $('#imagelodar').hide();
             $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                      }
                  },
                  close: function () {
                  }
              }
          });
      }
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
        Update Tournament
        
      </h1>
     
    </section>
         <section class="content"> 
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
      <div class="row">
		<div class="col-md-12">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

		<?php 
        // print_r($id);//die;

		$tournament = $this->register->getTournament($id); 
			// _pr($event);
				if(!empty($tournament)){
					
					$tournament = $tournament[0];
				}
				
		?>

			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab" id="1" >Tournament Details </a></li>
              <li ><a href="#tab_info" data-toggle="tab" id="2" >Tournament Info</a></li>
              <li ><a href="#tab_organiser" data-toggle="tab" id="3" >Organiser Details</a></li>
              <li ><a href="#tab_eligible" data-toggle="tab" id="4" >Eligibility Criteria</a></li>
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
					  <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="tdesc" ><?php echo $tournament['description'] ;?></textarea>
					  <label id="tdesc_error" hidden>Tournament Description is required .</label>
					</div>
					<div class="form-group">
					  <label for="eventName">Tournament Name</label>
					  <input type="text" class="form-control"  id="tname" value="<?php echo $tournament['name'] ;?>" >
                     <label id="tname_error" hidden>Tournament Name is required .</label>
                     <input type="hidden" class="form-control"  id="id" value="<?php echo $tournament['id'] ;?>" >
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
						<?php  
						// SPORTS IS ID BASED
						$sports = $this->register->getSport();
							
						?>
					  <label for="sports">Sport</label>
						<select id="tsport" class="form-control" >
						<option value="<?php echo $tournament['sport'] ;?>"><?php echo $tournament['sport'] ;?></option> 
							<?php if(!empty($sports)){
									foreach($sports as $sport){?>
								<option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
						<label id="tsport_error" hidden>Sport Name is required .</label> 
					</div>
					 
					<div class="form-group">
						<?php  
						// LEVEL IS ID BASED
						$levels = $this->register->getLevel();
							
						?><label for="level">Level</label>
						<select id="tlevel" class="form-control" >
						<option value="<?php echo $tournament['level'] ;?>"><?php echo $tournament['level'] ;?></option>
							<?php if(!empty($levels)){
									foreach($levels as $level){?>
								<option value ="<?php echo $level['level'];?>"><?php echo $level['level'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
						 <label id="tlevel_error" hidden>Level is required .</label> 
					</div>
					
					<div class="form-group">
						<?php  
						// LEVEL IS ID BASED
						$Categories = $this->register->getTournamentCategory();
							
						?><label for="sports">Category</label>
						<select id="tcatagory" class="form-control" >
						<option value="<?php echo $tournament['category'] ;?>"><?php echo $tournament['category'] ;?></option>
							<?php if(!empty($Categories)){
									foreach($Categories as $Category){?>
								<option value ="<?php echo $Category['category'];?>"><?php echo $Category['category'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					</div>
					
					<div class="form-group">
					<label for="sports">Age Group</label>
						<select id="tage" class="form-control" >
							<option ><?php echo $tournament['age_group'] ;?></option>
							<option id="15-18">15-18</option>
							<option id="18-22">18-22</option>
							<option id="20-25">20-25</option>
							<option id="24-28">24-28</option>
						</select>
					</div>
					<div class="form-group">
					<label for="sports">Gender</label>
						<select id="tgen" class="form-control" >
							<option ><?php echo $tournament['gender'] ;?></option>
							<option id="Male">Male</option>
							<option id="Female">Female</option>
							<option id="Transgender">All</option>
						</select>
					</div>

					<?php 
                      $start_date =new  DateTime($tournament['start_date']);
                      //
                      $end_date = new DateTime($tournament['end_date']);
                     {
					?>

					<div class="form-group">
					  <label for="link">Start Date</label>
					  <input type="text" class="form-control"  id="startD" placeholder="Enter Start Date" value="<?php echo $start_date->format('m/d/Y');?>">
					  <label id="startD_error" hidden>Start Date is required .</label> 
					</div >
					<div class="form-group">
					  <label for="link">End Date</label>
					  <input type="text" class="form-control"  id="endD" placeholder="Enter End Date" value="<?php echo $end_date->format('m/d/Y');?>">
					  <label id="endD_error" hidden>End Date is required .</label> 
					</div >
					<?php }?>
				</div>
              </div>
			  
			  
			  <div class="tab-pane" id="tab_info">
			   <div class="box-header with-border">
                <h4>Tournament Info</h4> 	
			  </div>
                <div class="box-body">
					
					
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="add1" placeholder="Enter Address" value="<?php echo $tournament['address_1'] ;?>">
					  <label id="add1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="add2" placeholder="Enter Address" value="<?php echo $tournament['address_2'] ;?>">
					  <label id="add2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="city" placeholder="Enter City" value="<?php echo $tournament['location'] ;?>">
					  <label id="city_error" hidden>City is required .</label> 
					</div>
					
					<!-- STATE IS ID BASED -->
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="state">
					  <input type="text" class="form-control"  id="state_value" placeholder="Enter State" value="<?php echo $tournament['state'] ;?>" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="pin" placeholder="Enter Pin" value="<?php echo $tournament['pin'] ;?>">
					</div >
					<div class="form-group">
					  <label for="pin">Tournament Link</label>
					  <input type="text" class="form-control"  id="evlink" value="<?php echo $tournament['tournaments_link'] ;?>" />
					  <label id="evlink_error" hidden>Tournament Link is required .</label> 
					</div >
					<?php 
                      $event_entry_date =new  DateTime($tournament['event_entry_date']);
                      
                      $event_end_date = new DateTime($tournament['event_end_date']);
                     {
					?>
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" placeholder="Enter Start Date" value="<?php echo $event_entry_date->format('m/d/Y');?>">
					   <label id="estartD_error" hidden>Entry Start Date is required .</label> 

					</div >
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" class="form-control"  id="eendD" placeholder="Enter End Date" value="<?php echo $event_end_date->format('m/d/Y');?>">
					   <label id="eendD_error" hidden>Entry End Date is required .</label> 
					</div >
					<?php }?>
				</div>
              </div>
			  
              <div class="tab-pane" id="tab_organiser">
			   <div class="box-header with-border">
                <h4>Organiser Details:</h4> 	
			  </div>
                <div class="box-body">
					
					 <div class="form-group">
					  <label for="eventName">Organiser Name</label>
					  <input type="text" class="form-control" id="orgName" value="<?php echo $tournament['organiser_name'] ;?>">
					   <label id="orgName_error" hidden>Organiser Name is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email" value="<?php echo $tournament['email'] ;?>">
					   <label id="email_error" hidden>Email is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Contact No.</label>
					  <input type="text" class="form-control" id="contact" value="<?php echo $tournament['mobile'] ;?>">
					   <label id="contact_error" hidden>Contact No. is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="orgadd1" placeholder="Enter Address" value="<?php echo $tournament['org_address1'] ;?>">
					   <label id="orgadd1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="orgadd2" placeholder="Enter Address" value="<?php echo $tournament['org_address2'] ;?>">
					   <label id="orgadd2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="orgcity" placeholder="Enter City" value="<?php echo $tournament['org_city'] ;?>">
					   <label id="orgcity_error" hidden>City is required .</label> 
					</div>
					
					<!-- STATE IS ID BASED -->
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"  id="orgstate">
					  <input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State"      value="<?php echo $tournament['state'] ;?>" disabled>
					</div >
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin" value="<?php echo $tournament['org_pin'] ;?>">
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
					  <input type="text" class="form-control" id="criteria1" value="<?php echo $tournament['eligibility1'] ;?>" placeholder="Enter Eligibility">
					   <label id="criteria1_error" hidden>Criteria 1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Criteria 2</label>
					  <input type="text" class="form-control" id="criteria2" value="<?php echo $tournament['eligibility2'] ;?>" placeholder="Enter Eligibility">
					   <label id="criteria2_error" hidden>Criteria 2 is required .</label> 
					</div >
					
					
					<div class="box-header with-border">
					<h4>Terms & Conditions:</h4> 
					</div>
					 	
					  <div class="form-group">
					  <label for="eventName">T & C 1</label>
					  <input type="text" class="form-control" id="terms1" value="<?php echo $tournament['terms_and_cond1'] ;?>" placeholder="">
					   <label id="terms1_error" hidden>Terms & Conditions is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">T & C 2</label>
					  <input type="text" class="form-control" id="terms2" value="<?php echo $tournament['terms_and_cond2'] ;?>" placeholder="">
					  <input type="hidden" class="form-control" id="filename" placeholder="">
					   <label id="terms2_error" hidden>Terms & Conditions is required .</label> 
					  
					</div >
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
			<div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Update Tournament" name="Create">
			</div>
			 </form>
			
          </div>
	  </div>
		
	  
</div>
</div>
</section>
<script type="text/javascript">

   $("#save").click(function()
   {
      //alert("hi");
    if($("#add1").val() !="" &&   $("#add2").val() !="" &&   $("#tname").val() !="" &&  $("#city").val() !="" &&  $("#tdesc").val() !="" &&  $("#criteria1").val()!="" &&  $("#criteria2").val() !="" && $("#tlevel").val() !="" &&  $("#orgName").val() !="" &&  $("#contact").val() !="" &&   $("#orgadd1").val() !="" &&   $("#orgadd2").val() !="" &&   $("#orgcity").val() !="" &&  $("#orgemail").val() !="" &&  $("#evlink").val() !="" &&  $("#startD").val() !="" && $("#endD").val() !="" &&  $("#tsport").val() !="" && $("#estartD").val() !="" && $("#eendD").val() !="" && $("#email").val() !="")
       {
      	save();
      }else{

             $("#2").css("color","red");
             $("#3").css("color","red");
             $("#4").css("color","red");
             $("html, body").animate({ scrollTop: 0 }, 500);

      	if($("#add1").val() ==""){
      		//alert("hello");
      		$("#add1_error").show();
            $("#add1_error").css("color","red");

      	}else{
             $("#add1_error").hide();
      	}
      	if($("#add2").val() ==""){
            $("#add2_error").show();
      		$("#add2_error").css("color","red");
      	}else{
           $("#add2_error").hide();
      	}
      	if($("#tname").val() ==""){
            $("#tname_error").show();
      		$("#tname_error").css("color","red");
      	}else{
           $("#tname_error").hide();
      	}
      	if($("#city").val() ==""){
            $("#city_error").show();
      		$("#city_error").css("color","red");
      	}else{
          $("#city_error").hide();
      	}
      	if($("#tdesc").val() ==""){
            $("#tdesc_error").show();
      		$("#tdesc_error").css("color","red");
      	}else{
            $("#tdesc_error").hide();
      	}
      	if($("#criteria1").val()==""){
            $("#criteria1_error").show();
      		$("#criteria1_error").css("color","red");
      	}else{
          $("#criteria1_error").hide();
      	}
      	if($("#criteria2").val() ==""){
            $("#criteria2_error").show();
      		$("#criteria2_error").css("color","red");
      	}else{
          $("#criteria2_error").hide();
      	}
      	if($("#tlevel").val() == ""){
            $("#tlevel_error").show();
      		$("#tlevel_error").css("color","red");
      	}else{
          $("#tlevel_error").hide();
      	}
      	// if($("#terms1").val() ==""){
       //      $("#terms1_error").show();
      	// 	$("#terms1_error").css("color","red");
      	// }else{
       //    $("#terms1_error").hide();
      	// }
      	// if($("#terms2").val() ==""){
       //      $("#terms2_error").show();
      	// 	$("#terms2_error").css("color","red");
      	// }else{
       //    $("#terms2_error").hide();
      	// }
      	if($("#orgName").val() ==""){
           $("#orgName_error").show();
      		$("#orgName_error").css("color","red");
      	}else{
          $("#orgName_error").hide();
      	}
      	if($("#contact").val() ==""){
            $("#contact_error").show();
      		$("#contact_error").css("color","red");
      	}else{
          $("#contact_error").hide();
      	}
      	if($("#orgadd1").val() ==""){
            $("#orgadd1_error").show();
      		$("#orgadd1_error").css("color","red");
      	}else{
          $("#orgadd1_error").hide();
      	}
      	if($("#orgadd2").val() ==""){
            $("#orgadd2_error").show();
      		$("#orgadd2_error").css("color","red");
      	}else{
          $("#orgadd2_error").hide();
      	}
      	if($("#orgcity").val() ==""){
            $("#orgcity_error").show();
      		$("#orgcity_error").css("color","red");
      	}else{
          $("#orgcity_error").hide();
      	}
      	if($("#orgemail").val() ==""){
            $("#orgemail_error").show();
      		$("#orgemail_error").css("color","red");
      	}else{
          $("#orgemail_error").hide();
      	}
      	if($("#evlink").val() ==""){
            $("#evlink_error").show();
      		$("#evlink_error").css("color","red");
      	}else{
          $("#evlink_error").hide();
      	}
      	if($("#startD").val() ==""){
            $("#startD_error").show();
      		$("#startD_error").css("color","red");
      	}else{
          $("#startD_error").hide();
      	}
      	if($("#endD").val() ==""){
            $("#endD_error").show();
      		$("#endD_error").css("color","red");
      	}else{
          $("#endD_error").hide();
      	}
      	if($("#tsport").val() == ""){
            $("#tsport_error").show();
      		$("#tsport_error").css("color","red");
      	}else{
          $("#tsport_error").hide();
      	}
        if($("#estartD").val() ==""){
           $("#estartD_error").show();
      		$("#estartD_error").css("color","red");
      	}else{
          $("#estartD_error").hide();
      	}
      	if($("#eendD").val() ==""){
            $("#eendD_error").show();
      		$("#eendD_error").css("color","red");
      	}else{
          $("#eendD_error").hide();
      	}
      	if($("#email").val() ==""){
            $("#email_error").show();
      		$("#email_error").css("color","red");
      	}else{
          $("#email_error").hide();
      	}          
      }
   });
</script>


