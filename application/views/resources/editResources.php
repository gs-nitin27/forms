 
<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui.css'); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url('assets/ui.theme.css'); ?>" type="text/ css" media="all" />
<script src="<?php echo base_url('assets/ckeditor/ckeditor.js'); ?>" >
</script>

 <script>

function save()
{ 
$('#imagelodar').show();
var summary1=$("#rsummary").val();
var summary12=summary1.toString();
var string = summary12.replace(/[\/\\<>~{}]/g, '');
var description      = editor.getData();
var url = ''
if($('#token').val() == 2)
{
url = get_Id($('#rurl').val());
}
else if($('#token').val() == 0)
{
url =  $('#rurl').val();
}
else
{
  url = '';
}
var data1 = {
    "id"                      : $("#rid").val(), 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : url,
    "description"             : description, 
    "summary"                 : string,
    "location"                : $("#rlocation").val(), 
    "keyword"                 : "",
    "topic_of_artical"        : $("#rartical").val(), 
    "image"                   : $("#photo_url").val(),
    "status"                  : $("#status").val(),
     "token"                  : $("#token").val(),
    "sport"                   : $("#sport").val().toString()
};
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveEditResources'); ?>',
    data: data,
    dataType: "json",
    success: function(result) {
      // $('#imagelodar').hide();
     if(result.response == '1')
      {
         //alert(result.response);
        $.confirm({
        animationSpeed: 1000,
        animationBounce: 3,
        title: 'Congratulations!',
        content: 'Resource is Updated.',
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
     Edit Resources
        
      </h1>
     
    </section>
         <section class="content"> 
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
    <?php  if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    <!-- <div class=" alert alert-success" id="msgdiv" >
      <strong>Info! <span id = "msg"><?php// echo $msg;?></span></strong> 
    </div> -->
    <?php }?>
<div class="col-md-12">
<div class=" alert alert-success" id="msgdiv" style="display:none" >
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
      <div class="box box-primary">
       
            <!-- /.box-header -->

       <?php  $Resources = $this->register->editresources($id); 
              foreach ($Resources as $value)      
              {?>
            <form>
              <div class="box-body">
            <?php
          $data=$this->session->userdata('item');
          if($data['userType'] == 101 || $data['userType'] == 102)
          {
               $name=$data['adminid'];
          }else
          {
          $name=$data['userid'];
          }
        {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $name;?>">
            </div>
        <?php }?>
              <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="rid" value="<?php echo $value['id']; ?>">
                </div>
                  <div class="form-group">
                  <input type="hidden" class="form-control" name="status" id="status" value="0">
                   </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="rtitle" maxlength="50" id="rtitle" placeholder="Enter title" value="<?php echo $value['title']; ?>">
                  <label id="title_error" hidden="">A title is required</label>
                </div>
                <div class="form-group">
                  
                  <?php if($value['token'] == 2){ ?>
                  <label for="exampleInputEmail1">Link</label>
                  <!-- <div  class="modal fade" id="myModal" role="dialog"> -->
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link" value="<?php echo 'https://www.youtube.com/watch?v='.$value['video_link']; ?>" onfocus="edit_video(this.id)"><!-- </div> -->
                  <label id="url_error" hidden="">A valid url is required</label>
                   <?php }else if($value['token'] == 0){ ?>
                  <label for="exampleInputEmail1">Link</label> 
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link" value="<?php echo $value['url']; ?>">
                  <label id="url_error" hidden="">A valid url is required</label>
                  <?php } ?>
                </div>
                <script type="text/javascript">
                 var get_sport = [];
               function loadData()
               { 
                  var sport_value =  $("#sport").val();
                  var splt_sport =   sport_value.split(",");  
                  for(var i = 0; i<splt_sport.length ; i++)
                  {
                    $("input[value='"+splt_sport[i]+"']").prop('checked', true);  
                    get_sport.push(splt_sport[i]);
                  } 
                }
                
                $(function() {
               $('.multiselect-ui').multiselect({
                      includeSelectAllOption: true
                    });
                  });
                  </script>
              <div class="form-group">
              <div class="col-md-4">
              <div class="form-group">
              <label class="exampleInputEmail1" for="rolename">Sports</label>
              <select id="dates-field2" class="multiselect-ui form-control" multiple="multiple" onchange="getSports(this.id)">
               <?php  $sports = $this->register->getSport();?>
               <?php if(!empty($sports)){
                        foreach($sports as $sport){?>
              <option id="<?php echo $sport['sports'];?>" name="<?php echo $sport['sports'];?>" value ="<?php echo $sport['sports'];?>" ><?php echo $sport['sports'];?></option>
                  <?php   }
                           } 
                         ?>
        </select>
        </div>
     </div>
   <input type="text" id="sport" class="form-control" name="sport" value="<?php echo $value['sport']; ?>" disabled="">
    </div>
          <div class="form-group">
          <label for="exampleInputEmail1">Summary</label>
          <textarea class="form-control" maxlength="360" name="summary" id="rsummary" placeholder="Place some text here(Maximum 360 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['summary']; ?></textarea>
          <label id="summary_error" hidden="">A summary is required</label>
          </div>
          <div id="rem"></div>
          <script>
            document.getElementById('rsummary').onkeyup = function () {
            document.getElementById('rem').innerHTML = "Characters left: " + (360 - this.value.length);
                };
          </script>
             <div class="form-group">
                  <input type="hidden" class="form-control" id="token" value="<?php echo $value['token']; ?>">
                </div>
                   <script>
                 $(document).ready(function() 
                 {

                   window.onload = loadData();


                  if($('#token').val() == '1')
                  {
                     $('#abc').show();
                  }
                  else
                  {
                   $('#abc').hide();
                  }
                  });
                  </script>
                   <div class="form-group" id="abc">
                   <label for="exampleInputEmail1">Description</label>

                   <textarea class="ckeditor" maxlength="36" name="summary" id="rdescription" placeholder="Place some text here(Maximum 360 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['description']; ?></textarea>
             <script>
                var editor=CKEDITOR.replace('rdescription');
              </script>
                <label id="description_error" hidden="">A Description is required</label>
              </div>



                    </div>

                <!--  </div>  -->


                <div class="form-group">
               
                  <label for="rlocation">&nbsp;&nbsp;Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter Location" value="<?php echo $value['location']; ?>">
                 <label id="location_error" hidden="">A location is required</label>
                </div>

                 <div class="form-group">
                     <label for="eventtype">&nbsp;&nbsp;Topic Of The Article</label>
                     <select id="rartical" class="form-control" >
                     <option value="<?php echo $value['topic_of_artical']; ?>"><?php echo $value['topic_of_artical']; ?></option> 

                     <option value ="Jobs">Jobs </option>
                     <option value ="Tournaments">Tournaments</option>
                     <option value="Event">Events</option> 
                     <option value ="news_aticle">News & Articles</option>
                     <option value ="t&k">Training & Knowledge</option>
                     <option value ="other">Others</option>

                     </select>
                  <label id="article_error" hidden="">Article type is required</label>

                 </div >

               <!--  <div class="form-group">
                        <?php // $sports = $this->register->getSport();
                            
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option ><?php// echo $value['sport']; ?></option> 
                            <?php// if(!empty($sports)){
                                  //  foreach($sports as $sport){?>
                                <option value ="<?php// echo $sport['sports'];?>"><?php// echo $sport['sports'];?> </option>
                            <?php  // }
                               //   } 
                            ?>
                        </select>
                    </div> -->
              </div>
              <!-- /.box-body -->
            </form>
        <table>
        <tr>
        <td>
             <?php if($value['image']) { ?>

            <!-- <div class="form-group" align="left" >  -->

                <img style="display:block; border:2px solid SteelBlue";  width="400px" height="300px" src = "<?php  echo base_url()."uploads/resources/".$value['image']; ?>">
            <!-- </div>  -->

              <?php } else { ?>

             <!--  <div class="form-group">

                 -->
             <img style="display:block; border:2px solid SteelBlue";  width="200px" height="300px" align="center" src = "<?php  echo base_url('img/no-image.jpg'); ?>">
             <?php } ?>

             <!-- </div>  -->

          </td>
          </tr>
          <tr style="margin-top:20px">
          <td>
            <form id="form" action="" method="post" enctype="multipart/form-data">

            <div class="container">
    <div class="row">    
        <div class="col-xs-6 col-md-4 col-md-offset-2 col-sm-6 col-sm-offset-2" style="float: left; margin-left: 1%;">  
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
                        <input type="file" accept="image/png, image/jpeg, image/gif" name="file" id="file" />
                        
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
               <input type="hidden" class="form-control" name="path"   id="path" value="uploads/resources/">
              <input type="hidden" class="form-control" name="height" id="height" value="640">
              <input type="hidden" class="form-control" name="width"  id="width" value="1115">
               <input type="hidden" class="form-control" name="file_name"  id="file_name">
                  <input type="hidden" class="form-control" name="oldimage" id="pid" value="<?php echo $value['image']; ?>">
                </div>
               <div class="form-group">
                  <input type="hidden" class="form-control" name="oldimageid" id="pid" value="<?php echo $value['id']; ?>">
                </div>
               <!--  <input id="button" type="submit" value="Upload"> -->
               </form>


                
               <input type="hidden" class="form-control" name="photo" id="photo_url" value="<?php echo $value['image']; ?>"> 

                <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img> 
                 <div id="mess" hidden>Image Uploded</div>

            </div>
             </td>
             </tr>
             </table>
       
          <?php } ?>
           <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" value="Submit" name="Create">
              </div>


  
          </div>
    </div>
    
</div>
</div>
</section>

</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">


         <div class="form-group">Enter a YouTube URL:
         <input id="myUrl" class="form-control" type="text"/>
         </div>
         <div class="form-group">
         <button type="button" class="btn btn-default" id="myBtn" onclick='mybtn()';>Upload</button>
         </div>

       
          <div> YouTube ID: <span id="myId"></span>
          </div>
          <div><input type="hidden" name=""  id="myId1" value=""></div>

         <div>Embed code: <pre id="myCode"></pre></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
  $(document).ready(function (e) {

  $("#form").on('submit',(function(e) {
   var file_name = $('#rtitle').val();
   $('#file_name').val(file_name);
   if($('#file').val())
   {
  $('#imagelodar').show();
   // $('#loader_img').show();
    e.preventDefault();
    $.ajax({
      url: "<?php echo site_url('forms/imageupload');?>",
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
              //  alert(data);
                // $('#loader_img').hide();
                $('#imagelodar').hide();
                $('#mess').show();
              //  $("#photo_url").val("");
                $("#photo_url").val(data);   
        },
        error: function(e) 
        {
      
        }           
     });
       }
       else
       {
           alert("please upload the image file");
           return false ;
       }

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

<script type="text/javascript">
$(function() {
    $('.multiselect-ui').multiselect({
        includeSelectAllOption: true
    });
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
            
      if($('#token').val() == 1)
      {
       var description      =  editor.getData();
       if(description == "")
        {
          $("#description_error").show();
          $("#description_error").css('color', 'red');
        }
        else
        {
          $("#description_error").hide(); 
        }
      }
        var summary = $('#rsummary').val();
        if(summary == "")
        {
          $("#summary_error").show();
          $("#summary_error").css('color', 'red');
        }
        else
        {
          $("#summary_error").hide(); 
        }

        var article = $('#rartical').val();
        if(article == "")
        {
          $("#article_error").show();
          $("#article_error").css('color', 'red');
        }
        else{
          $("#article_error").hide(); 
        }
       if(title!="" &&  article!="" && location!="" &&summary!="" /*&& description!=""*/){
          save();
        }
    });


     edit_video = function(id)
     {
      $('#myModal').modal('show'); 
    var url = $('#'+id).val();
      $("#myUrl").val(url);
      mybtn();
     }

   function mybtn()
   {
    var myId;
    var myUrl = $('#myUrl').val();
    if(myUrl)
    {
    myId = get_Id(myUrl);

    $('#myId').html(myId);
    $('#myCode').html('<iframe width="560" height="315" src="//www.youtube.com/embed/' + myId + '" frameborder="0" allowfullscreen></iframe>');
    }
    else
    {
      alert("Please Give YouTube URL");
    }
  }

function get_Id(url) {
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
    var match = url.match(regExp);

    if (match && match[2].length == 11) {
        $('#rurl').val(url);
        return match[2];
    } else {
        return 'error';
    }
}

function getSports(id)
{
 var list_select = $('#dates-field2').val().concat(get_sport);
 var list =  list_select.join(',')
 $('#sport').val(list.replace(/,\s*$/, ""));
} 
  </script>


