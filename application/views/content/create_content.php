  <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
 
clear();
   
$('#save').click(function(){

var data12 = {


    "id"                      : "", 
    "title"                   : $("#ctitle").val(),
    "url"                     : $("#curl").val(), 
    "content"                 : $("#ccontent").val(), 
    //"date_created"             : $("#cdate").val(),
    //"date_updated"             : $("#udate").val()

};

console.log(JSON.stringify(data12));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data12);
  $.ajax({

    type: "POST",

    url: '<?php echo site_url('forms/saveContent'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
   window.location.href = url+"/forms/getContent";
    }


});

    
});});

function clear()
{

    $("#ctitle").val('');
    $("#curl").val('');
    $("#ccontent").val(''); 
    //$("#cdate").val('');
   // $("#udate").val(''); 
}

</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Content
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  <div class="col-md-6">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

			<div class="nav-tabs-custom">

    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
    </head>
        <form>
            <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="ctitle" placeholder="Enter Title">
                </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="url" id="curl" placeholder="Enter Link">
                </div>
           <!--  <label>Description</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80" >
                This is my textarea to be replaced with CKEditor.
            </textarea> -->
            <div class="form-group">
                     <label for="exampleInputEmail1">Content</label>
                    <textarea class="textarea" name="content" id="ccontent" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                   </div>
          <!--  <div class="form-group">
            <label for="link">Create Date</label>
            <input type="text" class="form-control"  id="cdate" placeholder="Enter Create Date">
          </div >
          <div class="form-group">
            <label for="link">Update Date</label>
            <input type="text" class="form-control"  id="udate" placeholder="Enter Update Date">
          </div > -->


            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>

            <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Content" name="Create">
              </div>
        </form>


			
          </div>
	  </div>
</section>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
<script type="text/javascript">
  
  $(function() {
    $( "#cdate" ).datepicker();
    $( "#udate" ).datepicker();  
  });

</script>