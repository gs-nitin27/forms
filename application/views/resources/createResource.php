
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/ css" media="all" />
<script>
function save()
{
$('#imagelodar').show();
var summary1=$("#rsummary").val();

var summary12=summary1.toString();
var string = summary12.replace(/[\/\\'\.\"<>~{}]/g, '');

var description1=$("#rdescription").val();
var description2=description1.toString();
var description3 = description2.replace(/[\/\\<>~\{}]/g, '');
	
var data1 = {
    "id"                      : 0, 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : description3, 
    "summary"                 : string,
    "keyword"                 : "",
    "status"                  : 0,
    "location"                : $("#rlocation").val(), 
    "topic_of_artical"        : $("#article").val(), 
    "image"                   : $("#photo_url").val(),
    "date_created"            : $("#date_created").val(),
	  "token"                   : $("#token").val(),
    "sport"                   : $("#sport").val()
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/SavecreateResources'); ?>',
    data: data,
    dataType: "json",
    success: function(result) {
      $('#imagelodar').hide();
    if(result.response == '1')
      {
         $( "#msgdiv" ).show();
         $( "#msg" ).html("Resource created");
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
          window.location.href = url+"/forms/getResources";
       
      }else
      {
       $( "#msgdiv" ).show();
         $( "#msg" ).html('Resource not created');
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
      }      

  
 
    }
});  

}
</script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
    Create  Resources  
      </h1>
     
    </section>
         <section class="content"> 

         <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
    <?php if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    
    <?php }?>
<div class="col-md-12">
<div class=" alert alert-success" id="msgdiv" style="display:none" >
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
      <div class="box box-primary">
       
            <!-- /.box-header -->
    


        
            <form id="myform">
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
                  <input type="hidden" class="form-control" name="token" id="token" value="1">
                </div>

            <script>
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
            </script>
             <div class="form-group">
            
                      <label for="exampleInputEmail1">Resource Type</label>
                     <select  id="types" class="form-control" >
                     <option >-Select-</option> 
                     <option value="text">Text</option>
                     <option value="video">Video</option>
                     </select>
              </div >

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
                
                

           <div class="form-group" id="abc">
           <label for="exampleInputEmail1">Description</label>
                   <textarea class="form-control" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter Location">
                <label id="location_error" hidden="">A location is required</label>
                </div>
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
                <option ></option> 
                <?php if(!empty($sports)){
                        foreach($sports as $sport){?>
                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                <?php   }
                           } 
                         ?>
                </select>
                </div>
                </form>
            <form id="form" action="" method="post" enctype="multipart/form-data">
            <div class="container">
            <div class="row">    
            <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left;margin-left: -1%;">  
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
            <input type="file" accept="image/png, image/jpeg, image/gif" name="file"/>
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
           <!--  <img src="<?php// echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img>  -->
            <input type="hidden" class="form-control" name="photo" id="photo_url"> 
            <div id="mess" hidden>Image Uploded</div>
            <div class="box-footer">
            <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Create">
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>

</div>
<script type="text/javascript">
  $(document).ready(function (e) {
  $("#form").on('submit',(function(e) {
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
  }));
});

</script>
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