
  <script>
$(document).ready(function(){
             

  $('#save').click(function(){
    
var data1 = {


     
    "userid"                  : $("#uid").val(),
    "name"                    : $("#name").val(),
    "type"                    : $("#utype").val(),
    "email"                   : $("#email").val(), 
    "contact"                 : $("#contact").val(), 
    "city"                    : $("#city").val(), 
    "pin"                     : $("#pin").val(), 
    "description"             : $("#edesc").val(),
    "eligibility1"            : $("#criteria1").val(),
    "eligibility2"            : $("#criteria2").val(),
    "state"                   : $("#state").val(),
    "terms_and_conditions1"   : $("#terms1").val(),
    "terms_and_conditions2"   : $("#terms2").val(),
    "organizer_name"          : $("#orgName").val(),
    "mobile"                  : $("#contact").val(),
    "organizer_address_line1" : $("#orgadd1").val(), 
    "organizer_address_line2" : $("#orgadd2").val(), 
    "organizer_city"          : $("#orgcity").val(), 
    "organizer_pin"           : $("#orgpin").val(),
    "organizer_state"         : $("#orgstate").val(),
    "event_links"             : $("#evlink").val(),
    "start_date"              : $("#startD").val(),
    "end_date"                : $("#endD").val(),
    "sport"                   : $("#sport").val(),
    "entry_start_date"        : $("#estartD").val(),
    "entry_end_date"          : $("#eendD").val(),
    "email_app_collection"    : $("#email_app_collection").val(),
    "file_name"               : $("#filename").val()

};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>';
var data = JSON.stringify(data1);

  $.ajax({

    type: "POST",
    url: '<?php echo site_url('forms/profile'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
        $( "#msgdiv" ).show();
        $( "#msg" ).html(result);
        setTimeout(function() {
            $('#msgdiv').fadeOut('fast');
        }, 2000);
       
    }


});

    
});});

 
  $(function() {
    $( "#dob" ).datepicker();
   
    
    
  });

  </script>
        
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profile
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
      <div class="col-md-6">
       
         <?php  $profile = $this->register->profile($id); 
           // print_r($profile); 
            // print_r($id); 
            foreach ($profile as $value) 
              
            {?>
        <div class=" alert alert-success" id="msgdiv" style="display:none">
            <strong>Info! <span id = "msg"></span></strong> 
        </div>

            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Name </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Address</a></li>
            <!--   <li><a href="#tab_eligible" data-toggle="tab">Eligibility</a></li> -->
             </ul>   
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
                
                <div class="box-header with-border">
                    <h4>Name And Details:</h4 >        
                </div>
                <div class="box-body">
                <div class="form-group">
                  
                  <input type="hidden" class="form-control" name="UserId"  id="uid" value="<?php echo $value['userid']; ?>">
                </div>
                     <div class="form-group">
                      <label for="name">Name</label>
                    <input type="text" class="form-control"  id="name" value="<?php echo $value['name']; ?>" >
                    </div >


                    <div class="form-group">
                    <label for="usertype">User Type </label>
                        <select id="utype" class="form-control" disabled >
                            <option><? echo $value['prof_id'];?></option>
                            
                            <option id="Coach">Coach</option>
                            <option id="player">Player</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <?php  $sports = $this->register->getSport();
                            
                        ?>
                      <label for="sports">Sport</label>
                        <select id="sport" class="form-control" >
                        <option ><?php echo $value['sport']; ?></option> 
                            <?php if(!empty($sports)){
                                    foreach($sports as $sport){?>
                                <option value ="<?php echo $sport['id'];?>"><?php echo $sport['sports'];?> </option>
                            <?php   }
                                  } 
                            ?>
                        </select>
                    </div >

                    <div class="form-group">
                      <label for="Email">Email Id</label>
                      <input type="text" class="form-control"  id="email" placeholder="Enter Email Id" value="<?php echo $value['email']; ?>" disabled>
                    </div >
                    <div class="form-group">
                      <label for="contact">Contact No</label>
                      <input type="text" class="form-control"  id="contact" placeholder="Enter Contact No" value="<?php echo $value['contact_no']; ?>">
                    </div >

                   <div class="form-group">
                    <label for="sports">Gender</label>
                        <select id="gen" class="form-control" value="<?php echo $value['Gender']; ?>" >
                            <option><?php echo $value['Gender']; ?></option>
                            <option id="Male">Male</option>
                            <option id="Female">Female</option>
                            <option id="Transgender">Transgender</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label for="link">Date of Birth</label>
                      <input type="text" class="form-control"  id="dob" value="<?php echo $value['dob']; ?>" placeholder="Date Of Birth">
                    </div >

                   
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
              <div class="box-header with-border">
                <h4>Address Details:</h4 >    
            </div>
                <div class="box-body">
                    
                     
                    <div class="form-group">
                      <label for="address1">Address Line1</label>
                      <input type="text" class="form-control"  id="orgadd1" placeholder="Enter Address" value="<?php echo $value['address1']; ?>">
                    </div >
                    <div class="form-group">
                      <label for="address2">Address Line2</label>
                      <input type="text" class="form-control"  id="orgadd2" value="<?php echo $value['address2']; ?>" placeholder="Enter Address">
                    </div >
                    <div class="form-group">
                      <label for="city">City</label>
                      <input type="text" class="form-control"  id="city" value="<?php echo $value['location']; ?>" placeholder="Enter City">
                    </div >
                    <div class="form-group">
                      <label for="state">State</label>
                      <input type="text" class="form-control"  id="state"  placeholder="Enter State">
                    </div >
                    <div class="form-group">
                      <label for="pin">Pin</label>
                      <input type="text" class="form-control"  id="pin" placeholder="Enter Pin">
                    </div >
                    
                </div>
              </div>
            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            <div class="box-footer">
            <input type="button" class="btn btn-lg btn-primary" id="save" onclick="#" value="Save" name="Save">
            </div>
             </form>
            
          </div>
          <?php }?>
      </div>

</section>
</div>