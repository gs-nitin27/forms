<?php $prop = $this->register->get_academy_listing($id); 
        if(!empty($prop)){
          $prop = $prop[0];
          @$coaches = json_decode($prop['coaches_info']);
           if($coaches != '')
           {
            @$no_of_coaches = $coaches->no_of_coach;
            @$head_coaches = $coaches->head_coach;
           }else
           {
            $no_of_coaches = '';
            $head_coaches = '';
           }
        }

      
      ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1> Add Property </h1>
    </section>
    <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
    <div class=" alert alert-success" id="msgdiv" style="display:none">
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
   <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab" id="1" >Basic Info</a></li>
              <li ><a href="#tab_info" data-toggle="tab" id="2" >Ammenities</a></li>
             </ul>   
             <form role="form" action="" class="register">  
             <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
         <div class="box-header with-border">
                <h4>Basic Info</h4 >   
        </div>
              <div class="box-body">
          <div class="form-group">
            <label for="name">Name of property</label>
            <input type="text" class="form-control"  id="pname" value="<?php echo $prop['name'] ?>">
            <label id="pname_error" hidden>Name is required.</label>
          </div>
          
          <div class="form-group">
            <label for="proptype">Type</label>
            <input type="text" class="form-control"  id="ptype" value="<?php echo $prop['type'] ?>">
            <label id="ptype_error" hidden>Property Type is required.</label>
          </div>

          <div class="form-group">
            <label for="proplevel">Level</label>
            <Select class="form-control"  id="proplevel">
              <option>-Select-</option>
              <option id="I-League">I-League</option>
              <option id="ISL">ISL</option>
              <option id="I-League 2nd division">I-League 2nd division</option>
              <option id="AIFF Youth League">AIFF Youth League</option>
            </Select>
            <label id="plevel_error" hidden>Level is required.</label>
          </div>
         
          <div class="form-group">
            <label for="proplocation">Location</label>
            <input type="text" class="form-control"  id="proplocation" value="<?php echo $prop['location'] ?>">
            <label id="plocation_error" hidden>Location is required.</label>
          </div>

          <div class="form-group">
            <label for="propaddres">Address</label>
            <input type="text" class="form-control"  id="propaddress" value="<?php echo $prop['address'] ?>">
            <label id="paddress_error" hidden>address is required.</label>
          </div>

          <div class="form-group">
            <label for="propemail">Email</label>
            <input type="email" class="form-control"  id="propemail" value="<?php echo $prop['email'] ?>">
            <label id="pemail_error" hidden>Email is required.</label>
          </div>

          <div class="form-group">
            <label for="propphone">Contact Number</label>
            <input type="text" class="form-control"  id="propphone" value="<?php echo $prop['phone'] ?>">
            <label id="pphone_error" hidden>Contact number is required.</label>
          </div>

          <div class="form-group">
            <?php  
            // SPORTS IS ID BASED
            $sports = $this->register->getSport();
              
            ?>
            <label for="propphone">Sport</label>
            <select id="psport" class="form-control" >
            <option value="0">- Select -</option> 
              <?php if(!empty($sports)){
                  foreach($sports as $sport){?>
                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
              <?php   }
                  } 
              ?>
            </select>
            <label id="psport_error" hidden>Sport is required.</label>
          </div>
          </div>
          </div>
        
        
        <div class="tab-pane" id="tab_info">
          <div class="box-header with-border">
                <h4>Ammenities</h4>  
          </div>
          <div class="box-body">
          <div class="form-group">
            <label for="fee">Fee(in Rs.)</label>
            <input type="text" class="form-control"  id="fee" placeholder="" value="<?php echo $prop['fee'] ?>">
          </div >
          <div class="form-group">
            <label for="no_coaches">Number of Coaches</label>
            <input type="text" class="form-control"  id="no_coaches" placeholder="10" value="<?php echo $no_of_coaches; ?>">
          </div>
          <div class="form-group">
            <label for="no_coaches">Head coach</label>
            <input type="text" class="form-control"  id="hcoach" placeholder="" value="<?php echo $head_coaches; ?>">
          </div>
          
          <!-- STATE IS ID BASED -->
          <div class="form-check">
    <input type="checkbox" class="form-check-input" id="hostel" value="1">
    <label class="form-check-label" for="hostel">Is Hostel available?</label>
         </div>
         <div class="form-check">
    <input type="checkbox" class="form-check-input" id="residential" value="1">
    <label class="form-check-label" for="residential">Is Academy Residential?</label>
         </div>
         <div class="form-check">
    <input type="checkbox" class="form-check-input" id="schooling" value="1">
    <label class="form-check-label" for="schooling">Is schooling available?</label>
         </div>
        <div class="box-footer">
              <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Update Property" name="Create">
        </div>
        </div>
        </div></div></form>
<form id="form1"  method="post" enctype="multipart/form-data">
               <!--  Image : <input type="file" name="file" id="file" /> -->
   <div class="container">
    <div class="row">    
        <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left;margin-left: 0%;">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled" id="image_name" value="<?php echo $prop['image']; ?>"> <!-- don't give a name === doesn't send on POST/GET -->
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
                <input type="hidden" class="form-control" name="path"   id="path" value="uploads/property/">
                <input type="hidden" class="form-control" name="height" id="height" value="640">
                <input type="hidden" class="form-control" name="width"  id="width" value="1115">
                </div>
               <!--  <input id="button" type="submit" value="Upload"> -->
            </form>
              <input type="hidden" class="form-control" name="photo" id="photo_url"> 
              <div id="mess" hidden>Image Uploded</div>
<script type="text/javascript">
 
  var base_url = '<?php echo base_url();?>';
  $(document).ready(function (e) {

  $("#form1").on('submit',(function(e) 
  { var file_name = $('#pname').val();
    $('#file_name').val(file_name);
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

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDv7v3jJInF4dT2KKMXQIR6SHmtkMLX1SE&sensor=false&libraries=places&language=en-AU"></script>
<script type="text/javascript">
  var url = '<?php echo site_url();?>';
var autocomplete = new google.maps.places.Autocomplete($("#proplocation")[0], {});
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                var place = autocomplete.getPlace();
               /// console.log(place.address_components);return;
            });
$(document).ready(function(){
$('#proplevel').val('<?php echo $prop['level'] ?>');
$('#psport').val('<?php echo $prop['sports'] ?>');
var image = '<?php echo $prop['image']; ?>';
if(image != '')
{
var last = image.split('/');
var valu = last.pop();
$("#photo_url").val(valu);
}
else
{
 $("#photo_url").val(''); 
}

var hostel = '<?php echo $prop['hostel_available']; ?>';
var residential = '<?php echo $prop['residential']; ?>';
var schooling = '<?php echo $prop['schooling']; ?>';
if(hostel != '0')
{
$('#hostel').prop('checked',true);
}
if(schooling != '0')
{
$('#schooling').prop('checked',true);
}if(residential != '0')
{
$('#residential').prop('checked',true);
}
$('#save').on('click',function(){
if(validate() == true)
  {
    var data = {
    "id":'<?php echo $prop['id']; ?>',  
    "name":$('#pname').val(),
    "address":$('#propaddress').val(),
    "location":$('#proplocation').val(),
    "email":$('#propemail').val(),
    "phone":$('#propphone').val(),
    "type":$('#ptype').val(),
    "level":$('#proplevel').val(),
    "sport":$('#psport').val(),
    "no_coaches":$('#no_coaches').val(),
    "hcoach":$('#hcoach').val(),
    "fee":$('#fee').val(),
    "hostel":$('#hostel').is(':checked')?'1':'0',
    "residential":$('#residential').is(':checked')?'1':'0',
    "schooling":$('#schooling').is(':checked')?'1':'0',
    "coaches_info":{"no_of_coach":$('#no_coaches').val(),"head_coach":$('#hcoach').val()},
    "image":base_url+'/uploads/property/'+$("#photo_url").val()
   };
  data = JSON.stringify(data);
   $.ajax({
      url: "<?php echo site_url('forms/update_property_info'); ?>",
      type: "POST",
      data:  data,
      
      beforeSend : function()
      {
        $("#err").fadeOut();
      },
     success: function(result)
      {
      var result = JSON.parse(result);
      result = result.status;
       if(result == '1')
         {
         $.confirm({
         title: 'Congratulations!',
         content: 'Property successfully updated',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/getPropListView";
                }
            },
            close: function () {
            window.location.href = url+"/forms/getPropListView";
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
    
    },
        error: function(e) 
        {
      
        }           
     });
  console.log(data);return;
  } 
});

  function validate()
        {
          n = 0;   
          if($('#pname').val() == '')
          {
             $("#pname_error").show();
             $("#pname_error").css("color","red");
             n++;
          }
          if($('#propaddress').val() == '')
          {
             $("#paddress_error").show();
             $("#paddress_error").css("color","red");
             n++;
          }
          if($('#proplocation').val() == '')
          {
             $("#plocation_error").show();
             $("#plocation_error").css("color","red");
             n++;
          }
          if($('#propemail').val() == '')
          {
             $("#pemail_error").show();
             $("#pemail_error").css("color","red");
             n++;
          }
          if($('#propphone').val() == '')
          {
             $("#pphone_error").show();
             $("#pphone_error").css("color","red");
             n++;
          } if($('#psport').val() == '')
          {
             $("#psport_error").show();
             $("#psport_error").css("color","red");
             n++;
          }
         if(n>0)
         {
          return false;
         }else
         {
          return true;
         }
        }
     }); 


</script>