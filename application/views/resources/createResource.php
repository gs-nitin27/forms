
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>



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
            <form role="form" enctype='multipart/form-data' id="form_resource"  action="<?php echo site_url('forms/createresources'); ?>"  method="post">
              <div class="box-body">






<script>
$(document).ready(function() {
$('#types').change(function(){
if($('#types').val() == 'video')
   {
        $('#xyz').hide();
      
      }

if($('#types').val() == 'text')
{
 $('#xyz').show();
}
});
});
</script>

                <div class="form-group">
            
                      <label for="exampleInputEmail1">Resource Type</label>
                     <select id="types" class="form-control" >
                     <option >-Select-</option> 
                     <option value="text">Text</option>
                     <option value="video">Video</option>
                     </select>
              </div >





            
             <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title">
                </div>

       <div class="form-group">
         <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                     
          <div class="form-group" id="xyz">
          <label for="exampleInputEmail1">Description</label>
                   <textarea class="textarea" name="description" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
                   

                   <div class="form-group">
                    <label for="mysearch">Location</label>
                    <div class="ui multiple dropdown">
                     

                     <input type="text" class="form-control" name="location" id="mysearch" placeholder="Enter Location" onkeyup="doSearch();">
                   </div>
                   </div>
             
                  <div>
                   <select id="country" style="width:300px;">
                    <!-- Dropdown List Option -->
                   </select>
                      </div>

<script type="text/javascript">
      $(document).ready(function() {
        var country = ["Australia", "Bangladesh", "Denmark", "Hong Kong", "Indonesia", "Netherlands", "New Zealand", "South Africa"];
        $("#country").select2({
          data: country
        });
      });
    </script>
                      
                <div class="form-group">
                  <label for="exampleInputEmail1">Add Link Here</label>
                  <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter title">
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                  <input type="text" class="form-control" name="keyword" id="exampleInputEmail1" placeholder="Enter Link">
                </div>
                
                <div class="form-group">
            
                     <label for="eventtype">Topic Of The Artical</label>
                     <select id="artical" class="form-control" >
                     <option value="0">- Select -</option> 
                     <option value ="Jobs">Jobs </option>
                     <option value ="Tournaments">Tournaments</option>
                      <option value="Event">Event</option> 
                     <option value ="news_aticle">News Aticle </option>
                     <option value ="t&k">Training & Knowledge</option>
                     </select>
                  </div >



                    <div class="form-group">
                        <?php  $sports = $this->register->getSport();
                            
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option >-Select-</option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['sports'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div >
                 

                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file" accept="image/*">

                  <p class="help-block">Upload image file only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input id="sub" type="submit" class="btn btn-primary" value="Submit"/>
              </div>

              
            </form>
          </div>
    </div>
    
</div>
</div>
</section>
</div>


   <script>
   $("#mysearch").autocomplete({
  minLength: 3,
  source: function(req, add){
    $.ajax({
      url: '<?php echo site_url('forms/getCityName'); ?>', 
      dataType: 'json',
      type: 'POST',
      data: req,
      success: function(data){
        if(data.response =='true'){
           add(data.message);
        }
        else
        {
          alert("Enter valid city");
        } 
      }
    });
  }
});
  </script>
