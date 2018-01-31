
<script>
   window.sportsticket = 0;
   window.formalticket = 0;
   window.ohterticket = 0; 
   window.workexpticket =0;
   window.asplayerticket = 0; 


function saveUserProfile(userjson)
{
  $("#imagelodar").show();

var data = {

    "id"                       : <?php echo $user_basic['userid'] ?>,
    "prof_id"                  : <?php echo $user_basic['prof_id'] ?>,
    "userdata"                 : userjson
};



var data = JSON.stringify(data);

  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/Registration_userdata'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
    if(result == '1')
    {
        $.confirm({
        title: 'Congratulations!',
        content: 'Profile is Updated.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();
                }
            },
            close: function () {
              $("#imagelodar").hide();
             
            }
        }
    });
      }
      else
      {
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
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });
      }
    }
});   
}

</script> 

<div class="content-wrapper">
    <section class="content-header">
    <h1>
        Edit New End User
    </h1>
    </section>
         <section class="content"> 
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
      <div class="row">
		<div class="col-md-12">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>
			<div class="nav-tabs-custom" id="tabs">
      
            <ul class="nav nav-tabs">
              <li class="active" id="basic1"><a href="#basic" data-toggle="tab" id="1" >Basic Details </a></li>
              <li id="education1"><a href="#education" data-toggle="tab" id="2" >Education</a></li>
              <li  id="experience2"><a href="#experience" data-toggle="tab" id="3" >Experience</a></li>
              <li  id="others2"><a href="#others" data-toggle="tab" id="4" >Others</a></li>
             </ul> 	 
             <form role="form" action="" class="register">  
             <div class="tab-content">
              <div class="tab-pane active"  id="basic">
			   <div class="box-header with-border">
                <h4>Basic Details :</h4 > 	
				</div>
                <div class="box-body">
			    <div class="form-group">


          

			    <label for="eventName">Name</label>
				<input type="text" class="form-control"  id="name" value="<?php echo $user_basic['name'];?>" >
                <label id="name_error" hidden>Name is required .</label>
			    </div>
			    <div class="form-group">
			    <label for="eventName">Email</label>
				<input type="text" class="form-control"  id="email" value="<?php echo $user_basic['email'];?>">
                <p class="text-danger" id="email_error" hidden="">Email is required.</p>
			    </div>
			    <div class="form-group">
			    <label for="eventName">Phone</label>
				<input type="text" class="form-control"  id="phone" value="<?php echo $user_basic['contact_no'];?>">
                <label id="phone_error" hidden>Phone is required .</label>
			    </div>
			    <div class="form-group">
				<?php  
					$sports = $this->register->getSport();
				?>
				<label for="sports">Sport</label>


				<select id="sport" class="form-control" >
				<option ><?php echo $user_basic['sport'];?></option> 
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
				<?php  $prof = $this->register->getprofession();?>
				<label for="prof">Profession</label>
				<select id="prof" class="form-control" >
				<option ><?php echo $user_basic['prof_name'];?></option> 
				<?php if(!empty($prof)){
                        foreach($prof as $prf){?>
                 <option value ="<?php echo $prf['profession'];?>,<?php echo $prf['id'];?>"><?php echo $prf['profession'];?> </option>
                      <?php   }
                           } 
                         ?>
					</select>
					 <p class="text-danger" id="prof_error" hidden="">Profession Name is required.</p>
					</div>
					<div class="form-group">
					<label for="sports">Gender</label>



						<select id="gender" class="form-control" >
							<option><?php echo $user_basic['gender'];?></option>
							<option id="Male" value="<?php echo $user_basic['name'];?>" >Male</option>
							<option id="Female" value="<?php echo $user_basic['name'];?>" >Female</option>
						</select>
					</div>
					<div class="form-group">
					  <label for="link">Date Of Birth</label>
					  <input type="text" class="form-control"  id="dob" value="<?php echo $user_basic['dob'];?>">
					  <label id="startD_error" hidden>DOB is required .</label> 
					</div>



				</div>
              </div>
			  
			  
			  <div class="tab-pane" id="education">
			   <div class="box-header with-border">
                <h4>Education</h4> 	
			  </div>
                <div class="box-body">


<?php

$data            =   json_decode($prof_data['user_detail']);
if (isset($data))
{
$Education       =   $data->Education;
$Experience      =   $data->Experience;
$HeaderDetails   =   $data->HeaderDetails;

$sportEducation       = $Education->sportEducation  ;
$formalEducation      = $Education->formalEducation  ;
$otherCertification   = $Education->otherCertification  ;
$experienceAsPlayer   = $Experience->experienceAsPlayer;
$workExperience       = $Experience->workExperience;
}
else
{
  @$sportEducation = '';
  @$HeaderDetails->acamedy = '';
  @$HeaderDetails->description = '';
  @$HeaderDetails->designation  = '';
  @$HeaderDetails->location = '';

}

?>

			 <input type="hidden" name="userid"  class="form-control" id="newuserid">	
			 <input type="hidden" name="profid" class="form-control" id="profid">	


            <div class="panel panel-primary" >
            <div class="panel-heading clearfix">
            <div>
            <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Sports Education</h4>
            </div>
            <div> 
            <div class="box-header with-border">
            <div id="SportTicket" >
            </div>
            </div>
            </div>
            <div class="btn-group pull-right">
            <input type="button" id="addSportEdu" class="btn btn-danger btn1" value="Add Sport Education" />
            </div>
            </div>
             <p class="text-danger" id="sport_edu_error" hidden=""><b>Sports Education is required.</b></p>
            </div>

               


      <div class="panel panel-primary">
      <div class="panel-heading clearfix">
      <div>
      <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Formal Education</h4>
      </div>
      <div>
      <div class="box-header with-border">
      <div id="FormalEducation" ></div>
      </div>
      </div>   
      <div class="btn-group pull-right">
      <input type="button" id="addSportFormal" class="btn btn-danger btn1" value="Add Formal Education" />
      </div>
      </div>
      </div>


    <div class="panel panel-primary">
    <div class="panel-heading clearfix">
    <div>
    <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Certification</h4>
    </div>
    <div>
    <div class="box-header with-border">  
    <div id="OtherEducation" ></div>
    </div>
    </div>
    <div class="btn-group pull-right">
    <input type="button" id="addothereducation" class="btn btn-danger btn1" value="Add Certification" />
    </div>
    </div>
    </div>

     <input type="button" id="next" class="btn btn-lg btn-success" value="Next >>" />
	</div>
    </div>
			

    <div class="tab-pane" id="experience">
	<div class="box-header with-border">
    <h4>Experience:</h4> 	
	</div>
    <div class="box-body">	
	<div class="panel panel-primary">
    <div class="panel-heading clearfix">

    <div>
      <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Work Experience</h4>
      </div>
      <div id="workexpericence"></div>
      <div class="btn-group pull-right">
        <input type="button" id="workexp" class="btn btn-danger btn1" value="Add Work Experience" />
      </div>

    </div>
    </div>

  <div class="panel panel-primary" id="exp_as_player">
    <div class="panel-heading clearfix">
    <div>

      <h4 class="panel-title" style="font-weight: bold;font-size: 17px;">Experience as a Player</h4>

      </div>
      <div id="playerexp"></div>
      <div class="btn-group pull-right">
       <input type="button" id="asplayerexp" class="btn btn-danger btn1" value="Add Experience as player" />
      </div>
    </div>
    </div>
					  <input type="button" id="next1" class="btn btn-lg btn-success" value="Next >>" />
				</div>
              </div>
              <!-- /.tab-pane -->
        <div class="tab-pane" id="others">
        <div class="box-header with-border">
		<h4>Others:</h4 > 		
		</div>
        <div class="box-body">
        <div class="form-group">
        <label >Academy / Business Name</label>
        <input type="text" class='form-control' name="academy_name" id="academy_name" value="<?php  echo $HeaderDetails->acamedy ;?> " >
        </div>
        <div class="form-group">
        <label >Description</label>
        <input type="text" class='form-control' name="Description" id="description" value="<?php  echo $HeaderDetails->description ;?> "  >
        </div>
        <div class="form-group">
        <label >Designation</label>
        <input type="text" class='form-control' name="designation" id="designation" disabled="" value="<?php  echo $HeaderDetails->designation ;?> "  >

        </div>
        <div class="form-group">
        <label >Location</label>
        <input type="text" class='form-control' name="Location" id="location" value="<?php  echo $HeaderDetails->location ;?> "  >
        </div>
        <input type="button" class="btn btn-lg btn-primary" id="save"  value="Submit" name="Create">
		</div>
        </div>
           
            </div>
            </form>
         
          
			 
			
          </div>
	  </div>
		
	  
</div>
</div>
</section>

<script type="text/javascript">
	$(function() {
    $("#dob").datepicker();
  });
   


    $("#exp_as_player").show();
   $("#2").show();
   $("#3").show(); 
   $("#4").show();
   $("#save").show();
   
</script>
<script type="text/javascript">

$("#basicdata").click(function()
{

  var professions = $("#prof").val();

  
  if(professions == 0 || $("#email").val() == '')
  {
    $("#email_error").show();   
    $("#prof_error").show();       
 

  }else{

     $("#email_error").hide();   
    $("#prof_error").hide(); 
 
    if(professions!=null)
    {
    var prof_data  = professions.split(",");
    var prof_id    = prof_data[1];
    var prof_name  = prof_data[0];
   
    $("#profid").val(prof_id);

    $("#designation").val(prof_name);


   }

    var data1 = 
    {
    "name"        : $("#name").val(),
    "email"       : $("#email").val(),
    "phone_no"    : $("#phone").val(),
    "dob"         : $("#dob").val(),
    "sport"       : $("#sport").val(),
    "prof_name"   : prof_name,
    "prof_id"     : prof_id,
    "gender"      : $("#gender").val(),
    "location"    : $("#location").val()
    };


    var url  = '<?php echo site_url();?>';

    var data = JSON.stringify(data1);


    $.ajax({
      type : "POST",
      url  : "<?php echo site_url('forms/user_register_byAdmin');?>",
      data : data,
      dataType : "text",
      success : function(result)
      {




          if(result.data == 0)
          {
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
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });



          }

          else if(result.data == 3){
           $.confirm({
              title: 'Ohh!',
              content: 'You are Aleardy register with Us!',
              type: 'red',
              typeAnimated: true,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-red',
                      action: function(){
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });

          }else{
           
         if($("#designation").val() == "Trainer" || $("#designation").val() == "Coach" )
         {

            $("#exp_as_player").show();
         } 

        
      //  var userid    =  JSON.parse(result);

        var userid    =  <?php echo $user_basic['userid'];?>;

        $("#newuserid").val(userid);

			   $("#tab_event").hide();
			   $("#basicdata").hide();
			   $("#2").show();
			   $("#3").show(); 
			   $("#4").show();
			   $("#save").show();
			   $("#education1").addClass("active");
         $("#basic1").removeClass('active');
	       $("#tabs").tabs("option", "active", 1);

        $.confirm({
        title: 'Congratulations!',
        content: 'Profile is Updated.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();


                }
            },
            close: function () {
              $("#imagelodar").hide();
            
            }
        }
    });
      }
      }
    });
}
});

</script>


<script> 






    var form          = document.getElementById("SportTicket");
    var newDiv        = document.createElement("div");
    var pausecontent  = new Array();
    <?php
    if (isset($sportEducation)) {

      foreach($sportEducation as $key => $val){ 

    ?>
    pausecontent[<?php echo $key ?> ] = <?php echo json_encode($val, JSON_PRETTY_PRINT); ?>;
    <?php } }?>

    for(var i = 0; i < pausecontent.length; i++)
    {
     var form       = document.getElementById("SportTicket");
     var newDiv     = document.createElement("div");
     sportsticket   = i;
     newDiv.innerHTML = "<div class='box-body'style='background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name Of Sport Education</label><input value="+ window.pausecontent[i].degree +"  type='text' class='form-control' id='nameofsporteducation"+ window.sportsticket +"'></div><div><label>Institution/Organisation Name</label><input value="+ pausecontent[i].organisation +" type='text' class='form-control' id='sport_inst_org"+ window.sportsticket +"' ></div><div><label>Stream /Specialisation</label><input type='text' class='form-control' id='sport_stream_spel"+ window.sportsticket +"' value="+ window.pausecontent[i].stream +"  ></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='sport_from_date"+ window.sportsticket +"' value="+ window.pausecontent[i].courseDuration +"  ><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control' id='sport_to_date"+ window.sportsticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
      form.appendChild(newDiv);
      window.sportsticket++;
    }


</script>



<script>




  var form         = document.getElementById("FormalEducation");
  var newDiv       = document.createElement("div");


    var pausecontent  = new Array();
    <?php

    if (isset($formalEducation)) {


      foreach($formalEducation as $key => $val){ 
    ?>
    
   pausecontent[<?php echo $key ?> ] = <?php echo json_encode($val, JSON_PRETTY_PRINT); ?>;
    <?php } } ?>
    
    for (var i = 0; i < pausecontent.length; i++)
    {
      var form         = document.getElementById("FormalEducation");
      var newDiv       = document.createElement("div");
      formalticket   = i;



  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name of Formal Education</label><input value="+ window.pausecontent[i].degree +"  type='text' class='form-control' id='formal_education"+  window.formalticket +"'></div><div><label>Institution / Organisation Name</label><input value="+ window.pausecontent[i].organisation +"  type='text' class='form-control' id='formal_inst_org"+ window.formalticket +"'></div><div><label>Stream /Specialisation</label><input value="+ window.pausecontent[i].stream +"  type='text' class='form-control' id='formal_stream"+ window.formalticket +"'></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].courseDuration +" type='text' class='form-control'   id='formal_from_date"+ window.formalticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].courseDuration +"  type='text' class='form-control' id='formal_to_date"+  window.formalticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.formalticket++;

}

</script>

<script>

  var form     = document.getElementById("OtherEducation");
  var newDiv     = document.createElement("div");
   var pausecontent  = new Array();
    <?php
    if (isset($otherCertification)) {
      foreach($otherCertification as $key => $val){ 
    ?>
    pausecontent[<?php echo $key ?> ] = <?php echo json_encode($val, JSON_PRETTY_PRINT); ?>;
    <?php } } ?>
    for (var i = 0; i < pausecontent.length; i++)
    {
      var form         = document.getElementById("OtherEducation");
      var newDiv       = document.createElement("div");
      ohterticket   = i;
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name of Certificate</label><input value="+ window.pausecontent[i].degree +" type='text' class='form-control' id='certi_name"+  window.ohterticket +"'></div><div><label>Institution / Organisation Name</label><input type='text' value="+ window.pausecontent[i].organisation +"  class='form-control' id='certi_inst_org"+ window.ohterticket +"'></div><div><label>Stream /Specialisation</label><input value="+ window.pausecontent[i].stream +"  type='text' class='form-control' id='certi_stream"+window.ohterticket +"'></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].courseDuration +" type='text' class='form-control'   id='certi_from_date"+ window.ohterticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].courseDuration +" type='text' class='form-control' id='certi_to_date"+ window.ohterticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.ohterticket++;
  }
</script>

<script>

  var form     = document.getElementById("playerexp");
  var newDiv     = document.createElement("div");
   var pausecontent  = new Array();
    <?php
    if (isset($experienceAsPlayer)) {
      foreach($experienceAsPlayer as $key => $val){ 
    ?>
    pausecontent[<?php echo $key ?> ] = <?php echo json_encode($val, JSON_PRETTY_PRINT); ?>;
    <?php } } ?>
    for (var i = 0; i < pausecontent.length; i++)
    {
     asplayerticket   = i;



var form     = document.getElementById("playerexp");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label style='color:#494242;'>Designation</label><input value="+ window.pausecontent[i].designation +"  type='text' class='form-control' id='exp_asplayer_name"+ window.asplayerticket +"'></div><div><label style='color:#494242;'>Institution / Organisation Name</label><input value="+ window.pausecontent[i].organisationName +" type='text' class='form-control' id='exp_asplayer_inst_org"+ window.asplayerticket +"'></div><div><label style='color:#494242;'>Description</label><input value="+ window.pausecontent[i].description +" type='text' class='form-control' id='exp_asplayer_desc"+ window.asplayerticket +"'></div><label style='color:#494242;'>Period</label><div></div><label style='color:#494242;'>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].dateFrom +" type='text' class='form-control'   id='exp_asplayer_from_date"+ window.asplayerticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label style='color:#494242;'>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].dateTo +"  type='text' class='form-control' id='exp_asplayer_to_date"+ window.asplayerticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.asplayerticket++;
}
</script>

<script >
    var form     = document.getElementById("workexpericence");
  var newDiv     = document.createElement("div");
   var pausecontent  = new Array();
    <?php
    if (!isset($workexpericence)) {
      foreach($workExperience as $key => $val){ 
    ?>
    pausecontent[<?php echo $key ?> ] = <?php echo json_encode($val, JSON_PRETTY_PRINT); ?>;
    <?php }  } ?>
    for (var i = 0; i < pausecontent.length; i++)
    {
     workexpticket   = i;



  var form     = document.getElementById("workexpericence");
  var newDiv     = document.createElement("div");

  newDiv.innerHTML = "<div class='box-body'  style='background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd; '><div><label style='color:#494242;'>Designation</label><input value="+ window.pausecontent[i].designation +" type='text' class='form-control' id='work_exp_name"+ window.workexpticket +"'></div><div><label style='color:#494242;'>Institution / Organisation Name</label><input value="+ window.pausecontent[i].organisationName +"  type='text' class='form-control' id='work_exp_inst_org"+ window.workexpticket +"'></div><div><label style='color:#494242;'>Description</label><input value="+ window.pausecontent[i].description +"  type='text' class='form-control' id='work_exp_desc"+ window.workexpticket +"'></div><label style='color:#494242;'>Period</label><div></div><label style='color:#494242;'>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].dateFrom +" type='text' class='form-control'   id='work_from_date"+ window.workexpticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label style='color:#494242;'>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input value="+ window.pausecontent[i].dateTo +"  type='text'  id='work_to_date"+ window.workexpticket +"'  class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.workexpticket++;

}
</script>





<script type="text/javascript">
document.getElementById("addSportEdu").onclick = function() 
{

  var form     = document.getElementById("SportTicket");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'style='background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name Of Sport Education</label><input type='text' class='form-control' id='nameofsporteducation"+ window.sportsticket +"'></div><div><label>Institution/Organisation Name</label><input type='text' class='form-control' id='sport_inst_org"+ window.sportsticket +"'></div><div><label>Stream /Specialisation</label><input type='text' class='form-control' id='sport_stream_spel"+ window.sportsticket +"'></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='sport_from_date"+ window.sportsticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control' id='sport_to_date"+ window.sportsticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.sportsticket++;
}




document.getElementById("addSportFormal").onclick = function() 
{
  var form         = document.getElementById("FormalEducation");
  var newDiv       = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name of Formal Education</label><input type='text' class='form-control' id='formal_education"+  window.formalticket +"'></div><div><label>Institution / Organisation Name</label><input type='text' class='form-control' id='formal_inst_org"+ window.formalticket +"'></div><div><label>Stream /Specialisation</label><input type='text' class='form-control' id='formal_stream"+ window.formalticket +"'></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='formal_from_date"+ window.formalticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control' id='formal_to_date"+  window.formalticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.formalticket++;
}

document.getElementById("addothereducation").onclick = function() 
{
  var form     = document.getElementById("OtherEducation");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label>Name of Certificate</label><input type='text' class='form-control' id='certi_name"+  window.ohterticket +"'></div><div><label>Institution / Organisation Name</label><input type='text' class='form-control' id='certi_inst_org"+ window.ohterticket +"'></div><div><label>Stream /Specialisation</label><input type='text' class='form-control' id='certi_stream"+window.ohterticket +"'></div><label>Period</label><div></div><label>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='certi_from_date"+ window.ohterticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control' id='certi_to_date"+ window.ohterticket +"' class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.ohterticket++;
}


document.getElementById("workexp").onclick = function() 
{
  var form     = document.getElementById("workexpericence");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd; '><div><label style='color:#494242;'>Designation</label><input type='text' class='form-control' id='work_exp_name"+ window.workexpticket +"'></div><div><label style='color:#494242;'>Institution / Organisation Name</label><input type='text' class='form-control' id='work_exp_inst_org"+ window.workexpticket +"'></div><div><label style='color:#494242;'>Description</label><input type='text' class='form-control' id='work_exp_desc"+ window.workexpticket +"'></div><label style='color:#494242;'>Period</label><div></div><label style='color:#494242;'>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='work_from_date"+ window.workexpticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label style='color:#494242;'>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text'  id='work_to_date"+ window.workexpticket +"'  class='form-control'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.workexpticket++;
}

document.getElementById("asplayerexp").onclick = function() 
{
  var form     = document.getElementById("playerexp");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='    background-color: white;border-color: black;border-radius: 4px;padding: 10px 20px;margin-bottom: 30px;margin-top: 10px; box-shadow: 0px 0px 3px #bbbdbd;    -webkit-box-shadow: 0px 0px 3px #bbbdbd;'><div><label style='color:#494242;'>Designation</label><input type='text' class='form-control' id='exp_asplayer_name"+ window.asplayerticket +"'></div><div><label style='color:#494242;'>Institution / Organisation Name</label><input type='text' class='form-control' id='exp_asplayer_inst_org"+ window.asplayerticket +"'></div><div><label style='color:#494242;'>Description</label><input type='text' class='form-control' id='exp_asplayer_desc"+ window.asplayerticket +"'></div><label style='color:#494242;'>Period</label><div></div><label style='color:#494242;'>From</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control'   id='exp_asplayer_from_date"+ window.asplayerticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div><label style='color:#494242;'>To</label><div class='input-group date' style='margin:5px; overflow: hidden;' data-provide='datepicker'><input type='text' class='form-control' id='exp_asplayer_to_date"+ window.asplayerticket +"'><div style='background-color: transparent;border: none;' class='input-group-addon'></div></div></div>"; 
    form.appendChild(newDiv);
    window.asplayerticket++;
}




function formatDate(date) 
{
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}



$("#tabs").tabs();
$("#next").click(function() 
{
	$("#experience2").addClass("active");
  $("#education1").removeClass('active');
	$("#tabs").tabs("option", "active", 2);
});

$("#next1").click(function() 
{
	$("#others2").addClass("active");
    $("#experience2").removeClass('active');
	$("#tabs").tabs("option", "active", 3);
});


$("#save").click(function()
{
 var sportArray = [];
 var formalArray = [];
 var otherArray = [];
 var workArray = [];
 var asplayerArray = [];
 var finalArray = [];


if($("#designation").val() == "Trainer" )
{ 
  if(window.sportsticket == 0)
  {
  $("#2").css('color', 'red');  
  $("#sport_edu_error").show();
  return ; 

  }
}

  for(var i =0; i <window.sportsticket; i++)
  {
    var fromdate = formatDate($("#sport_from_date"+i).val());
     var todate = formatDate($("#sport_to_date"+i).val());

    var temp = {"degree":$("#nameofsporteducation"+i).val(),"organisation":$("#sport_inst_org"+i).val(),"stream":$("#sport_stream_spel"+i).val(),"courseDuration":fromdate + " to " + todate };
      sportArray.push(temp);

  }

  for(var i =0; i <window.formalticket; i++)
  {
     var fromdate = formatDate($("#formal_from_date"+i).val());
     var todate = formatDate($("#formal_to_date"+i).val());
    var temp = {"degree":$("#formal_education"+i).val(),"organisation":$("#formal_inst_org"+i).val(),"stream":$("#formal_stream"+i).val(),"courseDuration":fromdate + " to " + todate };
      formalArray.push(temp);

  }

  for(var i =0; i <window.ohterticket; i++)
  {
     var fromdate = formatDate($("#certi_from_date"+i).val());
     var todate = formatDate($("#certi_to_date"+i).val());

    var temp = {"degree":$("#certi_name"+i).val(),"organisation":$("#certi_inst_org"+i).val(),"stream":$("#certi_stream"+i).val(),"courseDuration":fromdate + " to " + todate };
      otherArray.push(temp);

  }

for(var i =0; i <window.workexpticket; i++)
  {
     var fromdate = formatDate($("#work_from_date"+i).val());
     var todate = formatDate($("#work_to_date"+i).val());

    var temp = {"designation":$("#work_exp_name"+i).val(),"organisationName":$("#work_exp_inst_org"+i).val(),"description":$("#work_exp_desc"+i).val(),"dateFrom":fromdate,"dateTo":todate};
      workArray.push(temp);

  }

  for(var i =0; i <window.asplayerticket; i++)
  {
     var fromdate = formatDate($("#exp_asplayer_from_date"+i).val());
     var todate = formatDate($("#exp_asplayer_to_date"+i).val());

    var temp = {"designation":$("#exp_asplayer_name"+i).val(),"organisationName":$("#exp_asplayer_inst_org"+i).val(),"description":$("#exp_asplayer_desc"+i).val(),"dateFrom":fromdate,"dateTo":todate};
      asplayerArray.push(temp);

  }


  
  var ftemp = {"Education":{"formalEducation" : formalArray,"otherCertification":otherArray,"sportEducation":sportArray},"Experience":{"experienceAsPlayer":asplayerArray,"workExperience":workArray},"HeaderDetails":{"acamedy":$("#academy_name").val() ,"description":$("#description").val() ,"designation":$("#designation").val() ,"location":$("#location").val()}};

var totalftemp = JSON.stringify(ftemp);
saveUserProfile(totalftemp);

});

</script>





