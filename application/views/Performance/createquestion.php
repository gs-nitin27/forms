
<script>
function save()
{
$('#imagelodar').show();

var data1 = {
    "id"                      : 0, 
    "userid"                  : $("#userid").val(),
    "question"                : $("#question").val(),
    "age_group"               : $("#age_group").val(),
    "gender"                  : $("#gender").val(),
   	"level"                   : $("#level").val(),
    "proffession"             : $("#proffession").val()
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/savequestion'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {

    	//alert(result);
      $('#imagelodar').hide();
    if(result == '1')
      {
         $( "#msgdiv" ).show();
         $( "#msg" ).html("Question is created");
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
          window.location.href = url+"/forms/getquestion?performance";
       
      }else
      {
       $( "#msgdiv" ).show();
         $( "#msg" ).html('Question not created');
         setTimeout(function() {
         $('#msgdiv').fadeOut('fast');
          }, 2000);
      }      

  
 
    }
});  

}
</script>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Create Question
      </h1>
     
    </section>
         <section class="content"> 

         <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
    <?php if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    
    <?php }?>
<div class="col-md-12">
<div class=" alert alert-success" id="msgdiv" style="display:none" >
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
      <div class="box box-primary">
       
            <!-- /.box-header -->
    


        
            <form id="myform">
              <div class="box-body">

            <?php
          $data=$this->session->userdata('item');
          $userid=$data['userid'];
        {  ?>
          <div class="form-group">
                  <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
            </div>
        <?php }?>

               

            

               
              

       
                 <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                  <option>-Select-</option>
                  <option id="male" value="m">Male</option>
                  <option id="female" value="f">Female</option>
                  <option id="all" value="u">All</option>
                  </select>
                  </div>


               

                  <div class="form-group">
                  <label for="agegroup">Age Group</label>
                  <select id="agegroup" class="form-control" name="agegroup">
                  </select>
                  </div>

              
                <div class="form-group">
                <?php  $sports = $this->register->getSport();?>
                <label for="sports">Sport</label>
                <select id="sport" class="form-control" name="sport">
                <option >-select-</option> 
                <?php if(!empty($sports)){
                        foreach($sports as $sport){?>
                <option value ="<?php echo $sport['sports'];?>,<?php echo $sport['id'];?>"><?php echo $sport['sports'];?> </option>
                <?php   }
                           } 
                         ?>
                </select>
               
                </div>

                  <div class="form-group">
                  <label for="section">section</label>
                  <select id="section" class="form-control" name="section">
                  </select>
                  </div>
               
                   <div class="form-group">
                   <label for="Subsection">Sub Section</label>
                   <input type="text" class="form-control" name="Subsection" id="Subsection" placeholder="Enter Question">
                   <label id="Subsection_error" hidden>question is required.</label>
                </div>


                 <div class="form-group">
                   <label for="exampleInputEmail1">Question</label>
                   <input type="text" class="form-control" name="question" id="question" placeholder="Enter Question">
                   <label id="question_error" hidden>question is required.</label>
                </div>




                <div class="form-group">
                <label for="level">Level</label>
                <select id="level" class="form-control" name="Level">
                <option value="" >-Select-</option>
                <option value="Level-1">Level-1</option>
                <option value="Level-2">Level-2</option>
                </select> 	
                <label id="level_error" hidden>Level is required</label>
                </div>


                  <div class="form-group">
                  <?php $profession = $this->register->getprofession();

                //print_r($profession);
             ?>
                <label for="proffession" >Profession</label>
                <select id="proffession" class="form-control" name="proffession">
                <option>-select-</option>
                <?php if(!empty($profession)){
                      foreach($profession as $prof){
                	?>
                 <option value="<?php echo $prof['profession'];?>"><?php echo $prof['profession']?></option>

                 <?php } } ?>    
                </select>
                <label id="proffession_error" hidden>Profession is required</label>	
                </div>
                </form>
            <div class="box-footer">
            <input type="button" class="btn btn-lg btn-primary" id="save" onclick="" value="Submit" name="Create">
            </div>
            </div>
            </div>
            </div>
            </div>
            </section>

</div>

<script>
$("#sport").change(function()
 {          

              var myArray = $("#sport").val().split(","); 
              var age = $("#agegroup").val().split(","); 
              var code = myArray[1] + age[1];

              var data = {
                          "id"       : code
                         };
               console.log(JSON.stringify(data));
               var data = JSON.stringify(data);

            $.ajax({           
                type: "POST",
                url: "<?php echo site_url('forms/searchsection'); ?>",                  
                data:"data="+data,                        
                dataType: 'json',                      
                success: function(data){ 
                     alert(JSON.stringify(data));
                    $('#section').find('option').remove(); 
                    $("#section").append('<option selected>Analytics</option>');
                    for(i in data) 
                        
                        $("#section").append("<option value=\""+data[i]['section']+"\">"+data[i]['section']+"</option>");
                } 

            });
        });
    </script>

<script>
$("#gender").change(function()
 {

              var data = {
                          "gender"     :$("#gender").val()
                         };
               console.log(JSON.stringify(data));
               var data = JSON.stringify(data);

            $.ajax({           
                type: "POST",
                url: "<?php echo site_url('forms/searchagegroup'); ?>",                  
                data:"data="+data,                        
                dataType: 'json',                      
                success: function(data){ 
                     //alert(JSON.stringify(data));
                    $('#agegroup').find('option').remove(); 
                    $("#agegroup").append('<option selected>Age Group</option>');
                    for(i in data) 
                        
                        $("#agegroup").append("<option value=\""+data[i]['age_group']+","+data[i]['id']+"\">"+data[i]['age_group']+"</option>");
                } 

            });
        });
    </script>

<script type="text/javascript">
     $('#save').click(function()
     {

     	//alert("hii");
        var question = $('#question').val();
        if(question == "")
        {
          $("#question_error").show();
          $("#question_error").css('color', 'red');
        }
        else{
          $("#question_error").hide(); 
        }
      
      
        var age_group = $('#age_group').val();
        if(age_group == "")
        {
          $("#age_group_error").show();
          $("#age_group_error").css('color', 'red');
        }
        else{
          $("#age_group_error").hide(); 
        }
        var level = $('#level').val();
        if(level == "")
        {
          $("#level_error").show();
          $("#level_error").css('color', 'red');
        }
        else{

          $("#level_error").hide(); 
        }
        var gender = $('#gender').val();
        if(gender == "")
        {
          $("#gender_error").show();
          $("#gender_error").css('color', 'red');
        }
        else{
          $("#gender_error").hide(); 
        }
        var proffession = $('#proffession').val();
        if(proffession == "-select-")
        {
          $("#proffession_error").show();
          $("#proffession_error").css('color', 'red');
        }
        else{
          $("#proffession_error").hide(); 
        }
       if(question!="" && age_group!="" && level!="" && gender!="" &&proffession!="-select-"){
          save();
        }
    });
  </script>

