
   
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
         <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                   <div class="form-group">
                    <label for="mysearch">Location</label>
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
                
                <div class="form-group">
            
                     <label for="eventtype">Topic Of The Artical</label>
                     <select id="artical" class="form-control" >
                     <option value="0">- Select -</option> 
                     <option value ="1">1 </option>
                     <option value ="2">2</option>
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

              <div class="frmSearch">
             <input type="text" id="search-box" placeholder="Country Name" />
              <div id="suggesstion-box"></div>
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
  minLength: 1,
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


<!-- <script>


$('#mysearch').autocomplete({
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

         if(data.response =='true'){
           add(data.message);
        }
        //  response( $.map( data, function( item ) {
        //   var code = item.split("|");
        //   return {
        //     label: code[0],
        //     value: code[0],
        //     data : item
        //   }
        // }));
      }
      });
    },
    autoFocus: true,          
    minLength: 0,
    select: function( event, ui ) {
    var names = ui.item.data.split("|");            
    $('#country_no_1').val(names[1]);
    $('#phone_code_1').val(names[2]);
    $('#country_code_1').val(names[3]);
  }           
});
</script>


 -->



<!-- 
  <script>
$(document).ready(function(){
  $("#search-box").keyup(function(){
    $.ajax({
    type: "POST",
    url: "readCountry.php",
    data:'keyword='+$(this).val(),
    beforeSend: function(){
      $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
    },
    success: function(data){
      $("#suggesstion-box").show();
      $("#suggesstion-box").html(data);
      $("#search-box").css("background","#FFF");
    }
    });
  });
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>

<style>
body{width:610px;}
.frmSearch {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
#search-box{padding: 10px;border: #F0F0F0 1px solid;}
</style> -->