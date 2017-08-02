<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/
ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/jquery.form.js'); ?>"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
        <title>Create Job</title>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>"/>
  <style type="text/css">
form.register {
    background-color: #fff;
    height: 610px !important;
    margin: 20px auto 0;
    padding: 5px;
    width: 800px;
}
  </style>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <title>Create Event</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>"/>
   <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
  
clear();
   var gender = $('input[name=gender]:checked').val();
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

console.log(JSON.stringify(data1));

var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveJob'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {

alert(result);
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
    $("input[name='gender']:checked").val(''); 

}

  </script>


    </head>
    <body>    
        <form action="" class="register">
            <h1>Create Job</h1>
            <fieldset class="row1">
                <legend>Job Details
                </legend>
                <p>
                    <label>Job Title
                    </label>
                    <input type="text" id="jtitle" />
                    <label>Job Description
                    </label>
                     <textarea rows="4" cols="50" class="desc" id="jdesc">
                         
                     </textarea> 
                </p>
                <p>
                    <label>Job Type</label>
                    <input type="text" id="jtype" /></p>
                    <p>
                    <label> Sports</label>
                    <select id="jsports">
                        <option value="foortball">Football</option>
                        <option value="Cricket">Cricket</option>
                        <option value="Tennis">Tennis</option>
                        <option value="Basketball">Basketball</option>
                        <option value="Swimming">Swimming</option>
                    </select>    
                    </p>
                    <p>
                    <label>Job Location
                    </label>
                    <select id="jcity">
                        <option>
                        </option>
                        <option value="New Delhi">New Delhi
                        </option>
                        <option value="Noida">Noida
                        </option>
                        <option value="Pune">Pune
                        </option>
                    </select></p>
                    <p>
                    <label class="optional">Address1
                    </label>
                    <input type="text" class="long" id="jadd1"/>
                </p>
                <p>
                    <label class="optional">Address2
                    </label>
                    <input type="text" class="long" id="jadd2"/>
                </p>
                 
                <p>
                    <label class="optional">PIN
                    </label>
                    <input type="text" class="long" id="jpin"/>
                </p>
               <p>    
              <label class="optional">State
                    </label>
                    <input type="text" class="long" id="jstate"/>
                </p>
            </fieldset>
            <fieldset class="row2">
                <legend>Organisation Details
                </legend>
                <p>
                    <label>Organisation Name
                    </label>
                     <input type="text" id="orgName" />
                </p>
                <p>
                    <label>About Organisation
                    </label>
                   <textarea rows="4" cols="30" class="abOrg" id="abOrg" style=" border: 1.5px solid #e1e1e1;
    height: 32px;
    width: 248px;">
                         
                     </textarea> 
                </p>
                <p>
                    <label class="optional">Address1
                    </label>
                    <input type="text" class="long" id="add1"/>
                </p>
                <p>
                    <label class="optional">Address2
                    </label>
                    <input type="text" class="long" id="add2"/>
                </p>
                <p>
                <p>
                    <label>Job Location
                    </label>
                    <select id="orgcity">
                        <option>
                        </option>
                        <option value="New Delhi">New Delhi
                        </option>
                        <option value="Noida">Noida
                        </option>
                        <option value="Pune">Pune
                        </option>
                    </select></p>
                    
                <p>
                    <label class="optional">PIN
                    </label>
                    <input type="text" class="long" id="orgpin"/>
                </p>
                <p>
                <label class="optional">State
                    </label>
                    <input type="text" class="long" id="orgstate"/>
                </p>
                <p>
                    <label>emailId
                    </label>
                    <input type="text" class="long" id="email" />
                </p>
                <p>
                    <label>Contact No.
                    </label>
                     <input type="text" class="long" id="cont" />
                </p>
                
            </fieldset>
            <fieldset class="row3">
                <legend style="margin-top: 44px">Requirements
                </legend>
                <p><label>Experience(years)</label></p>
                <select id="jexp">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                </select>
                <p><label>Qualifications</label>
                <input type="text" id="jqualification"></input>
                </p>
                <p><label>Desired skills</label>
                <input id="skill" type="text"></input>
                </p>
                 <p><label>Key Requirement</label>
                <input id="jreq" type="text"></input>
                </p>
                <p>
                    <label>Gender </label>
                    <input type="radio"  name ="gender" value="Male"/>
                    <label class="gender">Male</label>
                    <input type="radio"  name ="gender" value="Female"/>
                    <label class="gender">Female</label>
                </p>
               
                <div class="infobox" style="display: none"><h4>Helpful Information</h4>
                </div>
            </fieldset>
            <fieldset class="row4" style="display: none">
                <legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input type="checkbox" value=""/>
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
    </body>
</html>





