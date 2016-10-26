  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>



 <script>
//document.domain = "getsporty.in";
$(document).ready(function(){
   
$('#save').click(function(){

var data1 = {


    "id"                      : $("#rid").val(), 
    "user_id"                 : $("#userid").val(),
    "title"                   : $("#rtitle").val(),
    "url"                     : $("#rurl").val(),
    "description"             : $("#rdescription").val(), 
    "summary"                 : $("#rsummary").val(),
    "location"                : $("#rlocation").val(), 
    "keyword"                 : $("#rkeyword").val(),
    "topic_of_artical"        : $("#rartical").val(), 
    "sport"                   : $("#sport").val()
};
//alert(data1);
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = JSON.stringify(data1);
  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/saveEditResources'); ?>',
   // url: '<?php //echo site_url('forms/saveEditResources');?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    $( "#msgdiv" ).show();
   $( "#msg" ).html(result);
    setTimeout(function() {
     $('#msgdiv').fadeOut('fast');
   }, 2000);
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
    <div class="col-md-8">
    <div class=" alert alert-success" id="msgdiv" >
      <strong>Info! <span id = "msg"><?php echo $msg;?></span></strong> 
    </div>
    <?php }?>
<div class="col-md-8">
      <div class="box box-primary">
       
            <!-- /.box-header -->

       <?php  $Resources = $this->register->editresources($id); 
           // print_r($contant); 
             foreach ($Resources as $value) 
              
            {?>

        
            <form>
              <div class="box-body">

            <?php
          $data=$this->session->userdata('item');
          $name=$data['userid'];
        {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="userid" value="<?php echo $name;?>">
            </div>
        <?php }?>

              <div class="form-group">
                  <input type="hidden" class="form-control" name="id" id="rid" value="<?php echo $value['id']; ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" name="rtitle" id="rtitle" placeholder="Enter title" value="<?php echo $value['title']; ?>">
                </div>
        <div class="form-group">
                  <label for="exampleInputEmail1">Link</label>
                  <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link" value="<?php echo $value['url']; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Summary</label>
                   <textarea class="textarea" name="summary" id="rsummary" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['summary']; ?></textarea>
                </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
                   <textarea class="textarea" name="description" id="rdescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $value['description']; ?></textarea>
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                  <input type="text" class="form-control" name="location" id="rlocation" placeholder="Enter title" value="<?php echo $value['location']; ?>">
                </div> 


<!-- 
              <div class="form-group">
                  <label for="exampleInputEmail1">Location</label>
                   
                  <div>
                   <select id="location" name="location" style="width:700px;"><?php //echo $value['location']; ?>
                   </select>
                      </div>
                   </div> -->



                <div class="form-group">
                  <label for="exampleInputEmail1">Keyword</label>
                  <input type="text" class="form-control" name="keyword" id="rkeyword" placeholder="Enter title" value="<?php echo $value['keyword']; ?>">
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
                    </div >



                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile" name="file" accept="image/*">

                  <p class="help-block">Upload image file only.</p>
                </div>
                
              </div>
              <!-- /.box-body -->
               <?php } ?>
             <div class="box-footer">
                <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Edit Resources" name="Create">
              </div>
            </form>
          </div>
    </div>
    
</div>
</div>
</section>

<script type="text/javascript">
      $(document).ready(function() {
        var location =["-Select City-","Bangalore","Chennai","Delhi","Hyderabad","Kolkata","Mumbai","           Pune","Indore","Jaipur","Surat","Nagpur","Lucknow","Patna","Bhopal","Nashik","Aurangabad","Madurai","Aligarh","Kochi","Visakhapatnam","Coimbatore","Vijayawada","Jabalpur",           "Rajkot","Solapur","Anand","Ludhiana","Agra","Meerut","Thiruvananthapuram","            Kozhikode","Faridabad","Varanasi","Jamshedpur","Allahabad", "Amritsar","Dhanbad",           "Gorakhpur","Hubli-Dharwad","Raipur","Mysore","Thrissur","Mangalore","Guntur","            Bhubaneshwar","Amravati","Srinagar","Bhilai","Warangal","Kakinada","Nellore","            Ranchi","Guwahati","Gwalior","Chandigarh","Patiala","Jodhpur","Tiruchirapall",            "Pondicherry","Salem","Dehradun","Hajipur","Kollam","Sangli","Jamnagar","Jammu"            ,"Kurnool","Roorkee","Vellore","Kannur","Etawah"];
        $("#location").select2({
          data: location
        });
      });
    </script>

