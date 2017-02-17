  <script>
//document.domain = "getsporty.in";
function save()
{
  $("#imagelodar").show();
var data12 = {

    
    "id"                      : "", 
    "userid"                  : $("#userid").val(),
    "title"                   : $("#ctitle").val(),
    "url"                     : $("#curl").val(), 
    "content"                 : $("#ccontent").val(), 
    "publish"                 : 0 
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
      $("#imagelodar").hide();
    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
   window.location.href = url+"/forms/getContent";
    }
});
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
         <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
	  <div  class="col-md-12">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

			<div class="nav-tabs-custom">

    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
    </head>
        <form>
         <?php
          $data=$this->session->userdata('item');
          $userid=$data['userid'];
          {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
            </div>
          <?php }?>
            <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="ctitle" placeholder="Enter Title">
                  <label id="title_error" hidden>title is required.</label>
                </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="url" id="curl" placeholder="Enter Link">
                 <label id="url_error" hidden>url is required.</label>
                </div>
           <!--  <label>Description</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80" >
                This is my textarea to be replaced with CKEditor.
            </textarea> -->
            <div class="form-group">
                     <label for="exampleInputEmail1">Content</label>
                    <textarea class="form-control" name="content" id="ccontent" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    <label id="content_error" hidden> content is required.</label>
                   </div>
          <!--  <div class="form-group">
            <label for="link">Create Date</label>
            <input type="text" class="form-control"  id="cdate" placeholder="Enter Create Date">
          </div >
          <div class="form-group">
            <label for="link">Update Date</label>
            <input type="text" class="form-control"  id="udate" placeholder="Enter Update Date">
          </div > -->


         

            <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Create Content" name="Create">
              </div>
        </form>


			
          </div>
	  </div>
</section>
</div>
<script type="text/javascript">
$("#save").click(function(){
    var title  = $("#ctitle").val(); 
    var url    = $("#curl").val();
   var content = $("#ccontent").val();

   if(title !="" && url !="" && content !="")
   {
      save();
   }
   else
   {
       if(title == "")
       {
          $("#title_error").show();
          $("#title_error").css("color","red");
       }else{
           $("#title_error").hide();
       }
       if(url == ""){
          $("#url_error").show();
          $("#url_error").css("color","red");
       }else{
           $("#url_error").hide();
       }
       if(content == ""){
           $("#content_error").show();
           $("#content_error").css("color" ,"red");
       }else{
           $("#content_error").hide();
       }
   }

  });

</script>