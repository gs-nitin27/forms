<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    
    <head>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <title>Create Tournament</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>"/>
  <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
  
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

var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveTournament'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

alert(result);
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
        
    </head>
    <body>    
        <form action="" class="register" style="height: 1000px">
            <h1>Create Tournament</h1>
            <fieldset class="row1">
                <legend>Tournament Details
                </legend>
                <p>
                    <label>Tournament Description
                    </label>
                   <textarea rows="4" cols="50" class="desc" id="tdesc">
                         
                     </textarea> 
                    
                </p>
                <p>
                    <label>Tournament Name
                    </label>
                   <input type="text" id="tname"> 
                </p>
                

                 <p>
                    <label>Sport
                    </label>
                   <select id="tsport">
                       <option></option>
                       <option value="Tennis">Tennis</option>
                       <option value="Cricket">Cricket</option>
                       <option value="Hockey">Hockey</option>
                       <option value="Basketball">Basketball</option>
                       <option value="Football">Football</option>
                       <option value="Swimming">Swimming</option>
                       <option value="Badminton">Badminton</option>
                       <option value="Volleyball">Volleyball</option>
                   </select>
                    
                </p>

                <p>
                    <label>Level
                    </label>
                   <select id="tlevel">
                       <option></option>
                       <option value="school">School</option>
                       <option value="district">District</option>
                       <option value="state">State</option>
                       <option value="zonal">Zonal</option>
                       <option value="national">National</option>
                       <option value="international">International</option>
                       </select>
                    
                </p>
                <p>
                    <label>Category
                    </label>
                   <select id="tcatagory">
                       <option></option>
                       <option value="Category 1">Category 1</option>
                       <option value="Category 2">Category 2</option>
                       <option value="Category 3">Category 3</option>
                   </select> 
                    
                </p>
                 <p>
                    <label>Age-group</label>
                    <select id="tage">
                        <option></option>
                        <option id="15-18">15-18</option>
                        <option id="18-22">18-22</option>
                        <option id="20-25">20-25</option>
                        <option id="24-28">24-28</option>
                    </select>
                </p>
                <p>
                    <label>Gender</label>
                    <select id="tgen">
                        <option></option>
                        <option id="Male">Male</option>
                        <option id="Female">Female</option>
                        <option id="Unisex">Unisex</option>
                    </select>
                </p>
                
                <p>
                    <label>Start Date</label>
                    <input type="text" id="startD"></input>
                </p>
                <p>
                    <label>End Date</label>
                    <input type="text" id="endD"></input>
                </p>
            </fieldset>
             <fieldset class="row5" style="margin-left:54%;position: relative; top: -325px;  ">
                    
                 <legend style="background: #fff">Tournament Info</legend>
                     <p>
                   
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
                        <option value="New Delhi">Noida</option>
                        <option value="New Delhi">Ghaziabad</option>
                        <option value="New Delhi">Gurgaon</option>
                    </select></p>
                </p>
               
               <p>
                    <label>State
                    </label>
                    <select class="State" id="state">
                        <option value="Delhi">Delhi</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="mp">Madhya Pradesh</option>
                        <option value="ap">Andhra Pradesh</option>
                        <option value="ap">Maharashtra</option>
                        <option value="ap">Karnataka</option>
                    </select></p>
                </p>
                <p>
                    <label>Pin
                    </label>
                    <input type="text" class="pin" id="pin"/>
                </p>
               
                    <p><label>Tournament Link</label>
                <input type="text" id="evlink" value="http://"></input>
                </p>

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
            <fieldset class="row2" style=" margin-top: -263px;">
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
                   <input type="text"  id="email">
                         
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
                        <option value="New Delhi">Noida</option>
                        <option value="New Delhi">Ghaziabad</option>
                        <option value="New Delhi">Gurgaon</option>
                    </select></p>
                </p>
               
               <p>
                    <label>State
                    </label>
                    <select class="State" id="orgstate">
                        <option value="Delhi">Delhi</option>
                        <option value="up">Uttar Pradesh</option>
                        <option value="mp">Madhya Pradesh</option>
                        <option value="ap">Andhra Pradesh</option>
                        <option value="ap">Maharashtra</option>
                        <option value="ap">Karnataka</option>
                    </select></p>
                </p>
                <p>
                    <label>Pin
                    </label>
                    <input type="text" class="pin" id="orgpin"/>
                </p>
               
            </fieldset>
            <fieldset class="row3" style="margin-left: 426px;
    margin-top: -266px;">
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
        <form id="con" enctype='multipart/form-data' action="Image_upload.php" method="POST">
    <input type="file" name="eventImage">
    <input type="text" name="userid" value="16" id="filename">
    <input name="submit" type="submit" value="Submit">
</form>
    </body>
</html>





