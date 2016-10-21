
   
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
     Share Resources
        
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
         <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                   
                    <label for="mysearch">Location</label>
                    <div class="ui multiple dropdown">
                     

                     <input type="text" class="form-control" name="location" id="mysearch" placeholder="Enter Location" onkeyup="doSearch();">
                   </div>
             

                <div class="form-group">
                  <label for="exampleInputEmail1">Add Link Here</label>
                  <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Enter title">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                  <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Link">
                </div>
                
            <!-- <div class="form-group">
                  <label for="artical">Topic Of The Artical</label>
                  <input type="text" class="form-control" name="artical" id="artical" placeholder="Enter ">
                </div> -->


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
				

                  <!-- <div class="form-group">
                     <label for="eventtype">Location</label>
                     <select id="Location" class="form-control" >
                     <option value="0">- Select -</option> 
                     <option value ="1">1 </option>
                     <option value ="2">2</option>
                     </select>
                  </div >

 -->
                 

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

<!-- 
<script >
$('#mysearch').autocomplete({
   minLength: 1,
  source: function( request, response ) {
      $.ajax({
        url : '<?php //echo site_url('forms/getCityName'); ?>',
        dataType: "json",
      data: {
         name_startsWith: request.term,
         type: 'location',
         row_num : 1
      },
       success: function( data ) {

        //  if(data.response =='true'){
        //    add(data.message);
        // }
         response( $.map( data, function( item ) {
            var code = item.split("|");
             return {
              label: code[0],
             value: code[0],
            data : item
         }
    }));
     }
      });
    },
    autoFocus: true,          
    minLength: 0,
    select: function( event, ui ) {
    var names = ui.item.data.split("|");            
    $('#city').val(names[1]);
    $('#phone_code_1').val(names[2]);
    $('#country_code_1').val(names[3]);
  }           
});
</script>


 -->

