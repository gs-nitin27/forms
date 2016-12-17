
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/ css" media="all" />

 <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
   
$('#save').click(function(){

var summary1=$("#rsummary").val();
var summary12=summary1.toString();
var string = summary12.replace(/[\/\\<>~{}]/g, '');

var description1=$("#rdescription").val();
var description2=description1.toString();
var description3 = description2.replace(/[\/\\<>~{}]/g, '');

var data1 = {


    "id"                      : $("#rid").val(), 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : description3, 
    "summary"                 : string,
    "location"                : $("#rlocation").val(), 
    "keyword"                 : "",
    "topic_of_artical"        : $("#rartical").val(), 
    "image"                   : $("#photo_url").val(),
    "status"                  : $("#status").val(),
     "token"                  : $("#token").val(),
    "sport"                   : $("#sport").val()
};
//alert(data1);
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveEditResources'); ?>',
    data: data,
    dataType: "json",
    success: function(result) {
     if(result.response == '1')
      {
        $( "#msgdiv" ).show();
         $( "#msg" ).html('Resource Updated');
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
      }else
      {
      $( "#msgdiv" ).show();
         $( "#msg" ).html('Resource not Updated');
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
      }
   
    window.location.href = url+"/forms/getResources";
    }


});

    
});});

</script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Edit Resources
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
    <?php if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    <div class=" alert alert-success" id="msgdiv" >
      <strong>Info! <span id = "msg"><?php echo $msg;?></span></strong> 
    </div>
    <?php }?>
<div class="col-md-12">
      <div class="box box-primary">
       
            <!-- /.box-header -->

       <?php  $Resources = $this->register->editresources($id); 
              foreach ($Resources as $value)      
              {?>
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
                  <input type="hidden" class="form-control" name="id" id="rid" value="<?php echo $value['id']; ?>">
                </div>

                  <div class="form-group">
                  <input type="hidden" class="form-control" name="status" id="status" value="0">
                   </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="rtitle" maxlength="50" id="rtitle" placeholder="Enter title" value="<?php echo $value['title']; ?>">
                </div>
        
        
        
        
        
        <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link" value="<?php echo $value['url']; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Summary</label>
                   <textarea class="form-control" maxlength="360" name="summary" id="rsummary" placeholder="Place some text here(Maximum 360 Characters)" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['summary']; ?></textarea>
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
                 $(document).ready(function() {
                 
                  if($('#token').val() == '1')
                {
                     $('#abc').show();
      
                }
                   if($('#token').val() == '0')
                 {
                  $('#abc').hide();
                 }
                    });
                    
                       </script>

                   <div class="form-group" id="abc">
                   <label for="exampleInputEmail1">Description</label>
                   <textarea class="form-control" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['description']; ?></textarea>
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter Location" value="<?php echo $value['location']; ?>">
                </div>

                <div class="form-group">
                     <label for="eventtype">Topic Of The Article</label>
                     <select id="rartical" class="form-control" >
                     <option value="<?php echo $value['topic_of_artical']; ?>"><?php echo $value['topic_of_artical']; ?></option> 
                     <option value ="Jobs">Jobs </option>
                     <option value ="Tournaments">Tournaments</option>
                      <option value="Event">Event</option> 
                     <option value ="News Aticle">News Aticle </option>
                     <option value ="Training And Knowledge">Training And Knowledge</option>
                      <option value ="other">Other</option>
                     </select>
                  </div >




                <div class="form-group">
                        <?php  $sports = $this->register->getSport();
                            
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option ><?php echo $value['sport']; ?></option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div>
              </div>
              <!-- /.box-body -->
            </form>
        <table>
        <tr>
        <td>
             <div>
                <img style="display:block; border:2px solid SteelBlue";  width="400px" height="300px" margin-left="20px" src = "<?php  echo base_url()."uploads/resources/".$value['image']; ?>">
             </div>
              

          </td>
          </tr>
          <tr style="margin-top:20px">
          <td >

           <form name="multiform" id="multiform" action="<?php echo site_url('forms/imageupload'); ?>" method="POST" enctype="multipart/form-data">
               Image : <input type="file" name="file" id="file" />

               <div class="form-group">
                  <input type="hidden" class="form-control" name="oldimage" id="pid" value="<?php echo $value['image']; ?>">
                </div>
               <div class="form-group">
                  <input type="hidden" class="form-control" name="oldimageid" id="pid" value="<?php echo $value['id']; ?>">
                </div>

        </form>
               <input  type="button" id="multi-post" value="Submit Image"></input>
               <input type="hidden" class="form-control" name="photo" id="photo_url" value="<?php echo $value['image']; ?>"> 

                <img src="<?php echo base_url("img/loader.gif");?>"  id="loader_img" hidden></img> 
                 <div id="mess" hidden>Image Uploded</div>

            </div>
             </td>
             </tr>
             </table>
       
          <?php } ?>
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
$(document).ready(function(){
 
$("#multiform").submit(function(e)
{
    $('#loader_img').show();
    var formObj = $(this);
    var formURL = formObj.attr("action");

if(window.FormData !== undefined)  
    {
        var formData = new FormData(this);
        $.ajax({
            url: formURL,
            type: 'POST',
            data:  formData,
             dataType: 'json',
            mimeType:"multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
               // alert(data.response);

                $('#loader_img').hide();
                $('#mess').show();
                $("#photo_url").val(data.response);   
            }
                  
       });
        e.preventDefault();
        e.unbind();
   }
});


$("#multi-post").click(function()
    {
    //sending form from here
    $("#multiform").submit();
});
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
