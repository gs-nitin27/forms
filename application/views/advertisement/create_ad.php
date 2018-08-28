<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
         <h1>Create Advertisement</h1>
    </section>

         <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
    <div class=" alert alert-success" id="msgdiv" style="display:none">
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
   <div class="nav-tabs-custom">
             <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab" id="1" >Basic Info</a></li>
              <li ><a href="#tab_info" data-toggle="tab" id="2" >Ad Image</a></li>
             </ul>   
             <form role="form" action="" class="register">  
             <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
         <div class="box-header with-border">
                <h4>Basic Info</h4 >   
        </div>
              <div class="box-body">
          <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control"  id="title" >
            <label id="terror" hidden>Title is required.</label>
          </div>
          <div class="form-group">
            <label for="submodule">Select App</label>
            <select class="form-control" id="apptype" name="apptype">
              <option value="1">Manage</option>
              <option value="2">Meri Football</option>
              <option value="3">Getsporty Lite</option>
              <option value="4">Assessment App</option>
            </select>
          </div>
          <div class="form-group">
            <label for="proplevel">Modules</label>
            <Select class="form-control"  id="module">
              <option>-Select-</option>
              <option value="1">Job</option>
              <option value="2">Event</option>
              <option value="3">Tournament</option>
              <option value="6">Resources</option>
            </Select>
            <label id="module_error" hidden>Module is required.</label>
          </div>
         
          <div class="form-group">
            <label for="submodule">Submodule</label>
            <input type="text" class="form-control"  id="submodule" >
          </div>

          <div class="form-group">
            <label for="usertype">Type of user</label>
            <Select class="form-control"  id="usertype">
              <option>-Select-</option>
              <option value="1">Athlete</option>
              <option value="2">Coach</option>
            </Select>
            <label id="pemail_error" hidden>User type is required.</label>
          </div>
          
          <div class="form-group">
            <label for="submodule">Date duration</label>
            From Date:<input type="date" class="form-control"  id="from_date" >
            To Date:<input type="date" class="form-control"  id="to_date" >
          </div>
          <div class="form-group">
            <label for="submodule">Time duration</label>
            <input type="time" class="form-control"  id="duration" >
          </div>
         </div>
        </div> </form>
         <div class="tab-pane" id="tab_info">
          <div class="box-header with-border">
                <h4>Add Advertisement Image</h4>  
          </div>
           <form id="form1"  method="post" enctype="multipart/form-data">
               <!--  Image : <input type="file" name="file" id="file" /> -->
   <div class="container">
    <div class="row">    
        <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left;margin-left: 0%;">  
            <!-- image-preview-filename input [CUT FROM HERE]-->
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled" id="image_name"> <!-- don't give a name === doesn't send on POST/GET -->
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
            </div><div id="mess" hidden>Image Uploded</div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>
</div>
                <div class="form-group">
                <input type="hidden" class="form-control" name="oldimageid" id="pid" value="0">
                <input type="hidden" class="form-control" name="path"   id="path" value="uploads/advertisment/">
                <input type="hidden" class="form-control" name="height" id="height" value="640">
                <input type="hidden" class="form-control" name="width"  id="width" value="1115">
                </div>
               <!--  <input id="button" type="submit" value="Upload"> -->
            </form>
         </div>
        </div>
     
  
      <input type="hidden" class="form-control" name="photo" id="photo_url"> 
                <div class="box-body">
  
        <div class="box-footer">
              <input type="button" class="btn btn-lg btn-primary" id="save" value="Save Advertisement" name="Create">
        </div>
        </div>

<script type="text/javascript">
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
var data;
var url = '<?php echo site_url();?>';
var base_url = '<?php echo base_url();?>';
$(document).ready(function(){
$('#save').click(function(){
var ad_data = {
  "module": $('#module').val(),
  "submodule":$('#submodule').val(),
  "usertype":$('#usertype :selected').text(),
  "prof_id":$('#usertype').val()
};
data = {
"title":$('#title').val(),
"module":ad_data,//$('#module').val(),
"submodule":$('#submodule').val(),
"start_date":$('#from_date').val(),
"end_date":$('#to_date').val(),
"duration":$('#duration').val(),
"usertype":$('#usertype').val(),
"app_type":$('#apptype').val(),
"image":base_url+'/uploads/advertisment/'+$('#photo_url').val()
};
console.log(JSON.stringify(data));
$.ajax({
  url:"<?php echo site_url('forms/create_advertisement'); ?>",
  type:"POST",
  data:JSON.stringify(data),
      
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
         content: 'Property successfully added',
         type: 'green',
         typeAnimated: true,
         buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/load_ad_list_view";
                }
            },
            close: function () {
            window.location.href = url+"/forms/load_ad_list_view";
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

});
});






});

</script>