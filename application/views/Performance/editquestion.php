
<script>
function save()
{
$('#imagelodar').show();
	
var data1 = {
    "id"                      : $('#id').val(), 
    "userid"                  : $("#userid").val(),
    "question"                : $("#question").val(),
    "age_group"               : $("#age_group").val(),
    "gender"                  : $("#gender").val(),
	  "level"                     : $("#level").val(),
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
              <?php  
            //  print_r($id);


              $quest = $this->register->getproffessioninfo($id); 
                    if(!empty($quest)){
                         $questions = $quest[0];
                         }
                          ?>
               
                <div class="form-group">
                   <label for="exampleInputEmail1">Question</label>
                   <input type="text" class="form-control" name="question" id="question" value="<?php echo $questions['question'] ?>" placeholder="Enter Question">
                   <label id="question_error" hidden>question is required.</label>
                </div>

                 <input type="hidden" class="form-control" name="question" id="id" value="<?php echo $questions['id'] ?>" >


       
                <div class="form-group">
                <label for="agegroup">Age Group</label>
                <select id="age_group" class="form-control" name="Age Group">
                <option value="<?php echo $questions['age_group'];?>"><?php echo $questions['age_group'];?></option> 
                <option value ="4 - 8">4 - 8</option>
                <option value ="8 - 12">8 - 12</option>
                <option value="12 - 16">12 - 16</option> 
                <option value ="16 - 20">16 - 20</option>
                <option value ="20 - 25">20 - 25</option>
                <option value ="25 and above">25 and above</option>
                </select>
                <label id="age_group_error" hidden>Age Group is required</label>
                </div>


                
                <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="Gender">
                <option value="<?php echo $questions['gender'];?>"><?php echo $questions['gender'];?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="All">All</option> 	
                </select>         	
                <label id="gender_error" hidden>Gender is required</label>
                </div>
                <div class="form-group">
                <label for="level">Level</label>
                <select id="level" class="form-control" name="Level">
                <option value="<?php echo $questions['level'];?>" ><?php echo $questions['level'];?></option>
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
                <option><?php echo $questions['proffession'];?></option>
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


<script type="text/javascript">
     $('#save').click(function()
     {

     //	alert("hii");
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
        if(proffession == "")
        {
          $("#proffession_error").show();
          $("#proffession_error").css('color', 'red');
        }
        else{
          $("#proffession_error").hide(); 
        }
       if(question!="" && age_group!="" && level!="" && gender!="" &&proffession!=""){
          save();
        }
    });
  </script>

