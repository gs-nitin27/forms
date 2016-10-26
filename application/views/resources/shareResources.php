
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
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
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                </div>

       <div class="form-group">
         <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>

                   
                     <div class="form-group">
                    <label for="mysearch"  >Location</label>
                    <!-- <div class="ui multiple dropdown">
                     

                     <input type="text" class="form-control" name="location" id="mysearch" placeholder="Enter Location" onkeyup="doSearch();">
                   </div>
                   </div> -->
             
                  <div>
                   <select id="location" name="location" style="width:300px;">
                    <!-- Dropdown List Option -->
                   </select>
                      </div>
                   </div>

             

                <div class="form-group">
                  <label for="url">Add Link Here</label>
                  <input type="text" class="form-control" name="url" id="url" placeholder="Enter title">
                </div>
			

      	<div class="form-group">
                  <label for="keyword">Keyword</label>
                  <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Enter Link">
                </div>
                
            <!-- <div class="form-group">
                  <label for="artical">Topic Of The Artical</label>
                  <input type="text" class="form-control" name="artical" id="artical" placeholder="Enter ">
                </div> -->


                <div class="form-group">
            
                     <label for="eventtype">Topic Of The Article</label>
                     <select id="article" class="form-control" name="topic_of_artical">
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
                        <select id="sport" class="form-control" name="sport">
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
                  <label for="file">File input</label>
                  <input type="file" id="file" name="file" accept="image/*">

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



  <!--  <script>
   $("#mysearch").autocomplete({
  minLength: 3,
  source: function(req, add){
    $.ajax({
      url: '<?php // echo site_url('forms/getCityName'); ?>', 
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
  </script> -->

  <script type="text/javascript">
      $(document).ready(function() {
        var location =["-Select City-","Bangalore","Chennai","Delhi","Hyderabad","Kolkata","Mumbai","             Pune","Indore","Jaipur","Surat","Nagpur","Lucknow","Patna","Bhopal","Nashik","Aurangabad","Madurai","Aligarh","Kochi","Visakhapatnam","Coimbatore","Vijayawada","Jabalpur",           "Rajkot","Solapur","Anand","Ludhiana","Agra","Meerut","Thiruvananthapuram","            Kozhikode","Faridabad","Varanasi","Jamshedpur","Allahabad", "Amritsar","Dhanbad",           "Gorakhpur","Hubli-Dharwad","Raipur","Mysore","Thrissur","Mangalore","Guntur","            Bhubaneshwar","Amravati","Srinagar","Bhilai","Warangal","Kakinada","Nellore","            Ranchi","Guwahati","Gwalior","Chandigarh","Patiala","Jodhpur","Tiruchirapall",            "Pondicherry","Salem","Dehradun","Hajipur","Kollam","Sangli","Jamnagar","Jammu"            ,"Kurnool","Roorkee","Vellore","Kannur","Etawah"];
        $("#location").select2({
          data: location
        });
      });
    </script>
