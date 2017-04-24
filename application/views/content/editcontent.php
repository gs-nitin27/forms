  <script>
//document.domain = "getsporty.in";
function save()
{
  $("#imagelodar").show();
var data12 = {
    "id"                      : $("#cid").val(),
   "userid"                   : $("#userid").val(),
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

    url: '<?php echo site_url('forms/saveEditContent'); ?>',
    data: "data="+data,
    dataType: "json",
    success: function(result) {
      // $("#imagelodar").hide();
     if(result == '1')
       {
        $.confirm({
        title: 'Congratulations!',
        content: 'Content is Created.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/getContent?Content";
                }
            },
            close: function () {
             window.location.href = url+"/forms/getContent?Content";
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
	  <div class="col-md-12">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

			<div class="nav-tabs-custom">

    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
    </head>

<?php
          $data=$this->session->userdata('item');
          $userid=$data['userid'];
          {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
            </div>
          <?php 
           }  $contant = $this->register->editcontent($id); 
           // print_r($contant); 
            foreach ($contant as $value) 
            {?>
        <form>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="title"  id="cid" value="<?php echo $value['id']; ?>">
                </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="ctitle" value="<?php echo $value['title']; ?>">
                <label id="title_error" hidden>title is required.</label>
                </div>
            <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="url" id="curl" value="<?php echo $value['url']; ?>">
                <label id="url_error" hidden>url is required.</label>
                </div>
               
           
                  <div class="form-group">
                  <label for="exampleInputEmail1">Content</label>
                  <textarea class="form-control" name="content" id="ccontent"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['content']; ?></textarea>
                  <label id="content_error" hidden>Content is required .</label> 
                   </div>
                   <?php } ?>
          
           
            <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Update Content" name="Create">
              </div>
        </form>
          </div>
	  </div>
</section>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
<script type="text/javascript">
  
  $('#save').click(function(){
    
    var title =   $("#ctitle").val();
    var url  =    $("#curl").val();
    var content = $("#ccontent").val();

    if(title !="" && url != "" && content != "")
    {
      save();
    }
    else 
    {
        if(title == ""){
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
            $("#content_error").css("color","red");
        } else{
            $("#content_error").hide();
        }
    }
  });
</script>
