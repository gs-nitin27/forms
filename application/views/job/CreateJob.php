<!-- Js files-->

  <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/bootstrap-3.min.css">
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
  <script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>" > </script>


 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


 <!--
    <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />

        -->

    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
   
    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
        rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
        type="text/javascript"></script>
  
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Job
        
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
              <li class="active" ><a href="#tab_event" data-toggle="tab" id="1" >Job Details </a></li>
              <li ><a href="#tab_organiser" data-toggle="tab"  id="2">Organisation</a></li>
              <li ><a href="#tab_eligible" data-toggle="tab" id="3" >Requirements</a></li>
             </ul>   
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
         <div class="box-header with-border">
                <h4>Job Details:</h4 >  
        </div>
                <div class="box-body">
          
          <div class="form-group">
            <label for="eventName">Job Title</label>
            <input type="text" class="form-control"  id="jtitle" >
             <label id="jtitle_error" hidden>Job Title is required .</label> 
          </div >

         <?php
          $data=$this->session->userdata('item');
          $userid=$data['adminid'];
          {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
            </div>
          <?php }?>



          <label for="exampleInputEmail1">Description</label>
           <textarea class="ckeditor"  name="description" id="jdesc" placeholder="Place some text here(Maximum 375 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          <script>
          var editor=CKEDITOR.replace('jdesc');
          </script>




     <!--      <div class="form-group">
            <label>Job Description</label>
            <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="jdesc" ></textarea>
           <label id="jdesc_error" hidden>Job Description is required .</label> 
          </div> -->
           
          <div class="form-group">
            
            <label for="eventtype">Job Type</label>
            <select id="jtype" class="form-control" >
            <option value="0">- Select -</option> 
              
            <option value ="Part Time">Part Time </option>
            <option value ="Full Time">Full Time </option>    
        </select>
         <label id="jtype_error" hidden>Job Type is required .</label> 
          </div >
         

<!--        <script type="text/javascript">
        $(function () {
            $('#lstFruits').multiselect({
                includeSelectAllOption: true
            });

            $('#btnSelected').click(function () {
                var selected = $("#lstFruits option:selected");
                var message = "";
                var i =0;
                selected.each(function () {
                  if(i==0)
                  {
                    message +=$(this).val();
                    i = i+1;
                  }
                  else
                  {
                    i = i+1;
                    message += " , " + $(this).val() ;
                  }
                });
                
                $("#jsports").val(message);
            });
        });
    </script> -->
<!--     <div class="form-group">
    <?php // $sports = $this->register->getSport();?>
    <select id="lstFruits" class="form-control"  multiple="multiple">
       <?php// if(!empty($sports)){
                      //  foreach($sports as $sport){?>
        <option value ="<?php// echo $sport['sports'];?>"><?php// echo $sport['sports'];?> </option>
         <?php //  }
                        //   } 
                       //  ?>
    </select>
    <input type="button" id="btnSelected" value="Get Selected" />
     </div> -->

            <script type="text/javascript">
                $(function() {
                    $('.multiselect-ui').multiselect({
                        includeSelectAllOption: true
                    });
                });


      get_sport = function()
     {
        $('#sport').val('');
        var list = $('#dates-field2').val().join(',');
        $('#sport').val(list);   
     }
                </script>

              <div class="form-group">
              <div class="col-md-4">
              <div class="form-group">
              <label class="exampleInputEmail1" for="rolename">Sports</label>
              <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" onchange="get_sport()">
               <?php  $sports = $this->register->getSport();?>
               <?php if(!empty($sports))
               {
                        foreach($sports as $sport){?>
              <option  value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                  <?php  }
                          } 
                         ?>
      </select>
      </div>
     </div>
<input type="text" id="sport" class="form-control" name="sport" value="" disabled="">
</div>



<!-- 
    <div class="form-group">
    <input type="text" id="jsports" class="form-control" name="sport" disabled="">
   </div> -->
   
          <div class="form-group">
            <label for="city">Job Location</label>
            <input type="text" class="form-control"  id="jcity" placeholder="Enter City">
             <label id="jcity_error" hidden>Job Location is required .</label> 
          </div>
          <div class="form-group">
            <label for="address1">Address Line1</label>
            <input type="text" class="form-control"  id="jadd1" placeholder="Enter Address">
            <label id="jadd1_error" hidden>Address Line1 is required .</label> 
          </div >
          <div class="form-group">
            <label for="address2">Address Line2</label>
            <input type="text" class="form-control"  id="jadd2" placeholder="Enter Address">
          <label id="jadd2_error" hidden>Address Line2 is required .</label> 
          </div >
          <!-- STATE IS ID BASED -->
          <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control"  id="jstate" placeholder="Enter State" >

           <label id="jstate_error" hidden>State Name is required .</label> 
          </div >
          <div class="form-group">
            <label for="pin">Pin</label>
            <input type="text" class="form-control"  id="jpin" placeholder="Enter Pin">
          <!--  <label id="name_error" hidden>Event Name is required .</label>  -->
          </div >

          <div class="form-group">
          <label for="link">Job Link</label>
          <input type="text" class="form-control"   id="job_link" placeholder="http://">
          <label id="job_links_error" hidden>Job Link is required .</label> 
          </div >
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
         <div class="box-header with-border">
                <h4>Organisation Details:</h4>  
        </div>
                <div class="box-body">
           <div class="form-group">
            <label for="eventName">Organisation Name</label>
            <input type="text" class="form-control" id="orgName" >
             <label id="orgName_error" hidden>Organisation Name is required .</label> 
          </div >
          <div class="form-group">
            <label>About Organisation</label>
            <textarea class="form-control" rows="3" style="resize:none;" class="desc" id="abOrg" ></textarea>
           <label id="abOrg_error" hidden>About Organisation is required .</label> 
          </div>
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
            <label for="city">Location</label>
            <input type="text" class="form-control"  id="orgcity" placeholder="Enter City">
             <label id="orgcity_error" hidden>Location Name is required .</label> 
          </div>
          <!-- STATE IS ID BASED -->
          <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control"  id="orgstate" placeholder="Enter State" >

           <label id="orgstate_error" hidden>State Name is required .</label> 
          </div >
          <div class="form-group">
            <label for="pin">Pin</label>
            <input type="text" class="form-control"  id="orgpin" placeholder="Enter Pin">
            <!--  <label id="name_error" hidden>Event Name is required .</label>  -->
          </div >
          <div class="form-group">
            <label for="eventName">Email</label>
            <input type="text" class="form-control" id="email">
             <label id="email_error" hidden>Email is required .</label> 
          </div >
          <div class="form-group">
            <label for="eventName">Contact No.</label>
            <input type="text" class="form-control" id="cont">
             <label id="cont_error" hidden>Contact No is required .</label> 
          </div >
        </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible">
        <div class="box-header with-border">
                <h4>Requirements:</h4>  
      </div>
                <div class="box-body">
           <div class="form-group">
            <label for="eventName">Work Experience</label>
            <input type="text" class="form-control" id="jexp">
           
             <label id="jexp_error" hidden>Work Experience is required .</label> 
          </div>
          <div class="form-group">
            <label for="eventName">Qualifications</label>
            <input type="text" class="form-control" id="jqualification" >
             <label id="jqualification_error" hidden>Qualifications is required .</label> 
          </div>
          <div class="form-group">
            <label for="link">Desired skills</label>
            <input type="text" class="form-control"  id="skill" >
           <!--   <label id="name_error" hidden>Event Name is required .</label>  -->
          </div>
          <div class="form-group">
            <label for="link">Key Requirement</label>
            <input type="text" class="form-control"  id="jreq">
           <!--   <label id="name_error" hidden>Event Name is required .</label>  -->
          </div>

          <div class="form-group">
          <label for="sports">Gender</label>
            <select id="gender" class="form-control" >
              <option>-Select-</option>
              <option id="Male">Male</option>
              <option id="Female">Female</option>
              <option id="Transgender">All</option>
            </select>
          </div>

       
        </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </form>

            

            <form id="form"  method="post" enctype="multipart/form-data">


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

                        <input type="file" accept="image/png, image/jpeg, image/gif" id="Jimage" name="file"/>
                        
                        
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
                <input type="hidden" class="form-control" name="path"   id="path" value="uploads/job/">
                <input type="hidden" class="form-control" name="height" id="height" value="512">
                <input type="hidden" class="form-control" name="width"  id="width" value="512">
                </div>
               <!--  <input id="button" type="submit" value="Upload"> -->
            </form>

              <input type="hidden" class="form-control" name="photo" id="photo_url"> 
              <div id="mess" hidden>Image Uploded</div>
      <div class="box-footer">
      <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Create Job" name="Create">
      </div>
          </div>
    </div>
</div>
</div>
</section>

<script type="text/javascript">
var expanded = false;
function showCheckboxes() 
{
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
</script>

<script type="text/javascript">
  $(document).ready(function (e) {
  $("#form").on('submit',(function(e) 
  {
    if($('#Jimage').val())
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
          //alert(data);
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
         function () 
         {
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
       
   if($("#jtitle").val() !="" && description !="" && $("#orgName").val() !="" & $("#job_link").val() !="" )
     {
            save();
       }else
       {
                  $("#2").css("color","red");
                  $("html, body").animate({ scrollTop: 0 }, 500);
           
                if($("#jtitle").val() =="")
                {
                  $("#jtitle_error").show();
                  $("#jtitle_error").css("color","red");

                }
                else
                {
                    $("#jtitle_error").hide();
                }
                  if(description =="")
                  {
                    $("#jdesc_error").show();
                    $("#jdesc_error").css("color","red");
                  }
                 else
                 {
                  $("#jdesc_error").hide();
                 }
               
                if($("#job_link").val() =="")
                {
                  $("#job_link_error").show();
                  $("#job_link_error").css("color","red");
                }
                else
                {
                  $("#job_link_error").hide();
                }
                 if($("#orgName").val() =="")
                 {
                 $("#orgName_error").show();
                 $("#orgName_error").css("color","red");
                 }
                else
                {
                  $("#orgName_error").hide();
                }
          }
    });
  </script>
  <script type="text/javascript">


function save()
{



  $("#imagelodar").show();
  var description     = editor.getData();

  // alert(description);return;

var data1 = {
    "id"                      : 0, 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#jtitle").val(),
    "address_line1"           : $("#jadd1").val(), 
    "address_line2"           : $("#jadd2").val(), 
    "type"                    : $("#jtype").val(),
    "city"                    : $("#jcity").val(), 
    "pin"                     : $("#jpin").val(), 
    "state"                   : $("#jstate").val(),
    "work_experience"         : $("#jexp").val(),
    "desired_skills"          : $("#skill").val(),
    "description"             : description,
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
    "job_links"               : $("#job_link").val(),
    "start_date"              : $("#startD").val(),
    "end_date"                : $("#endD").val(),
    "sports"                  : $("#sport").val().toString(),
    "image"                   : $("#photo_url").val(),
    "gender"                  : $("#gender").val()

};
var url = '<?php echo site_url();?>';

//console.log(JSON.stringify(data1));

var data = eval(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveJob'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {

     // alert(result);//return;

       if(result == '1')
         {
         $.confirm({
         title: 'Congratulations!',
         content: 'Job is Created.',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/getJob?job";
                }
            },
            close: function () {
            window.location.href = url+"/forms/getJob?job";
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



  </script>

