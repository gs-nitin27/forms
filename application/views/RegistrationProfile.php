 <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
 <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<style type="text/css">
    /* USER PROFILE PAGE */
 .card {
    margin-top: 20px;
    padding: 30px;
    background-color: rgba(214, 224, 226, 0.2);
    -webkit-border-top-left-radius:5px;
    -moz-border-top-left-radius:5px;
    border-top-left-radius:5px;
    -webkit-border-top-right-radius:5px;
    -moz-border-top-right-radius:5px;
    border-top-right-radius:5px;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}
.card.hovercard {
    position: relative;
    padding-top: 0;
    overflow: hidden;
    text-align: center;
    background-color: #fff;
    background-color: rgba(255, 255, 255, 1);
}
.card.hovercard .card-background {
    height: 130px;
}
.card-background img {
    -webkit-filter: blur(25px);
    -moz-filter: blur(25px);
    -o-filter: blur(25px);
    -ms-filter: blur(25px);
    filter: blur(25px);
    margin-left: -100px;
    margin-top: -200px;
    min-width: 130%;
}
.card.hovercard .useravatar {
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;

}
.card.hovercard .useravatar img {
    width: 100px;
    height: 100px;
    max-width: 100px;
    max-height: 100px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    border: 5px solid rgba(255, 255, 255, 0.5);
}
.card.hovercard .card-info {
    position: absolute;
    bottom: 14px;
    left: 0;
    right: 0;
}
.card.hovercard .card-name {
    position: absolute;
    bottom: 0px;
    left: 0;
    right: 0;
    top :140px;
}
.card.hovercard .card-info .card-title {
    padding:0 5px;
    font-size: 20px;
    line-height: 1;
    color: #262626;
    background-color: rgba(255, 255, 255, 0.1);
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
}
.card.hovercard .card-info {
    overflow: hidden;
    font-size: 12px;
    line-height: 20px;
    color: #737373;
    text-overflow: ellipsis;
}
.card.hovercard .bottom {
    padding: 0 20px;
    margin-bottom: 17px;
}
.btn-pref .btn {
    -webkit-border-radius:0 !important;
}
</style>


<script>
$(document).ready(function(){
 
$('#module').click(function(){
$("#imagelodar").show();

var data = {

    "id"                       : $("#uid").val(),
    "event"                    : $("#EVENT").val(),
    "tournament"               : $("#TOURNAMENT").val(),
    "job"                      : $("#JOB").val(), 
    "resources"                : $("#RESOURCES").val(), 
    "content"                  : $("#CONTENT").val(),
    "performace"               : $("#PERFORMANCE").val(),
    "usermenu"                 : $("#USER_ROLE_MANAGEMENT").val()
};
console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveuserModule'); ?>',
    data: "data="+data,
    dataType: "text",
    success: function(result) {
    // alert(result);
      if(result == '1')
      {
          // $("#imagelodar").hide();
        $.confirm({
        title: 'Congratulations!',
        content: 'Module is Created.',
        type: 'green',
        typeAnimated: true,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                  $("#imagelodar").hide();
                 //window.location.href = url+"/forms/getContent?Content";
                }
            },
            close: function () {
              $("#imagelodar").hide();
             //window.location.href = url+"/forms/getContent?Content";
            }
        }
    });
      }
      else
      {
             // $("#imagelodar").hide();
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
                        $("#imagelodar").hide();
                      }
                  },
                  close: function () {
                    $("#imagelodar").hide();
                  }
              }
          });
      }
    }
});   
});});
</script>  

<?php  
      $profile = $this->register->profile($id); 
     foreach ($profile as $value) 
      {
      }

      // print_r($value);
      ?>
<div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
<div class="wrapper">
<div class="content-wrapper">
<div class="container">
<div class="row">
<div class="col-lg-11 col-sm-11">
    <div class="card hovercard">
        <div class="card-background">

             
          <!--   <img class="card-bkimg" alt="" src="http://lorempixel.com/100/100/people/9/"> -->
            <!-- http://lorempixel.com/850/280/people/9/ -->
             <img class="card-bkimg" alt="" src="<?php echo base_url('img/background.jpg');?>" alt="User profile picture">


        </div>
        <div class="useravatar">

            <?php 
                    if($value['user_image']) {
             ?>
           <img class="card-bkimg" alt="" src="<?php echo base_url()."uploads/profile/".$value['user_image'];?>" alt="User profile picture">
             <?php } else { if($value['gender'] == 'Female') { ?>
                <img class="card-bkimg" alt="" src="<?php echo base_url('img/female.jpg');?>" alt="User profile picture">
           <?php } else { ?>
          <img class="card-bkimg" alt="" src="<?php echo base_url('img/user.jpg');?>" alt="User profile picture">
            <?php } } ?>


        </div>
         
   

        <div class="card-info"><span class="card-title"><?php echo $value['name'];?></span></div>
      <?php if($value['prof_name']) {?>
      
         <div class="card-name" ><span ><b><?php echo $value['prof_name'];?></b></span></div>
         <?php }?>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Education</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <div class="hidden-xs">Experience</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Others</div>
            </button>
        </div>
        <!-- <div class="btn-group" role="group">
            <button type="button" id="basic" class="btn btn-default" href="#tab4" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div> -->
    </div>


      <div class="tab-content">
       <div class="tab-pane fade in active" id="tab1">
           
          <div class="row">
          <div class="col-md-12">
          <div class="box box-primary" style="margin-top:5%;">
          <div class="box-body box-profile">
          <div class="form-group">
          <label for="exampleInputEmail1">Link</label>
          <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
          </div>
            
            </div>
          </div>
         

</div>
     
            </div>

        </div>
        <div class="tab-pane fade in" id="tab2">
        <div class="row"> 
        <div class="col-md-12">
        <div class="box box-primary" style="margin-top:5%;">
            <div class="box-header with-border">
           <div class="form-group">
          <label for="exampleInputEmail1">Link</label>
          <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
          </div>
            
         
          </div>
         </div>
         </div>
            
            </div>
             
        </div>
        <div class="tab-pane fade in" id="tab3">
        <div class="row"> 
        <div class="col-md-12">
        <div class="box box-primary" style="margin-top:5%;">
        <div class="box-header with-border">

        <div class="form-group">
        <label for="dob">Date Of Birth</label>
        <input type="text" class="form-control" name="dob" id="dob" value="<?php echo $value['dob'];?>" placeholder="Date Of Birth" disabled>
        </div>


        <div class="form-group">
        <label for="prof_language">Language Known</label>
        <input type="text" class="form-control" name="prof_language" id="prof_language" value="<?php echo $value['prof_language'];?>"  placeholder="Language Known">
        </div>

        <div class="form-group">
        <label for="exampleInputEmail1">Age Group Coach</label>
        <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
        </div>

        <div class="form-group">
        <label for="prof_name">Profession</label>
        <input type="text" class="form-control" name="prof_name" id="prof_name" value="<?php echo $value['prof_name'];?>" disabled>
        </div>
        <div class="form-group">
        <label for="sport">Sport</label>
        <input type="text" class="form-control" name="sport" id="sport" value="<?php echo $value['sport'];?>" placeholder="sport" disabled>
        </div>
        <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" name="gender" id="gender" value="<?php echo $value['gender'];?>" placeholder="Gender" disabled>
        </div>
        <div class="form-group">
        <label for="exampleInputEmail1">Link to personal Website</label>
        <input type="text" class="form-control" name="rurl" id="rurl" placeholder="Enter Link">
        </div>

        </div>
        </div>
        </div>
        </div>
        
        </div>
      </div>
    </div>
     </div>
      </div>
    </div>
    
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
    // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");   
});
});
    </script>

            
    