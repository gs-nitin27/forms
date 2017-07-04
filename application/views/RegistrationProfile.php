 <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>

 <script type="text/javascript">
   window.sportsticket = 0;
   window.formalticket = 0;
   window.ohterticket = 0; 
   window.workexpticket =0;
   window.asplayerticket = 0; 
 </script>
<style type="text/css">
 .card {
    margin-top: 20px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;

}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-name {
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
    top :140px;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}
</style>


<script>

function saveUserProfile(userjson)
{
$("#imagelodar").show();

var data = {

    "id"                       : $("#uid").val(),
    "userdata"                 : userjson
};
console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/Registration_userdata'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
     alert(result);
    //   if(result == '1')
    //   {
    //       // $("#imagelodar").hide();
    //     $.confirm({
    //     title: 'Congratulations!',
    //     content: 'Module is Created.',
    //     type: 'green',
    //     typeAnimated: true,
    //     buttons: {
    //         tryAgain: {
    //             text: 'Thank You !',
    //             btnClass: 'btn-green',
    //             action: function(){
    //               $("#imagelodar").hide();
    //              //window.location.href = url+"/forms/getContent?Content";
    //             }
    //         },
    //         close: function () {
    //           $("#imagelodar").hide();
    //          //window.location.href = url+"/forms/getContent?Content";
    //         }
    //     }
    // });
    //   }
    //   else
    //   {
    //          // $("#imagelodar").hide();
    //          $.confirm({
    //           title: 'Encountered an error!',
    //           content: 'Something went Worng, this may be server issue.',
    //           type: 'dark',
    //           typeAnimated: true,
    //           buttons: {
    //               tryAgain: {
    //                   text: 'Try again',
    //                   btnClass: 'btn-dark',
    //                   action: function(){
    //                     $("#imagelodar").hide();
    //                   }
    //               },
    //               close: function () {
    //                 $("#imagelodar").hide();
    //               }
    //           }
    //       });
    //   }
    }
});   
}
</script>  

<?php  
      $profile = $this->register->profile($id); 
     foreach ($profile as $value) 
      {
      }

      // print_r($value);
      ?>
<div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
<div class="wrapper">
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-11 col-sm-11">
    <div class="card hovercard">
        <div class="card-background">

             
          <!--   <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/"> -->
            <!-- http://lorempixel.com/850/280/people/9/ -->
             <img class="card-bkimg" alt="" src="<?php echo base_url('img/background.jpg');?>" alt="User profile picture">
        </div>
        <div class="useravatar">
            <?php 
                    if($value['user_image']) {
             ?>
           <img class="card-bkimg" alt="" src="<?php echo base_url()."uploads/profile/".$value['user_image'];?>" alt="User profile picture">
             <?php } else { if($value['gender'] == 'Female') { ?>
                <img class="card-bkimg" alt="" src="<?php echo base_url('img/female.jpg');?>" alt="User profile picture">
           <?php } else { ?>
          <img class="card-bkimg" alt="" src="<?php echo base_url('img/user.jpg');?>" alt="User profile picture">
            <?php } } ?>
        </div>
        <div class="card-info"><span class="card-title"><?php echo $value['name'];?></span></div>
      <?php if($value['prof_name']) {?>
         <div class="card-name" ><span ><b><?php echo $value['prof_name'];?></b></span></div>
         <?php }?>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Education</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <div class="hidden-xs">Experience</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Others</div>
            </button>
        </div>
        <!-- <div class="btn-group" role="group">
            <button type="button" id="basic" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div> -->
    </div>


      <div class="tab-content">
       <div class="tab-pane fade in active" id="tab1">
           
          <div class="row">
          <div class="col-md-12">
          <div class="box box-primary" style="margin-top:5%;">
          <div class="box-body box-profile">
          <input type="hidden" name="userid" id="uid" value="<?php echo $value['userid']; ?>">
           <div class="form-group"> 
           <div class="box-header with-border">
           <div id="SportTicket" ></div>
           <input type="button" id="addSportEdu" class="btn btn-danger" value="Add Sport Education" />
           </div>
          </div>
          
          

          <div class="form-group">
           <div class="box-header with-border">
           <div id="FormalEducation" ></div>
           <input type="button" id="addSportFormal" class="btn btn-danger" value="Add Formal Education" />
           </div>
           </div>
               
          
          


          <div class="form-group">
           <div class="box-header with-border">
           <div id="OtherEducation" ></div>
           <input type="button" id="addothereducation" class="btn btn-danger" value="Add Certification" />
           </div>
           </div>
               
          
          



            
            </div>
          </div>
         

</div>
     
            </div>

        </div>
        <div class="tab-pane fade in" id="tab2">
        <div class="row"> 
        <div class="col-md-12">
        <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
          


          <div class="form-group">
           <div class="box-header with-border">
           <div id="workexpericence" ></div>
           <input type="button" id="workexp" class="btn btn-danger" value="Add Work Experience" />
           </div>
           </div>

           <div class="form-group">
           <div class="box-header with-border">
           <div id="playerexp" ></div>
           <input type="button" id="asplayerexp" class="btn btn-danger" value="Add Experience as player" />
           </div>
           </div>
            
         
          </div>
         </div>
         </div>
            
            </div>
             
        </div>
        <div class="tab-pane fade in" id="tab3">
        <div class="row"> 
        <div class="col-md-12">
        <div class="box box-primary" style="margin-top:5%;">
        <div class="box-header with-border">

        <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $value['dob'];?>" placeholder="Date Of Birth" disabled>
        </div>
         

        <div class="form-group">
        <label for="prof_language">Language Known</label>
        <input type="text" class="form-control" name="prof_language" id="prof_language" value="<?php echo $value['prof_language'];?>"  placeholder="Language Known">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Age Group Coach</label>
        <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
        </div>

        <div class="form-group">
        <label for="prof_name">Profession</label>
        <input type="text" class="form-control" name="prof_name" id="prof_name" value="<?php echo $value['prof_name'];?>" disabled>
        </div>
        <div class="form-group">
        <label for="sport">Sport</label>
        <input type="text" class="form-control" name="sport" id="sport" value="<?php echo $value['sport'];?>" placeholder="sport" disabled>
        </div>
        <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $value['gender'];?>" placeholder="Gender" disabled>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Link to personal Website</label>
        <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
        </div>


        <div class="box box-default">
        <div class="box-body box-profile">
        <div class="form-group">
        <label for="academy_name">Academy / Business Name</label>
        <input type="text" class="form-control" name="academy_name" id="academy_name" placeholder="Academy / Business Name">
        </div>
        <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="form-control" name="Location" id="location" placeholder="Location">
        </div>
        <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" name="Description" id="description" placeholder="Description">
        <input type="hidden" class="form-control" name="Prof" id="prof_name" value="<?php echo $value['prof_name'];?>">
        </div>
        </div>
        </div>




        </div>
        </div>
        </div>
        </div>
        
        </div>
      </div>

      <div class="box-footer">
      <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Submit">
      </div>


    </div>
     </div>
      </div>
    </div>
    
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    
document.getElementById("addSportEdu").onclick = function() 
{
  var form     = document.getElementById("SportTicket");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group'><label for='nameofsporteducation'>Name Of Sport Education :</label><input type='text' class='form-control' id='nameofsporteducation"+ window.sportsticket +"' placeholder='Name Of Sport Education'></div><div class='form-group'><label for='sport_inst_org'>Institution/Organisation Name :</label><input type='text' class='form-control' id='sport_inst_org"+ window.sportsticket +"' placeholder='Institution/Organisation Name'></div><div class='form-group'><label for='sport_stream_spel'>Stream /Specialisation:</label><input type='text' class='form-control' id='sport_stream_spel"+ window.sportsticket +"' placeholder='Stream /Specialisation'></div><div class='form-group'><label for='link'>Period</label><div></div><label for='from_period'>From</label><div class='input-group date' data-provide='datepicker'><input type='text' class='form-control' id='sport_from_date"+ window.sportsticket +"'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><label for='from_period'>To</label><div class='input-group date' data-provide='datepicker'><input type='text' id='sport_to_date"+ window.sportsticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div></div>"; 
    form.appendChild(newDiv);
    window.sportsticket++;
}

document.getElementById("addSportFormal").onclick = function() 
{
  var form     = document.getElementById("FormalEducation");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group'><label for='formal_education'>Name of Formal Education :</label><input type='text' class='form-control' id='formal_education"+ window.formalticket +"' placeholder='Name of Formal Education'></div><div class='form-group'><label for='formal_inst_org'>Institution / Organisation Name :</label><input type='text' class='form-control' id='formal_inst_org"+ window.formalticket +"' placeholder='Institution / Organisation Name'></div>  <label for='formal_stream'>Stream / Specialisation:</label><input type='text' class='form-control' id='formal_stream"+ window.formalticket +"' placeholder='Stream / Specialisation'><div class='form-group'><label for='link'>Period</label><div></div><label for='from_period'>From</label><div class='input-group date' data-provide='datepicker'><input type='text' id='formal_from_date"+ window.formalticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><label for='from_period'>To</label><div class='input-group date' data-provide='datepicker'><input type='text'id='formal_to_date"+ window.formalticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div></div>"; 
    form.appendChild(newDiv);
    window.formalticket++;
}

document.getElementById("addothereducation").onclick = function() 
{
  var form     = document.getElementById("OtherEducation");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group'><label for='certi_name'>Name of Certificate :</label><input type='text' class='form-control' id='certi_name"+ window.ohterticket +"' placeholder='Name of Certificate'></div><div class='form-group'><label for='certi_inst_org'>Institution / Organisation Name  :</label><input type='text' class='form-control' id='certi_inst_org"+ window.ohterticket +"' placeholder='Institution / Organisation Name'></div>  <label for='certi_stream'>Stream / Specialisation:</label><input type='text' class='form-control' id='certi_stream"+ window.ohterticket +"' placeholder='Stream / Specialisation'><label for='link'>Period</label><div></div><label for='from_period'>From</label><div class='input-group date' data-provide='datepicker'><input type='text' id='certi_from_date"+ window.ohterticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><label for='from_period'>To</label><div class='input-group date' data-provide='datepicker'><input type='text' id='certi_to_date"+ window.ohterticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div></div>"; 
    form.appendChild(newDiv);
    window.ohterticket++;
}









document.getElementById("workexp").onclick = function() 
{
  var form     = document.getElementById("workexpericence");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group'><label for='work_exp_name'>Designation :</label><input type='text' class='form-control' id='work_exp_name"+ window.workexpticket +"' placeholder='Designation'></div><div class='form-group'><label for='work_exp_inst_org'>Institution / Organisation Name :</label><input type='text' class='form-control' id='work_exp_inst_org"+ window.workexpticket +"' placeholder='Institution / Organisation Name'></div>  <label for='work_exp_desc'>Description:</label><input type='text' class='form-control' id='work_exp_desc"+ window.workexpticket +"' placeholder='Description'><label for='link'>Period</label><div></div><label for='from_period'>From</label><div class='input-group date' data-provide='datepicker'><input type='text' id='work_from_date"+ window.workexpticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><label for='from_period'>To</label><div class='input-group date' data-provide='datepicker'><input type='text' id='work_to_date"+ window.workexpticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div></div>"; 
    form.appendChild(newDiv);
    window.workexpticket++;
}
document.getElementById("asplayerexp").onclick = function() 
{
  var form     = document.getElementById("playerexp");
  var newDiv     = document.createElement("div");
  newDiv.innerHTML = "<div class='box-body'  style='background-color: #d9edf7; border-color: black;border-radius: 10px;margin-bottom: 10px;margin-top: 10px;'><div class='form-group'><label for='asplayer_name'>Designation :</label><input type='text' class='form-control' id='exp_asplayer_name"+ window.asplayerticket +"' placeholder='Designation'></div><div class='form-group'><label for='exp_asplayer_inst_org'>Institution / Organisation Name </label><input type='text' class='form-control' id='exp_asplayer_inst_org"+ window.asplayerticket +"' placeholder='Institution / Organisation Name'></div>  <label for='exp_asplayer_desc'>Description:</label><input type='text' class='form-control' id='exp_asplayer_desc"+ window.asplayerticket +"' placeholder='Description'><div class='form-group'><label for='link'>Period</label><div></div><label for='from_period'>From</label><div class='input-group date' data-provide='datepicker'><input type='text' id='exp_asplayer_from_date"+ window.asplayerticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div><label for='from_period'>To</label><div class='input-group date' data-provide='datepicker'><input type='text' id='exp_asplayer_to_date"+ window.asplayerticket +"' class='form-control'><div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></div></div></div>"; 
    form.appendChild(newDiv);
    window.asplayerticket++;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();
    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;
    return [year, month, day].join('-');
}




$("#save").click(function()
{

 
 var sportArray = [];
 var formalArray = [];
 var otherArray = [];
 var workArray = [];
 var asplayerArray = [];
 var finalArray = [];



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


    // var totalsportArray = JSON.stringify(sportArray);
    // var totalformalArray = JSON.stringify(formalArray);
    // var totalotherArray = JSON.stringify(otherArray);
    // var totalworkArray = JSON.stringify(workArray);
    // var totalasplayerArray = JSON.stringify(asplayerArray);

  var ftemp = {"Education":{"formalEducation" : formalArray,"otherCertification":otherArray,"sportEducation":sportArray},"Experience":{"experienceAsPlayer":asplayerArray,"workExperience":workArray},"HeaderDetails":{"acamedy":$("#academy_name").val() ,"description":$("#description").val() ,"designation":$("#prof_name").val() ,"location":$("#location").val()}};

var totalftemp = JSON.stringify(ftemp);

//alert(totalftemp); 

saveUserProfile(totalftemp);

});

</script>

            
    