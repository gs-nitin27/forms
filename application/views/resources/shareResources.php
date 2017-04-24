
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui.css'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url('assets/ui.theme.css'); ?>" type="text/ css" media="all" />

 <script>
//document.domain = "getsporty.in";

function save()
{	

$('#imagelodar').show();
var summary1=$("#rsummary").val();
//var summary12=summary1.toString();
//var string = summary12.replace(/[&\/\\#,+$~%.:*?{}]/g, '');
summary1 = summary1.toString();
var data1 = {

    "id"                      : 0, 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : "", 
    "summary"                 : summary1,
    "keyword"                 : "",
    "status"                  : 0,
    "location"                : $("#rlocation").val(), 
    "topic_of_artical"        : $("#article").val(), 
    "image"                   : $("#photo_url").val(),
    "date_created"            : $("#date_created").val(),
    "token"                   : $("#token").val(),
    "sport"                   : $("#sport").val()
};
//alert(data1);
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var jsondata = eval(data1);
//jsondata = JSON.stringify(jsondata);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/SaveshareResources'); ?>',
    data: jsondata,
    dataType: "json",
    success: function(result) {
      // $('#imagelodar').hide();
      if(result.response == '1')
      {
        $.confirm({
        animationSpeed: 1500,
        animationBounce: 3,
        title: 'Congratulations!',
        content: 'Resource is created.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  window.location.href = url+"/forms/getresources?resources";
                }
            },
            close: function () {
              window.location.href = url+"/forms/getresources?resources";
            }
        }
    });
      }else
      {
        $('#imagelodar').hide();
          $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              animationSpeed: 1500,
              animationBounce: 3,
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
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Share Resources
      </h1>
    </section>
         <section class="content"> 
         <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
         <div class="row">
         <?php if(isset($msg) && $msg != ""){?>
         <div class="col-md-12">
         <!--  <div class=" alert alert-success" id="msgdiv" >
         <strong>Info! <span id = "msg"><?//php echo $msg;?></span></strong> 
         </div> -->
         <?php }?>
         <div class="col-md-12">
         <div class=" alert alert-success" id="msgdiv" style="display:none" >
         <strong>Info! <span id = "msg"></span></strong> 
         </div>
         <div class="box box-primary">
         <!-- /.box-header -->
         <form>
         <div class="box-body">
         <?php
          $data=$this->session->userdata('item');
          $name=$data['userid'];
         {  ?>
          <div class="form-group">
          <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $name;?>">
          </div>
         <?php }?>

            <div class="form-group">
            <input type="hidden" class="form-control" name="token" id="token" value="0">
            </div>
        <!--     <script>
            $(document).ready(function() {
            $('#types').change(function(){
            if($('#types').val() == 'video')
           {
            $('#abc').hide();     
            }
            if($('#types').val() == 'text')
            {
             $('#abc').show();
            }
            });
            });
            </script> -->
            <!--  <div class="form-group">
            
                     <label for="exampleInputEmail1">Resource Type</label>
                     <select  id="types" class="form-control" >
                     <option >-Select-</option> 
                     <option value="text">Text</option>
                     <option value="video">Video</option>
                     </select>
              </div > -->

               <?php
              
                date_default_timezone_set("Asia/Kolkata");
              {
              ?>
                <div class="form-group">
                <input type="hidden" class="form-control" name="date_created" id="date_created" value= "<?php  echo date("Y-m-d h:i:sa");?>">
                </div>
                <?php
                  }?>
                <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control" maxlength="50" name="rtitle" id="rtitle" placeholder="Enter title">
               <label id="title_error" hidden="">A title is required</label>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Link</label>
                <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
                <label id="url_error" hidden="">A valid url is required</label>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Summary</label>
                <textarea class="form-control" maxlength="360" name="summary" id="rsummary" placeholder="Place some text here(Maximum 360 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
               <label id="summary_error" hidden="">A summary is required</label>
                </div>
                <div id="rem"></div>
                <script>
                  document.getElementById('rsummary').onkeyup = function () {
                  document.getElementById('rem').innerHTML = "Characters left: " + (360 - this.value.length);
                      };
                </script>
                

           <!-- <div class="form-group" id="abc">
           <label for="exampleInputEmail1">Description</label>
                   <textarea class="textarea" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div> -->


                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter Location">
                <label id="location_error" hidden="">A location is required</label>
                </div>
<!-- 
              <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                   
                  <div>
                   <select id="location" name="location" style="width:700px;"><?php //echo $value['location']; ?>
                   </select>
                      </div>
                   </div> -->
               <!--  <div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                  <input type="text" class="form-control" name="keyword" id="rkeyword" placeholder="Enter title" value="<?php //echo $value['keyword']; ?>">
                </div> -->



                <div class="form-group">
                     <label for="eventtype">Topic Of The Article</label>
                     <select id="article" class="form-control" name="topic_of_artical">
                     <option value="">- Select -</option> 
                     <option value ="Jobs">Jobs </option>
                     <option value ="Tournaments">Tournaments</option>
                     <option value="Event">Event</option> 
                     <option value ="news_aticle">News & article</option>
                     <option value ="t&k">Training & Knowledge</option>
                     <option value ="other">Other</option>
                     </select>
                     <label id="article_error" hidden="">Article type is required</label>
                  </div>
                  <div class="form-group">
                        <?php  $sports = $this->register->getSport();?>
                      <label for="sports">Sport</label>
                      <select id="sport" class="form-control" name="sport">
                      <option >-select-</option> 
                      <?php if(!empty($sports)){
                         foreach($sports as $sport){?>
                      <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                      </select>
                      </div>



         <!--  <div class="container">
        <div class="content">
        
            

         
         
            <span class="upload_btn" onclick="show_popup('popup_upload')">Click to upload photo</span>
            <div id="photo_container">
            </div>
             
        </div>   
    </div> -->

       <!--  <div id="popup_crop">
        <div class="form_crop">
            <span class="close" onclick="close_popup('popup_crop')">x</span>
            <h2>Crop photo</h2>
            This is the image we're attaching the crop to -->
           <!--  <img id="cropbox" />   -->
            <!-- This is the form that our event handler fills -->
           
              <!--   <input type="hidden" id="x" />
                <input type="hidden" id="y"/>
                <input type="hidden" id="w"/>
                <input type="hidden" id="h"/>
                <input type="hidden" id="photo_url"  name="image"/>
                <input type="button" value="Crop Image" id="crop_btn" onclick="crop_photo()"/>
            
        </div>
    </div> --> 
             <!--    <div id="message"></div> -->
          <!-- <script>
            document.getElementById('crop_btn').onfocus = function () {
              var d=$('#crop_btn').val();
              if(d!="")
              {
            document.getElementById('message').innerHTML = "Image Successfully Uploaded";
               }
                };
            </script> -->
              </div>
              <!-- /.box-body -->
           
             
        </form>
        <form id="form" action="" method="post" enctype="multipart/form-data">

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
                        <input type="file" accept="image/png, image/jpeg, image/gif" id="Nimage" name="file"/>
                        
                         <!-- rename it -->
                    </div>
                     <input id="button" type="submit" class="btn btn-danger" value="Upload Image" name="submit">
                </span>
            </div><!-- /input-group image-preview [TO HERE]--> 
        </div>
    </div>
</div>
       <!--  Image : <input type="file" name="file" id="file" /> -->
        <div class="form-group">
        <input type="hidden" class="form-control" name="oldimageid" id="pid" value="0">
        <input type="hidden" class="form-control" name="path"   id="path" value="uploads/resources/">
        <input type="hidden" class="form-control" name="height" id="height" value="640">
        <input type="hidden" class="form-control" name="width"  id="width" value="1115">
        </div>
       <!--  <input id="button" type="submit" value="Upload"> -->
        </form>
        <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img>
        <input type="hidden" class="form-control" name="photo" id="photo_url"> 
        <div id="mess" hidden>Image Uploded</div>
        <div id="mess1" style="color:red;" hidden>Please Select the Image.</div>
        <div class="box-footer">
        <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Create">
        </div>

 <!-- <script>
                
              $('#save').click(function(){
                if($('#photo_url').val() =="")
                         {
                        if(!confirm("Do you want to continue without uploading the photo"))
                                          {
                                            return false;
                                          }
                     
                       }

});
</script> -->



   <!--  <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload photo</h2>
            <form action="<?php //echo base_url('assets/crop/upload_photo.php')?>" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()">
                <input type="file" name="photo" id="photo" class="file_input">
                <div id="loading_progress"></div>
                <input type="submit" value="Upload photo" id="upload_btn">
            </form>
            <iframe name="upload_frame" class="upload_frame"></iframe>
        </div>
    </div> -->
</div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript">
    $(document).ready(function (e) {
    $("#form").on('submit',(function(e) {
   if($("#Nimage").val()){
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
               // $('#loader_img').hide();
               $('#imagelodar').hide();
                $('#mess').show();
                $('#mess1').hide();
                $("#photo_url").val(data);   
        },
        error: function(e) 
        {
      
        }           
     });
    }
       else{
                $('#mess').hide();
                $('#mess1').show();
                return false;
        
       }

  }));
});

</script>

<!-- <script >
var TARGET_W = 1112;
var TARGET_H = 640;

// show loader while uploading photo
function submit_photo() {
  // display the loading texte
  $('#loading_progress').html('<img src="<?php //echo base_url('/assets/crop/images/loader.gif')?>"> Uploading your photo...');
}

// show_popup : show the popup
function show_popup(id) {
  // show the popup
  $('#'+id).show();
}

// close_popup : close the popup
function close_popup(id) {
  // hide the popup
  $('#'+id).hide();
}

// show_popup_crop : show the crop popup
function show_popup_crop(url) {
   //  alert(url);

     var purl="<?php //echo base_url('/assets/crop/');?>";
  // change the photo source
  $('#cropbox').attr('src',purl+'/'+url);
  //alert(purl+'/'+url);
  // change the photo source
  //$('#cropbox').attr('src', url);
  // destroy the Jcrop object to create a new one
  //alert(url);

  try {
    jcrop_api.destroy();
  } catch (e) {
    // object not defined
  }
  // Initialize the Jcrop using the TARGET_W and TARGET_H that initialized before
    $('#cropbox').Jcrop({
      aspectRatio: TARGET_W / TARGET_H,
      setSelect:   [ 100, 100, TARGET_W, TARGET_H ],
      onSelect: updateCoords
    },function(){
        jcrop_api = this;
    });

    // store the current uploaded photo url in a hidden input to use it later
 $('#photo_url').val(url);

  // hide and reset the upload popup
  $('#popup_upload').hide();
  $('#loading_progress').html('');
  $('#photo').val('');

  // show the crop popup
  $('#popup_crop').show();
}

// crop_photo : 
function crop_photo() {
  var x_ = $('#x').val();
  var y_ = $('#y').val();
  var w_ = $('#w').val();
  var h_ = $('#h').val();
  var photo_url_ = $('#photo_url').val();
 
  // hide thecrop  popup
  $('#popup_crop').hide();

  // display the loading texte
  $('#photo_container').html('<img src="<?php// echo base_url('/assets/crop/images/loader.gif')?>"> Processing...');
  // crop photo with a php file using ajax call
  $.ajax({
   url: "<?php //echo base_url('/assets/crop/crop_photo.php')?>",
    type: 'POST',
    data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
    success:function(data){

       // var purl="<?php //echo base_url('/assets/crop/');?>";
       // var value=purl+'/'+data;
      // display the croped photo
      $('#photo_container').html(data);
    }
  });
}


// updateCoords : updates hidden input values after every crop selection
function updateCoords(c) {
  $('#x').val(c.x);
  $('#y').val(c.y);
  $('#w').val(c.w);
  $('#h').val(c.h);
}
</script> -->
 <style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
            .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/
  
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
  
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
            }
        </style>
          
        <script type="text/javascript">
        $(this).ready( function() {
            $("#rlocation").autocomplete({
                minLength: 1,

                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo site_url('forms/getCityName'); ?>",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                            else
                            {
                              alert("Choose Currect City Name");
                              $("#rlocation").val("");
                            }
                        },
                    });
                }
                
            });
        });
        </script>


<style>
  .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
  </style>
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

     $('#save').click(function()
      {
        var title = $('#rtitle').val();
        if(title == "")
        {
          $("#title_error").show();
          $("#title_error").css('color', 'red');
        }
        else{
          $("#title_error").hide(); 
        }
      
      
        var url = $('#rurl').val();
        if(url == "")
        {
          $("#url_error").show();
          $("#url_error").css('color', 'red');
        }
        else{
          $("#url_error").hide(); 
        }
        var summary = $('#rsummary').val();
        if(summary == "")
        {
          $("#summary_error").show();
          $("#summary_error").css('color', 'red');
        }
        else{
          $("#summary_error").hide(); 
        }
        var location = $('#rlocation').val();
        if(location == "")
        {
          $("#location_error").show();
          $("#location_error").css('color', 'red');
        }
        else{
          $("#location_error").hide(); 
        }
        var article = $('#article').val();
        if(article == "")
        {
          $("#article_error").show();
          $("#article_error").css('color', 'red');
        }
        else{
          $("#article_error").hide(); 
        }
       if(title!="" && url!="" && article!="" && location!="" &&summary!=""){
          save();
        }
    });
  </script>
