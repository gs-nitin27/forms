
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
    
function save()
{
   $("#imagelodar").show();
var data1 = {
    "id"                      : "0", 
    "userid"                  : $("#userid").val(),
    //"catagory"                : $("#tcatagory").val(),
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
    "tournament_ageGroup"     : JSON.stringify($("#tage").val()),
    "file_name"               : $("#filename").val(),
    "image"                   : $("#photo_url").val()
};
 
var url = '<?php echo site_url();?>';

//var data =  eval(data1);
var data = JSON.stringify(data1);


  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveTournament'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
  	$("#imagelodar").hide();
       if(result == '1')
         {
          $("#imagelodar").hide();
         $.confirm({
         title: 'Congratulations!',
         content: 'Tournament is created.',
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
        Create Tournament
        
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
					  <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="tdesc" ></textarea>
					  <label id="tdesc_error" hidden>Tournament Description is required .</label>
					</div>
					<div class="form-group">
					  <label for="eventName">Tournament Name</label>
					  <input type="text" class="form-control"  id="tname" >
                     <label id="tname_error" hidden>Tournament Name is required .</label>
					</div >
					
         <?php
          $data=$this->session->userdata('item');
          $userid=$data['adminid'];
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
						<option value="0">- Select -</option> 
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
						<option value="0">- Select -</option>
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
					<label for="sports">Age Group</label>
						<select id="tage" name="age-group" class="form-control" multiple>
							<option>-Select-</option>
							<option id="15-18">15-18</option>
							<option id="18-22">18-22</option>
							<option id="20-25">20-25</option>
							<option id="24-28">24-28</option>
							<option id="Under-8">Under 8</option>
							<option id="Under-9">Under 9</option>
							<option id="Under-10">Under 10</option>
							<option id="Under-11">Under 11</option>
							<option id="Under-12">Under 12</option>
							<option id="Under-13">Under 13</option>
							<option id="Under-14">Under 14</option>
							<option id="Under-15">Under 15</option>
							<option id="Under-16">Under 16</option>
							<option id="Under-17">Under 17</option>
							<option id="Under-18">Under 18</option>
							<option id="Under-19">Under 19</option>
							<option id="Under-19">Under 19</option>
							<option id="Under-21">Under 21</option>
							<option id="Under-22">Under 22</option>
							<option id="Under-23">Under 23</option>
							<option id=">18"> >18 </option>
							<option id="Senior"> Senior </option>
							<option id="All">All</option>
						</select>
					</div>
					<div class="form-group">
					<label for="sports">Gender</label>
						<select id="tgen" class="form-control" >
							<option>-Select-</option>
							<option id="Male">Male</option>
							<option id="Female">Female</option>
							<option id="Female">All</option>
						</select>
					</div>

					<div class="form-group">
					  <label for="link">Start Date</label>
					  <input type="text" class="form-control"  id="startD" placeholder="Enter Start Date">
					  <label id="startD_error" hidden>Start Date is required .</label> 
					</div >
					<div class="form-group">
					  <label for="link">End Date</label>
					  <input type="text" class="form-control"  id="endD" placeholder="Enter End Date">
					  <label id="endD_error" hidden>End Date is required .</label> 
					</div >

					<div class="form-group">
					  <label for="pin">Tournament Link</label>
					  <input type="text" class="form-control"  id="evlink" placeholder ="http://" />
					  <label id="evlink_error" hidden>Tournament Link is required .</label> 
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
					  <label id="add1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="add2" placeholder="Enter Address">
					  <label id="add2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="city" placeholder="Enter City">
					  <label id="city_error" hidden>City is required .</label> 
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
					<!-- <div class="form-group">
					  <label for="pin">Tournament Link</label>
					  <input type="text" class="form-control"  id="evlink" value="http://" />
					  <label id="evlink_error" hidden>Tournament Link is required .</label> 
					</div > -->
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" placeholder="Enter Start Date">
					   <label id="estartD_error" hidden>Entry Start Date is required .</label> 

					</div >
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" class="form-control"  id="eendD" placeholder="Enter End Date">
					   <label id="eendD_error" hidden>Entry End Date is required .</label> 
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
					   <label id="orgName_error" hidden>Organiser Name is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email">
					   <label id="email_error" hidden>Email is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Contact No.</label>
					  <input type="text" class="form-control" id="contact">
					   <label id="contact_error" hidden>Contact No. is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  id="orgadd1" placeholder="Enter Address">
					   <label id="orgadd1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="orgadd2" placeholder="Enter Address">
					   <label id="orgadd2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" class="form-control"  id="orgcity" placeholder="Enter City">
					   <label id="orgcity_error" hidden>City is required .</label> 
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
					   <label id="criteria1_error" hidden>Criteria 1 is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Criteria 2</label>
					  <input type="text" class="form-control" id="criteria2" placeholder="Enter Eligibility">
					   <label id="criteria2_error" hidden>Criteria 2 is required .</label> 
					</div >
					
					
					<div class="box-header with-border">
					<h4>Terms & Conditions:</h4> 
					</div>
					 	
					  <div class="form-group">
					  <label for="eventName">T & C 1</label>
					  <input type="text" class="form-control" id="terms1" placeholder="">
					   <label id="terms1_error" hidden>Terms & Conditions is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">T & C 2</label>
					  <input type="text" class="form-control" id="terms2" placeholder="">
					  <input type="hidden" class="form-control" id="filename" placeholder="">
					   <label id="terms2_error" hidden>Terms & Conditions is required .</label> 
					  
					</div >
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            </form>
          <form id="form1"  method="post" enctype="multipart/form-data">
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
                        <input type="file" accept="image/png, image/jpeg, image/gif" id="timage" name="file"/>
                        
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
	              <input type="hidden" class="form-control" name="path"   id="path" value="uploads/tournament/">
	              <input type="hidden" class="form-control" name="height" id="height" value="640">
	              <input type="hidden" class="form-control" name="width"  id="width" value="1115">
	              </div>
	             <!--  <input id="button" type="submit" value="Upload"> -->
            </form>

              <input type="hidden" class="form-control" name="photo" id="photo_url"> 
              <div id="mess" hidden>Image Uploded</div>
			<div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Create Tournament" name="Create">
			</div>
			 
			
          </div>
	  </div>
		
	  
</div>
</div>
</section>
<script type="text/javascript">
  $(document).ready(function (e) {

  $("#form1").on('submit',(function(e) 
  {
    if($('#timage').val())
    {
   $('#imagelodar').show();
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
                $('#imagelodar').hide();
                $('#mess').show();
                $("#photo_url").val(data);   
        },
        error: function(e) 
        {
      
        }           
     });
  } else{
          alert("please upload image");
          return false ;
  }
  }));
});

</script>


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
<script type="text/javascript">

   $("#save").click(function()
   {
      //alert("hi");
    if(  $("#tname").val() !="" && $("#tdesc").val() != "" &&  $("#startD").val() !="" && $("#endD").val() !="" && $("#evlink").val() != "")
       {
      	save();
      }else{

           //  $("#2").css("color","red");
             //$("#3").css("color","red");
             // $("#4").css("color","red");
             $("html, body").animate({ scrollTop: 0 }, 500);

      	// if($("#add1").val() ==""){
      	// 	//alert("hello");
      	// 	$("#add1_error").show();
       //      $("#add1_error").css("color","red");

      	// }else{
       //       $("#add1_error").hide();
      	// }
      	// if($("#add2").val() ==""){
       //      $("#add2_error").show();
      	// 	$("#add2_error").css("color","red");
      	// }else{
       //     $("#add2_error").hide();
      	// }
      	 if($("#tname").val() ==""){
            $("#tname_error").show();
      		$("#tname_error").css("color","red");
      	}else{
           $("#tname_error").hide();
      	}
      	// if($("#city").val() ==""){
       //      $("#city_error").show();
      	// 	$("#city_error").css("color","red");
      	// }else{
       //    $("#city_error").hide();
      	// }
      	if($("#tdesc").val() ==""){
            $("#tdesc_error").show();
      		$("#tdesc_error").css("color","red");
      	}else{
            $("#tdesc_error").hide();
      	}
      	// if($("#criteria1").val()==""){
       //      $("#criteria1_error").show();
      	// 	$("#criteria1_error").css("color","red");
      	// }else{
       //    $("#criteria1_error").hide();
      	// }
      	// if($("#criteria2").val() ==""){
       //      $("#criteria2_error").show();
      	// 	$("#criteria2_error").css("color","red");
      	// }else{
       //    $("#criteria2_error").hide();
      	// }
      	// if($("#tlevel").val() == 0){
       //      $("#tlevel_error").show();
      	// 	$("#tlevel_error").css("color","red");
      	// }else{
       //    $("#tlevel_error").hide();
      	// }
      	// // if($("#terms1").val() ==""){
       // //      $("#terms1_error").show();
      	// // 	$("#terms1_error").css("color","red");
      	// // }else{
       // //    $("#terms1_error").hide();
      	// // }
      	// // if($("#terms2").val() ==""){
       // //      $("#terms2_error").show();
      	// // 	$("#terms2_error").css("color","red");
      	// // }else{
       // //    $("#terms2_error").hide();
      	// // }
      	// if($("#orgName").val() ==""){
       //     $("#orgName_error").show();
      	// 	$("#orgName_error").css("color","red");
      	// }else{
       //    $("#orgName_error").hide();
      	// }
      	// if($("#contact").val() ==""){
       //      $("#contact_error").show();
      	// 	$("#contact_error").css("color","red");
      	// }else{
       //    $("#contact_error").hide();
      	// }
      	// if($("#orgadd1").val() ==""){
       //      $("#orgadd1_error").show();
      	// 	$("#orgadd1_error").css("color","red");
      	// }else{
       //    $("#orgadd1_error").hide();
      	// }
      	// if($("#orgadd2").val() ==""){
       //      $("#orgadd2_error").show();
      	// 	$("#orgadd2_error").css("color","red");
      	// }else{
       //    $("#orgadd2_error").hide();
      	// }
      	// if($("#orgcity").val() ==""){
       //      $("#orgcity_error").show();
      	// 	$("#orgcity_error").css("color","red");
      	// }else{
       //    $("#orgcity_error").hide();
      	// }
      	// if($("#orgemail").val() ==""){
       //      $("#orgemail_error").show();
      	// 	$("#orgemail_error").css("color","red");
      	// }else{
       //    $("#orgemail_error").hide();
      	// }
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
      	// if($("#tsport").val() == 0){
       //      $("#tsport_error").show();
      	// 	$("#tsport_error").css("color","red");
      	// }else{
       //    $("#tsport_error").hide();
      	// }
       //  if($("#estartD").val() ==""){
       //     $("#estartD_error").show();
      	// 	$("#estartD_error").css("color","red");
      	// }else{
       //    $("#estartD_error").hide();
      	// }
      	// if($("#eendD").val() ==""){
       //      $("#eendD_error").show();
      	// 	$("#eendD_error").css("color","red");
      	// }else{
       //    $("#eendD_error").hide();
      	// }
      	// if($("#email").val() ==""){
       //      $("#email_error").show();
      	// 	$("#email_error").css("color","red");
      	// }else{
       //    $("#email_error").hide();
      	// }          
      }
   });
</script>


