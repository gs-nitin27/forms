
  <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
  

  $('#filename').live('change', function()
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
    "userid"                  : "16",
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

console.log(JSON.stringify(data1));

var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/event'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

alert(result);
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
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Event Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" class="register">
              <div class="box-body">
                <div class="form-group">
                  <label>Event Description</label>
                  <textarea class="form-control" rows="3" placeholder="Enter ..." class="desc" id="edesc" ></textarea>
                </div>
                 <div class="form-group">
                  <label for="eventName">Event Name</label>
                  <input type="text" class="form-control"  id="evname" placeholder="Enter Event">
                </div>
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>          
        <form action="" class="register" style="height: 1000px">
            <h1></h1>
           
                </p>
                <p>
                    <label>Event Name
                    </label>
                   <input type="text" id="evname">
                         
                     </input> 
                    
                </p>
                 <p>
                    <label>Event Type
                    </label>
                    <select id="evtype">
                        <option>
                        </option>
                        <option value="Type 1">Type 1
                        </option>
                        <option value="Type 2">Type 2
                        </option>
                        <option value="Type 3">Type 3
                        </option>
                    </select></p>
                     <p>
                    <label>Sport
                    </label>
                    <select id="sport">
                        <option>
                        </option>
                        <option value="Football">Football
                        </option>
                        <option value="Cricket">Cricket
                        </option>
                        <option value="Swimming">Swimming
                        </option>
                    </select></p>
                 <p>
                    <label>Address Line1
                    </label>
                    <input type="text" class="long" id="add1"/>
                </p>
                <p>
                    <label>Address Line2
                    </label>
                    <input type="text" class="long" id="add2"/>
                </p>
                <p>
                    <label>City
                    </label>
                    <select class="city" id="city">
                        <option value="New Delhi">New Delhi</option>
                        <option value="Noida">Noida</option>
                        <option value="Ghaziabad">Ghaziabad</option>
                        <option value="Gurgaon">Gurgaon</option>
                    </select></p>
                </p>
               
               <p>
                    <label>State
                    </label>
                    <select class="State" id="state">
                          <option value="Delhi">Delhi</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Karnataka">Karnataka</option>
                    </select></p>
                </p>
                <p>
                    <label>Pin
                    </label>
                    <input type="text" class="pin" id="pin"/>
                </p>
               
                    
                    <p>
                    <label class="optional">Event Link
                    </label>
                    <input class="long" type="text" value="http://" id="evlink" />

                </p>
                <p>
                    <label>Start Date</label>
                    <input type="text" id="startD"></input>
                </p>
                <p>
                    <label>End Date</label>
                    <input type="text" id="endD"></input>
                </p>
                <div id="preview"></div>
            </fieldset>
            <fieldset class="row2">
                <legend>Organiser Details
                </legend>
                <p>
                    <label>Organiser Name
                    </label>
                     <input type="text" id="orgName" />
                </p>
                <p>
                    <label>Email
                    </label>
                   <input type="text"  id="email_app_collection">
                         
                     </input> 
                </p>
                 <p>
                    <label>Phone No.
                    </label>
                   <input type="text" id="contact">
                         
                     </input> 
                </p>
                <p>
                    <label>Address Line1
                    </label>
                    <input type="text" class="long" id="orgadd1"/>
                </p>
                <p>
                    <label>Address Line2
                    </label>
                    <input type="text" class="long" id="orgadd2"/>
                </p>
                <p>
                    <label>City
                    </label>
                    <select class="city" id="orgcity">
                        <option value="New Delhi">New Delhi</option>
                        <option value="Noida">Noida</option>
                        <option value="Ghaziabad">Ghaziabad</option>
                        <option value="Gurgaon">Gurgaon</option>
                    </select></p>
                </p>
               
               <p>
                    <label>State
                    </label>
                    <select class="State" id="orgstate">
                          <option value="Delhi">Delhi</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Karnataka">Karnataka</option>
                    </select></p>
                </p>
                <p>
                    <label>Pin
                    </label>
                    <input type="text" class="pin" id="orgpin"/>
                </p>
                <p>
                    <label>Entry Start Date</label>
                    <input type="text" id="estartD"></input>
                </p>
                <p>
                    <label>Entry End Date</label>
                    <input type="text" id="eendD"></input>
                </p>
            </fieldset>
            <fieldset class="row3" style="margin-bottom: 27px;margin-top: -230px;">
                <legend>Eligibility Criteria
                </legend>
                <p>
                    <label>Criteria 1</label>
                    <input type="text" id="criteria1"/></p><p>
                    <label>Criteria 2</label>
                    <input type="text" id="criteria2"/></p>
                </p>
               

                 <legend>Terms and conditions
                </legend>
                <p>
                    <label>T&C1</label>
                    <input type="text" id="terms1"/></p><p>
                    <label>T&C2</label>
                    <input type="text" id="terms2"/></p>
                </p>

                <div class="infobox" style="display: none"><h4>Helpful Information</h4>
                    <p>Here comes some explaining text, sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
            </fieldset>
            <fieldset class="row4" style="margin-top: 50px;display: none">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value="" id="terms" />
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input type="checkbox" value=""/>
                    <label>Allow partners to send me personalized offers and related services</label>
                </p>
            </fieldset>
            <div><input type="button" class="button" id="save" onclick="#" value="Create" name="Create" style="margin-left: 500px"></input></div>
        </form>
        <form id="con" enctype='multipart/form-data' action="<?php echo site_url('forms/imageupload')  ?>" method="POST" style="display: none">
    <input type="file" name="eventImage" id="filename">
    <input type="text" name="imagena" id="imagena">
</form>
    



</section>
</div>