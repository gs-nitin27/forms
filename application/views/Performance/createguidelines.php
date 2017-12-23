
<script>
function save(guide)
{

$('#imagelodar').show();

var data1 = {
    "id"                      : $("#idcode").val(), 
    "userid"                  : $("#userid").val(),
    "guidelines"              : JSON.stringify(guide),
    "age_group"               : $("#agegroup_value").val(),
    "gender"                  : $("#gender").val(),
    "sport"                   : $("#sports_name").val()
};

console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/performanceguide'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
      //alert(result);
    //$('#imagelodar').hide();
    if(result == '1')
      {
        $.confirm({
        title: 'Congratulations!',
        content: 'Question is created.',
        type: 'green',
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
                action: function(){
                 window.location.href = url+"/forms/listguidelines?performance";
                }
            },
            close: function () {
             window.location.href = url+"/forms/listguidelines?performance";
            }
        }
    });  
      }
      else 
      {
         $('#imagelodar').hide();
         $.confirm({
              title: 'Encountered an error!',
              content: 'Something went Worng, this may be server issue.',
              type: 'dark',
              typeAnimated: true,
              animationSpeed: 1500,
              animationBounce: 3,
              buttons: {
                  tryAgain: {
                      text: 'Try again',
                      btnClass: 'btn-dark',
                      action: function(){
                      }
                  },
                  close: function () {
                  }
              }
          });
      }      
    }
});  
}
</script>
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Create Guidelines
      </h1>
    </section>
    <section class="content"> 
      <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
    <?php if(isset($msg) && $msg != ""){?>
    <div class="col-md-12">
    <?php }?>
<div class="col-md-12">
      <div class="box box-primary">
            <!-- /.box-header -->
        <form id="myform">
        <div class="box-body">
        <?php
          $data=$this->session->userdata('item');
        //  $userid=$data['userid'];
           if($data['userType'] == 101 || $data['userType'] == 102)
          {
               $userid=$data['adminid'];
          }else
          {
             $userid=$data['userid'];
          }

        {  ?>
        <div class="form-group">
        <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $userid;?>">
        </div>
        <?php }?>
                 <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                  <option>-Select-</option>
                  <option id="male" value="Male">Male</option>
                  <option id="female" value="Female">Female</option>
                 <!--  <option id="all" value="u">All</option> -->
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="agegroup">Age Group</label>
                  <select id="agegroup" class="form-control" name="agegroup">
                  </select>
                  </div>
                  <input type="hidden" name="Age Group" id="agegroup_value">
                  <input type="hidden" name="question_id" id="idcode">

                <div class="form-group">
                <?php  $sports = $this->register->getSport();?>
                <label for="sports">Sport</label>
                <select id="sport" class="form-control" name="sport" >
                <option >-select-</option> 
                <?php if(!empty($sports)){
                        foreach($sports as $sport){?>
                <option value ="<?php echo $sport['sports'];?>,<?php echo $sport['id'];?>"><?php echo $sport['sports'];?> </option>
                <?php   }
                           } 
                         ?>
              </select>

            <input type="hidden" name="sports_name" id="sports_name" class="form-control">
              </div>
            <div id="container">
            <ul class="list-group">
            </ul>
          </div>
          <div id='TextBoxesGroup'>
          <div id="TextBoxDiv1">
          <div class="form-group">
          <label>Guide Lines </label>
          <input class="form-control" type='text' id='textbox1' placeholder="Guideline" >
          </div>
          </div>
          </div>
          <input type='button' id="question1" class="btn btn-lg btn-info" onclick="add();" value='Add Guidelines'>
          </div>
          <input type="hidden" class="form-control" name="test" value="" id="ntest">
          <input type="hidden" name="nsectonv" class="form-control" id="nsectonv" value=""> 
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
 
  var arr = [];

  function add() 
  {
     $("#save").show();
   if(!$("#textbox1").val())
   {
      alert("please insert question !");
      return ;
   }
   var inp = document.getElementById('textbox1');
   arr.push(inp.value);
   inp.value = '';
   show();
}


$("#textbox1").click(function(){
  //alert("hiii");
  $("#save").hide();
 
});


function show() 
{
   var html = '';

   for (var i=0; i<arr.length; i++) {
      html += '<li class="list-group-item list-group-item-success">' + arr[i] + '</li>';
   }
   var con = document.getElementById('container');
   con.innerHTML = html;
   $("#ntest").val(arr);
}

</script>


<script>
$("#sport").change(function()
 {          
              var myArray = $("#sport").val().split(","); 
              var age = $("#agegroup").val().split(","); 
              $("#agegroup_value").val(age[0]);
              $("#sports_name").val(myArray[0]);
              var code = myArray[1] + age[1];
              $("#idcode").val(code);
              //alert(code);
              $("#gender").prop('disabled',true);
              $("#agegroup").prop('disabled',true);
              $("#sport").prop('disabled',true);
              $("#save").hide();


 });
  
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
     $('#save').click(function()
     {
        // alert(arr);
          save(arr);
    });


  </script>


