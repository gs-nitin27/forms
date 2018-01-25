<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>" ></script>
<script>
window.flagTicket = 0;
window.flagTerm   = 0;
window.flagCriteria =0;

var deletearray 	= [];
var deleteTermArray = [];
var deleteCrtArray  = [];



function save(totalTicket,totalTerm,totalCriteria)
{

 var description      =  editor.getData();

$("#imagelodar").show();
var sport  		= $("#sport").val();
var sportdata	= sport.split(',');
var data1 = 
{
    "id"                      : $("#eventid").val(),
  //  "price"                   : $("#price").val(),
    "etypes"                  : $("#etypes").val(),
    "userid"                  : $("#userid").val(),
    "name"                    : $("#evname").val(),
    "type"                    : $("#evtype2").val(),
    "address_line1"           : $("#add1").val(), 
    "address_line2"           : $("#add2").val(), 
    "city"                    : $("#city").val(), 
    "pin"                     : $("#pin").val(), 
    "description"             : description,
    //"eligibility1"            : $("#criteria1").val(),
   // "eligibility2"            : $("#criteria2").val(),
    "state"                   : $("#state").val(),
   // "terms_and_conditions1"   : $("#terms1").val(),
   // "terms_and_conditions2"   : $("#terms2").val(),
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
   // "total_applicant" 		  :	$("#total_applicant").val(),
    "sport"                   : sportdata[0],
    "sport_name"              : sportdata[1],
    "entry_start_date"        : $("#estartD").val(),
    "entry_end_date"          : $("#eendD").val(),
    "email_app_collection"    : $("#email_app_collection").val(),
    "file_name"               : $("#filename").val(),
    "image"                   : $("#photo_url").val(),
    "image"                   : $("#photo_url").val(),
    "ticketdetails"           : totalTicket,
    "terms_and_conditions1"   : totalTerm,
    "eligibility1"            : totalCriteria

   // "ticketArray" 			  :	ticketArray;


};

var url = '<?php echo site_url();?>';

var data =  JSON.stringify(data1);

  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveEditEvent'); ?>',
    data: data,
    dataType: "text",
    success: function(result) 
    {
    
    	 if(result == '1')
         {
         $.confirm({
         title: 'Congratulations!',
         content: 'Event is Updated.',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/getevent?event";
                }
            },
            close: function () {
            window.location.href = url+"/forms/getevent?event";
            }
        }
    });
      }
      else
      { 
      	    $("#imagelodar").hide();
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
    $( "#startD" ).datepicker({ dateFormat: 'mm-dd-yy' });
    $( "#endD" ).datepicker({ dateFormat: 'mm-dd-yy' });
    $( "#estartD" ).datepicker({ dateFormat: 'mm-dd-yy' });
    $( "#eendD" ).datepicker({ dateFormat: 'mm-dd-yy' });
  });
  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Event


        
      </h1>
     
    </section>
         <section class="content">
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
      <div class="row">
	  <div class="col-md-12">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

		  <?php $event = $this->register->getEventInfo($id); 
				if(!empty($event)){
					$event = $event[0];
					//$start_date = split('-', )
				}

			
			?>

			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab" id="1">Event </a></li>
              <li><a href="#tab_organiser" data-toggle="tab" id="2" >Organiser</a></li>
              <li><a href="#tab_eligible" data-toggle="tab" id="3" >Eligibility</a></li>
               <li><a href="#ticket" data-toggle="tab" id="4" >Ticket</a></li>
             </ul> 	 

            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
                
				<div class="box-header with-border">
					<h4>Event Details:</h4 > 		
				</div>
                <div class="box-body">

                    <div class="form-group"> 
                    <label for="exampleInputEmail1">Event entry</label>
                    <select  id="etypes" class="form-control" >
                    <option value="<?php echo $event['feetype'] ; ?>" ><?php echo $event['feetype'] ; ?></option> 
                    <option value="free" id="free">Free</option>
                    <option value="paid" id="paid">Paid</option>
                    </select>
                    </div>

                   
<!-- 
                    <div class="form-group" id="paid_unpaid">
					<label for="eventName">Ticket Price</label>
					<input type="text" class="form-control" id="price" placeholder="Enter Amount" value="0">
				    <label id="price_error" hidden>Ticket price is required .</label> 
					</div> -->

<!-- 					<div class="form-group">
					  <label>Event Description</label>
					  <textarea class="form-control" rows="3" style="resize:none;" placeholder="Enter ..." class="desc" id="edesc" ><?php //echo $event['description'] ; ?></textarea>
                    <label id="description_error" hidden>Description is required .</label> 
					</div> -->


					<div class="form-group">
					<label>Event Description</label>
					<textarea class="ckeditor" maxlength="" name="description" id="edesc" placeholder="Place some text here(Maximum 375 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php echo $event['description'] ; ?></textarea>
					 <label id="description_error" hidden>Description is required .</label> 
					</div>
				  <script>
                          var editor=CKEDITOR.replace('edesc');
                   </script>










					 <input type="hidden" class="form-control" name="eventid" id="eventid" value="<?php echo $event['id'] ; ?>">

          <?php
          $data=$this->session->userdata('item');
          $userid=$data['adminid'];
           {  ?>
           <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">

            </div>
          <?php }?>
            <div class="form-group">
					  <label for="eventName">Event Name</label>
					  <input type="text" class="form-control"  id="evname" value="<?php echo $event['name'] ; ?>" placeholder="Enter Event">
					  <label id="name_error" hidden>Event Name is required .</label> 
					</div >

                    
				 <div class="form-group">
						<?php  $types = $this->register->getEventType();
						?>
					  <label for="eventtype">Event Type</label>
						<select id="evtype2" class="form-control" >
						<option value="<?php echo $event['type'] ; ?>"><?php echo $event['type'] ; ?></option> 
							<?php if(!empty($types)){
								
									foreach($types as $type){?>
								<option value ="<?php echo $type['type'];?>"><?php echo $type['type'];?> </option>
							<?php 	}
								  }	
							?>
						</select>
					  </div>
    

				        <script type="text/javascript">
				        $("select#evtype2").change(function(){
				        var selectedCountry = $("#evtype2 option:selected").val();
				         if(selectedCountry == 'Other')
				         {
                                $("#otherevent").show();
                                $("#evtype").val("");
				         }
				         else
				         {      
				         	    $("#otherevent").hide();
				         	    $("#evtype").val(selectedCountry);
				         	   // alert(selectedCountry);
				         }
				       });
				    </script>

				    <div class="form-group" id="otherevent" hidden="">
                    <label for="eventtype">Event Type</label>
                    <input type="text" class="form-control"  name="eventtype"  id="evtype">
                    <label id="type_error" hidden>Event Type is required .</label>
                    </div>

					<div class="form-group">
						<?php  $sports = $this->register->getSport();
						?>
					<label for="sports">Sport</label>
				    <select id="sport" class="form-control" >
					<option value="<?php echo $event['sport'];?>,<?php echo $event['sport_name'];?>"><?php echo $event['sport_name'] ; ?></option> 
					<?php if(!empty($sports)){
									foreach($sports as $sport){?>
					<option value ="<?php echo $sport['id'];?>,<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
							<?php 	}
								  }	
							?>
					</select>
					<label id="sport_error" hidden>Sport is required .</label> 
					</div >
					<div class="form-group">
					<label for="address1">Address Line1</label>
					<input type="text" class="form-control"  value="<?php echo $event['address_1'] ; ?>" id="add1" placeholder="Enter Address">
					<label id="address_line1_error" hidden>Address Line1 is required .</label> 
					</div >
					<div class="form-group">
					<label for="address2">Address Line2</label>
					<input type="text" class="form-control" value="<?php echo $event['address_2'] ; ?>" id="add2" placeholder="Enter Address">
				    <label id="address_line2_error" hidden>Address Line2 is required .</label> 
					</div >
					<div class="form-group">
					<label for="city">City</label>
					<input type="text" class="form-control"  value="<?php echo $event['location'] ; ?>" id="city" placeholder="Enter City">
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
					<input type="text" class="form-control"  id="pin" value="<?php echo $event['PIN'] ; ?>" placeholder="Enter Pin">
					<label id="pin_error" hidden>Pin is required .</label> 
					</div >
					<div class="form-group">
					<label for="link">Event Link</label>
					<input type="text" class="form-control"   value="<?php echo $event['event_links'] ; ?>" id="evlink" placeholder="Enter Link">
					<label id="event_links_error" hidden>Event Link is required .</label> 
					</div >
					<div class="form-group">
					<label for="link">Start Date</label>
					<input type="text" class="form-control" value="<?php echo $this->register->alter_DateFormat($event['start_date']); ?>"  id="startD" placeholder="Enter Start Date">
					<label id="start_date_error" hidden>Start Date is required .</label> 
					</div >
					<div class="form-group">
					<label for="link">End Date</label>
					<input type="text" class="form-control"  value="<?php echo $this->register->alter_DateFormat($event['end_date']) ; ?>" id="endD" placeholder="Enter End Date">
					<label id="end_date_error" hidden>End Date is required .</label> 
					</div >
					<!-- <div class="form-group">
					<label for="link">Total No of Applicant</label>
					<input type="text" class="form-control"  id="total_applicant" placeholder="Total No of Applicant">
					<label id="end_date_error" hidden>Total No of Applicant is required .</label> 
					</div > -->

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
					  <input type="text" class="form-control" value="<?php echo $event['organizer_name'] ; ?>" id="orgName" >
					 <label id="organizer_name_error" hidden>Organiser Name is required .</label> 
					</div >
					<div class="form-group">
					  <label for="eventName">Email</label>
					  <input type="text" class="form-control" id="email_app_collection" value="<?php echo $event['email_app_collection'] ; ?>" >
				    	<label id="email_app_collection_error" hidden>Email is required .</label> 
					</div>
					<div class="form-group">
					  <label for="eventName">Phone No.</label>
					  <input type="text" value="<?php echo $event['mobile'] ; ?>" class="form-control" id="contact" >
					  <label id="mobile_error" hidden>Phone No. is required .</label> 
					</div>
					<div class="form-group">
					  <label for="address1">Address Line1</label>
					  <input type="text" class="form-control"  value="<?php echo $event['organizer_address_line1'] ; ?>" id="orgadd1" placeholder="Enter Address">
				   	<label id="organizer_address_line1_error" hidden>Address Line1 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="address2">Address Line2</label>
					  <input type="text" class="form-control"  id="orgadd2" value="<?php echo $event['organizer_address_line2'] ; ?>" placeholder="Enter Address">
					  <label id="organizer_address_line2_error" hidden>Address Line2 is required .</label> 
					</div>
					<div class="form-group">
					  <label for="city">City</label>
					  <input type="text" value="<?php echo $event['organizer_city'] ; ?>" class="form-control"  id="orgcity" placeholder="Enter City">
					<label id="organizer_city_error" hidden>City is required .</label> 
					</div>
					<div class="form-group">
					  <label for="state">State</label>
					  <input type="hidden" class="form-control"   id="orgstate">
					  <input type="text" class="form-control"  id="orgstate_value" placeholder="Enter State" disabled>
					  <label id="organizer_state_error" hidden>State is required .</label> 
					</div>
					<div class="form-group">
					  <label for="pin">Pin</label>
					  <input type="text" class="form-control" value="<?php echo $event['organizer_pin'] ; ?>" id="orgpin" placeholder="Enter Pin">
				   	<label id="organizer_pin_error" hidden>Pin is required .</label> 
					</div>
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible">
                 <div class="box-header with-border">
					<h4>Eligibility Criteria:</h4 > 		
				</div>


                <div class="form-group">
					
          <?php
     
            $ticketdata = json_decode($event['eligibility1']);

            
            $i= 0;

            if (!empty($ticketdata))
            {
            	
             foreach($ticketdata as $key1 => $test) 
              {
                ?>
					 
<div class='box-body' id="<?php echo "divCRT_".$i;?>" style='background-color: #d0ebff; border-color: black;border-radius: 10px;margin-bottom: 5px;margin-top: 5px;'><div class='form-group' ><span title='Close'  style='margin-left:1px;' id="<?php echo $i;?>" onclick='deleteCriteria(this);'  class='glyphicon glyphicon-remove-circle'></span>

					  <label for="eventName">Criteria: <?php echo $i; ?> </label>
					  <input type="text" class="form-control" id='criteria<?php echo $i;?>'  value="<?php echo $test->criteria;?>" placeholder="Enter Eligibility">
				      <label id="eligibility1_error" hidden>Criteria 1 is required .</label> 
					</div>
					</div>



				<?php
				$i++;
				echo "<script> window.flagCriteria++; </script>";
						}
					}
				?>



<div class="box-body">
					 <div class="form-group">
					 <div id="EventCriteria" ></div>
					  <label id="eligibility1_error" hidden>Criteria 1 is required .</label> 
			  		
				<div id="Eligibility Criteria"></div>
<input type="button" class="btn btn-lg btn-primary"  id="addCriteria" value="Add Eligibility Criteria " style="background-color: #08457e; color: white;
    padding: 8px 8px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;" " />


</div>
					</div>



					
					<div class="form-group">
					  <label for="link">Entry Start Date</label>
					  <input type="text" class="form-control"  id="estartD" value="<?php echo $this->register->alter_DateFormat($event['entry_start_date']) ; ?>" placeholder="Enter Start Date">
					<label id="entry_start_date_error" hidden>Entry Start Date is required .</label> 
					</div>
					<div class="form-group">
					  <label for="link">Entry End Date</label>
					  <input type="text" value="<?php echo $this->register->alter_DateFormat($event['entry_end_date']) ; ?>" class="form-control"  id="eendD" placeholder="Enter End Date">
					<label id="entry_end_date_error" hidden>Entry End Date is required .</label> 
					</div>
					<div class="box-header with-border">
					<h4>Terms & Conditions:</h4> 
					</div>	
					  <div class="form-group">
<?php

             $ticketdata = json_decode($event['terms_cond1']);
                                      
             $i=0;
             if (!empty($ticketdata))
            {
             foreach ($ticketdata as $key1 => $test) 
              {
                ?>
                	<div class='box-body' id="<?php echo "divTRM_".$i;?>" style='background-color: #d0ebff; border-color: black;border-radius: 10px;margin-bottom: 5px;margin-top: 5px;'><div class='form-group' ><span title='Close'  style='margin-left:1px;' id="<?php echo $i;?>" onclick='deleteterm(this);'  class='glyphicon glyphicon-remove-circle'></span>

					  <label for="eventName">T & C : <?php echo $i; ?></label>
  				  <input type="text" class="form-control" id='term<?php echo $i;?>'  value="<?php echo $test->term; ?>" placeholder="" >
					<label id="terms_and_conditions1_error" hidden>Terms & Conditions is required .</label> 
					</div >
					</div>
					
 <?php
                    $i++;
                	echo "<script> window.flagTerm++; </script>";
                }  
            }
             ?>	

					
					<div id="EvnetTerm"></div>

					  <input type="button" class="btn btn-lg btn-primary"  id="addTerm" value="Add ( T & C )" style="background-color: #08457e; color: white;
    					padding: 8px 8px;
					    text-align: center;
					    text-decoration: none;
					    display: inline-block;
					    font-size: 16px;" " />
					</div >
				</div>
              </div>
         



		    <div class="tab-pane" id="ticket">
            <div class="box-header with-border">

             <?php

             $ticketdata = json_decode($event['ticket_detail']);
             // print_r($ticketdata);
             $i=0;
            if (!empty($ticketdata))
            {
             foreach ($ticketdata as $key1 => $test) 
              {
                ?>
            <div class='box-body'  id="<?php echo "div_".$i;?>" style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'>

            

            <div class='form-group' ><span style="right:2px; top: 0px;" id="<?php echo $i;?>" onclick="deleteticket(this);"  class="glyphicon glyphicon-remove-circle"></span>

            <label for='ticketName'>Ticket Name :</label>

            <input type='text' class='form-control' id='ticketname<?php echo $i;?>' value="<?php echo $test->ticketname;?>" placeholder='Enter Ticket Name'>
            <label id='ticketname_error' hidden>Ticket Name is required .</label></div>

            <div class='form-group'><label for='ticketPrice'>Ticket Price :</label>

            <input type='text' value="<?php echo $test->ticketPrice;?>" class='form-control' id='ticketPrice<?php echo $i;?>' placeholder='Enter ticket price'><label id='ticketprice_error' hidden> Ticket price is required .</label></div>  

            <label for='NoofTicket'>Number of Ticket:</label>
            <input type='text' value="<?php echo $test->noofticket;?>" class='form-control' id='noofticket<?php echo $i;?>' placeholder='Enter Number of Ticket'><label id='numberofticket_error' hidden>Number of Ticket is required .</label>

            </div>
            <?php
                    $i++;
                	echo "<script> window.flagTicket++; </script>";
                }  
            }
             ?>	


             <div id="EventTicket" ></div>

            <input type="button" id="addTicket" class="btn btn-danger" value="Add Ticket" />
            </div>
               
                 

            

                 	
			
					

					
	
		</div>
       </div>   
       <table>
        <tr>
        <td>
             <?php if($event['image']) { ?>

            <!-- <div class="form-group" align="left" >  -->

                <img style="display:block; border:2px solid SteelBlue";  width="400px" height="300px" src = "<?php  echo base_url()."uploads/event/".$event['image']; ?>">
            <!-- </div>  -->

              <?php } else { ?>

             <!--  <div class="form-group">

                 -->
             <img style="display:block; border:2px solid SteelBlue";  width="200px" height="300px" align="center" src = "<?php  echo base_url('img/no-image.jpg'); ?>">
             <?php } ?>

             <!-- </div>  -->

          </td>
          </tr>
          <tr style="margin-top:20px">
          <td>
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
	              <input type="hidden" class="form-control" name="path"   id="path" value="uploads/event/">
	              <input type="hidden" class="form-control" name="height" id="height" value="640">
	              <input type="hidden" class="form-control" name="width"  id="width" value="1115">
	              <input type="hidden" class="form-control" name="file_name"  id="file_name">
	              </div>
	             <!--  <input id="button" type="submit" value="Upload"> -->
            </form>
    
        <div class="form-group">
                  <input type="hidden" class="form-control" name="oldimageid" id="pid" value="<?php echo $event['id']; ?>">
                </div>
               <!--  <input id="button" type="submit" value="Upload"> -->
               </form>


                
               <input type="hidden" class="form-control" name="photo" id="photo_url" value="<?php echo $event['image']; ?>"> 
             <!--  <input type="hidden" class="form-control" name="photo" id="photo_url">  -->
              <div id="mess" hidden>Image Uploded</div>
			        
             </td>
             </tr>
             </table>  
       </div>
          
         
            <div class="box-footer">
			<input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Update Event" name="Create">
			</div>
          </div>
</div>
</section>
</div>


 <script type="text/javascript">
    $("#etypes").change(function(){
	if($("#etypes").val() == 'free')
    {
       $("#paid_unpaid").hide();
    }
   	else if($("#etypes").val() == 'paid')
    {
    $("#paid_unpaid").show();
  	}
    });	
  </script>
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
		

    var editorData      =  editor.getData();
    var description     =  editorData.replace(/[\/\\<>~\{}]/g, '');

     var name                      = $("#evname").val();
     var type                      = $("#evtype").val();
     var address_line1             = $("#add1").val();
     var address_line2             = $("#add2").val();
     var city                      = $("#city").val(); 
     var pin                       = $("#pin").val();
     var description               = description;
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

     var ticketArray = [];
     var termArray  = [];
     var criteriaArray =[];

	for(var i =0; i <window.flagTicket; i++)
	{
 
        if($("#ticketname"+i).val())
        {
          var temp1 = {"ticketname":$("#ticketname"+i).val(),"ticketPrice":$("#ticketPrice"+i).val(),"noofticket":$("#noofticket"+i).val()};
          ticketArray.push(temp1);
        }
	}

	for(var i =0; i <window.flagTerm; i++)
	{
		if($("#term"+i).val())
		{
		var temp2 = {"term":$("#term"+i).val()};
	    termArray.push(temp2);
		}

	}

	for(var i =0; i <window.flagCriteria; i++)
	{
		if($("#criteria"+i).val())
		{
		var temp3 = {"criteria":$("#criteria"+i).val()};
	    criteriaArray.push(temp3);
		}

	}





		var totalTicket = JSON.stringify(ticketArray);



		var totalTerm = JSON.stringify(termArray);

		var totalCriteria = JSON.stringify(criteriaArray);


       if(name != "" && sport != '')
      {    
      	     save(totalTicket,totalTerm,totalCriteria)
      }  



      else
      {  
          if(name =="")
          {
              $("#name_error").show();
              $("#name_error").css("color","red");
           }
            else
            {
            //alert(name);
            $("#name_error").hide();
            }
            if(sport == 0){
            $("#sport_error").show();
            $("#sport_error").css("color","red");
            }else{
            	$("#sport_error").hide();	
            }
      }  
	});



function deleteticket($this)
{
   var id = $this.id;
   //alert(id);
   $('#ticketname'+id).attr('id', 'other_1');
   $('#ticketPrice'+id).attr('id', 'other_2');
   $('#noofticket'+id).attr('id', 'other_3');
   deletearray.push(id);
   $('#div_'+id).hide();
  
}	
</script>

<script>

	//var flag=0;

document.getElementById("addTicket").onclick = function() 
{
    var form 		 = document.getElementById("EventTicket");
	var newDiv  	 = document.createElement("div");
	newDiv.innerHTML = "<div class='box-body' id='div_"+ window.flagTicket +"' style='background-color: #26c4f1; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group' ><span style='right:2px; top: 0px;' id='"+ window.flagTicket +"' onclick='deleteticket(this);'  class='glyphicon glyphicon-remove-circle'></span><label for='ticketName'>Ticket Name :</label><input type='text' class='form-control' id='ticketname"+ window.flagTicket +"' placeholder='Enter Ticket Name'><label id='ticketname_error' hidden>Ticket Name is required .</label></div><div class='form-group'><label for='ticketPrice'>Ticket Price :</label><input type='text' class='form-control' id='ticketPrice"+ window.flagTicket +"' placeholder='Enter ticket price'><label id='ticketprice_error' hidden> Ticket price is required .</label></div>  <label for='NoofTicket'>Number of Ticket:</label><input type='text' class='form-control' id='noofticket"+ window.flagTicket +"' placeholder='Enter Number of Ticket'><label id='numberofticket_error' hidden>Number of Ticket is required .</label></div>	"; 
		form.appendChild(newDiv);
		window.flagTicket++;

}


// function getDateFormat(data)
// {
// if(data != '')
// {	
// var myDate = data;
// var date = myDate.split('-').join('/');
// return date;
// }else
// {
// return data;
// }
// } 

</script>


<script>
	//var flag=0;
	//var flag=0;
document.getElementById("addTerm").onclick = function() 
{
	//#26c4f1  
    var form 		 = document.getElementById("EvnetTerm");
	var addTermDiv  	 = document.createElement("div");
	addTermDiv.innerHTML = "<div class='box-body' id='divTRM_"+ window.flagTerm +"' style='background-color: #d0ebff; border-color: black;border-radius: 10px;margin-bottom: 5px;margin-top: 5px;'><div class='form-group' ><span title='Close'  style='margin-left:1px;' id='"+ window.flagTerm +"' onclick='deleteterm(this);'  class='glyphicon glyphicon-remove-circle'></span><label for='eventName'>T & C </label><input type='text' class='form-control' id='term"+ window.flagTerm +"' placeholder='Enter T & C '> <label id='terms_and_conditions1_error' hidden>Terms & Conditions is required .</label></div >"; 

		//console.log(newDiv.innerHTML);

		form.appendChild(addTermDiv);
		window.flagTerm++;


}

</script>


<script>
	//var flag=0;
document.getElementById("addCriteria").onclick = function() 
{
	//#26c4f1

    var form 		 = document.getElementById("EventCriteria");
	var addCriteriaDiv  	 = document.createElement("div");
	addCriteriaDiv.innerHTML = "<div class='box-body' id='divCRT_"+ window.flagCriteria +"' style='background-color: #d0ebff; border-color: black;border-radius: 10px;margin-bottom: 5px;margin-top: 5px;'><div class='form-group' ><span title='Close'  style='margin-left:1px;' id='"+ window.flagCriteria +"' onclick='deleteCriteria(this);'  class='glyphicon glyphicon-remove-circle'></span><label for='eventName'>Eligibility Criteria  </label><input type='text' class='form-control' id='criteria"+ window.flagCriteria +"' placeholder='Enter Eligibility Criteria '> <label id='terms_and_conditions1_error' hidden>Terms & Conditions is required .</label></div >";
	 //console.log(newDiv.innerHTML);
		form.appendChild(addCriteriaDiv);
		window.flagCriteria++;


}

</script>

	<script>
	function deleteterm($this)
	{
	   var id = $this.id;
	  // $('#divTRM_'+id).hide();
	//addTerm
	 //var id = $this.id;
	   //alert(id);
	   $('#term'+id).attr('id', 'other_6');
	  // $('#ticketPrice'+id).attr('id', 'other_2');
	  // $('#noofticket'+id).attr('id', 'other_3');
	   deleteTermArray.push(id);
	   $('#divTRM_'+id).hide();

	  // $('#div_'+id).hide();
	}

	function deleteCriteria($this)
	{
	   var id = $this.id;
	   $('#criteria'+id).attr('id', 'other_8');
	   $('#divCRT_'+id).hide();
	   deleteCrtArray.push(id);
	}

</script>