
   
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Create Resources
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  <?php if(isset($msg) && $msg != ""){?>
		<div class="col-md-8">
		<div class=" alert alert-success" id="msgdiv" >
			<strong>Info! <span id = "msg"><?php echo $msg;?></span></strong> 
		</div>
		<?php }?>
<div class="col-md-8">
			<div class="box box-primary">
       
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" enctype='multipart/form-data' id="form_resource"  action="<?php echo site_url('forms/createresources'); ?>" 	method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Link">
                </div>
                <div class="form-group">
				 <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
				 <div class="form-group">
				  <label for="exampleInputEmail1">Content</label>
                   <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                <div class="form-group">
                  <!-- <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file" accept="image/*">

                  <p class="help-block">Upload image file only.</p> -->

       
             <!-- 
                <span class="upload_btn" onclick="show_popup('popup_upload')">Upload photo</span>
               <div id="photo_container">
              </div> -->
        <!-- content -->    




                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input id="sub" type="submit" class="btn btn-primary" value="Submit"/>
              </div>

</form>
 <!-- The popup for upload new photo -->
  

<link rel="stylesheet" href="<?php echo base_url('/assets/crop/css/style.css')?>" />
<link rel="stylesheet" href="<?php echo base_url('/assets/crop/css/jquery.Jcrop.min.css')?>" />
<!-- <script type="text/javascript" src="<?php// echo base_url('/assets/crop/js/jquery.min.js')?>"></script> -->
<script src="<?php echo base_url('/assets/crop/js/jquery.Jcrop.min.js')?>"></script>
<!-- <script type="text/javascript" src="<?php// echo base_url('/assets/crop/js/script.js')?>"></script> -->

<div class="container">
        <div class="content">
            <span class="upload_btn" onclick="show_popup('popup_upload')">Click to upload photo</span>
            <div id="photo_container">

            </div>
        </div><!-- content -->    
       
    </div><!-- container -->

    <!-- The popup for upload new photo -->
    <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload photo</h2>
            <form action="<?php echo base_url("/assets/crop/upload_photo.php");?>" method="post" enctype="multipart/form-data" target="upload_frame" onsubmit="submit_photo()">
                <input type="file" name="photo" id="photo" class="file_input">
                <div id="loading_progress"></div>
                <input type="submit" value="Upload photo" id="upload_btn">
            </form>
            <iframe name="upload_frame" class="upload_frame"></iframe>
        </div>
    </div>


    <!-- The popup for crop the uploaded photo -->
    <div id="popup_crop">
        <div class="form_crop">
            <span class="close" onclick="close_popup('popup_crop')">x</span>
            <h2>Crop photo</h2>
            <!-- This is the image we're attaching the crop to -->
            <img id="cropbox" />
            
            <!-- This is the form that our event handler fills -->
            <form>
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" id="photo_url" name="photo_url" />
                <input type="button" value="Crop Image" id="crop_btn" onclick="crop_photo()" />
            </form>
        </div>
    </div>
            
          </div>




	  </div>
	  
</div>
</div>
</section>
</div>
<!-- ==============image upload =============== -->

<script>

var TARGET_W = 300;
var TARGET_H = 300;

// show loader while uploading photo
function submit_photo() {
  // display the loading texte
  $('#loading_progress').html('<img src="<?php echo base_url('/assets/crop/images/loader.gif')?>"> Uploading your photo...');
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
   alert(url);
  // change the photo source
  $('#cropbox').attr('src', url);
  // destroy the Jcrop object to create a new one
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
  $('#photo_container').html('<img src="<?php echo base_url('/assets/crop/images/loader.gif')?>"> Processing...');
  // crop photo with a php file using ajax call
  $.ajax({
   url: "<?php echo base_url('/assets/crop/crop_photo.php')?>",
    type: 'POST',
    data: {x:x_, y:y_, w:w_, h:h_, photo_url:photo_url_, targ_w:TARGET_W, targ_h:TARGET_H},
    success:function(data){
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
</script>