
<script>
function save()
{ 
$('#imagelodar').show();
var array = [];
var i=0;
if($("#tactical").val() == 'tactical')
{
     array[i] = $("#tactical").val();
     i= i+1;
}
if($("#technical").val() == 'technical')
{
   array[i] = $("#technical").val();
   i= i+1;
}
if($("#physical").val() == 'physical')
{
   array[i] = $("#physical").val();
   i=i+1;
}
if($("#psychological").val() == 'psychological')
{
  array[i] = $("#psychological").val();
}

  
var myArray = $("#sport").val().split(","); 
var age = $("#agegroup").val().split(","); 

var code = myArray[1] + age[1];

//alert(code);

var data1 = {
    "id"                      : code,
    "sport"                   : myArray[0],
    "section"                 : array,
    "gender"                  : $("#gender").val(),
    "agegroup"                : age[0]
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/saveanalytics'); ?>',
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
         // window.location.href = url+"/forms/getquestion?performance";
       
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
         Create Analytics
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
               <label for="sports">Age Group</label>
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
              <li class="list-group-item">
              <label for="tactical" class="btn btn-danger">Tactical &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="tactical" class="badgebox"><span class="badge">&check;</span></label>
              </li>
              <li class="list-group-item">
                 <label for="technical" class="btn btn-info">Technical &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="technical" class="badgebox"><span class="badge" >&check;</span></label>
                </li>
                <li class="list-group-item">
                 <label for="physical" class="btn btn-warning">Physical &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="physical" class="badgebox"><span class="badge">&check;</span></label>
                </li>
                <li class="list-group-item">
                 <label for="psychological" class="btn btn-success">Psychological &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" id="psychological" class="badgebox"><span class="badge">&check;</span></label>
                 <!--  <b>Friends</b> <a class="pull-right">13,287</a> -->
                </li>
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


<!-- <script type="text/javascript">
 $("#gender").change(function()
 {

  var data = {
    "gender"     :$("#gender").val()
  };
     console.log(JSON.stringify(data));
     var data = JSON.stringify(data);
     $.ajax({
           type: "POST",
           url: '<?php// echo site_url('forms/searchagegroup'); ?>',
           data: "data="+data,
           dataType: "text",
           success: function(result)
           {
            alert(result);
           }
    });
 });


</script> -->
<script type="text/javascript">
     $('#save').click(function()
     {
       save();
    });
  </script>
  <script type="text/javascript">
$('#tactical').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#tactical").val('tactical');
               val='tactical';
          // alert(val);
        }
        else {
          var val=$("#tactical").val(0);
               val=0;  
        }
    });

     $('#technical').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#technical").val('technical');
               val='technical';
          //  alert(val);
        }
        else {
          var val=$("#technical").val(0);
               val=0;
            
        }
    });

      $('#physical').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#physical").val('physical');
               val='physical';
          //alert(val);
        }
        else {
          var val=$("#physical").val(0);
               val=0;
            
        }
    });
       $('#psychological').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#psychological").val('psychological');
               val='psychological';
          //alert(val);
        }
        else {
          var val=$("#psychological").val(0);
               val=0;
             //alert(val);
        }
    });

</script>


