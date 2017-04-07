<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<!-- <style type="text/css">
	.glyphicon glyphicon-remove-circle {
    position: absolute;
    right: 30px;
    top: 0;
    bottom: 0;
    height: 14px;
    margin: auto;
    font-size: 14px;
    cursor: pointer;
    color: #ccc;
}
</style> -->

    <section class="content-header">
      <h1>
         Create Guidelines
      </h1>
    </section>
    <section class="content"> 
      <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
<div class="col-md-12">
      <div class="box box-primary">
            <!-- /.box-header -->
        <form id="myform">
        <div class="box-body">
        <?php


          $guide = $this->register->getperformanceguideline($id);
         // print_r($guide);

           if(!empty($guide)){
						foreach($guide as $guideline){ ?>
        <div class="form-group">
        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $guideline['id'];?>">
        <input type="hidden" class="form-control" name="userid" id="userid" value="<?php echo $guideline['userid'];?>">
        </div>
        <?php }?>
                 <div class="form-group">
                  <label for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender" disabled="">
                  <option><?php echo $guideline['gender'];?></option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label for="agegroup">Age Group</label>
                  <select id="agegroup" class="form-control" name="agegroup" disabled="">
                  <option><?php echo $guideline['age_group'];?></option>
                  </select>
                  </div>
                <div class="form-group">
                <label for="sports">Sport</label>
                <select id="sport" class="form-control" name="sport" disabled="" >
                <option ><?php echo $guideline['sport'];?></option>     
              </select>
              </div>
              <div class="form-group">
              	<label>Guide Lines </label>
              
              <ul class="list-group">
              <?php 
                $guid = $guideline['guidelines'];
                $guid1 = json_decode($guid);
                for ($i=0; $i<sizeof($guid1);$i++) 
                {
              
                ?>
                 <li id="<?php echo $i."_li";?>" class="list-group-item list-group-item-info"><input class="form-control" id="<?php echo $i;?>" type='text' placeholder="Guideline" name="items[]" value="<?php echo $guid1[$i]; ?>" ><span style="position: absolute;right: 30px;top: 21px;cursor: pointer;" id="<?php echo $i."_delete";?>"  onclick="dele(this);" class="glyphicon glyphicon-remove-circle"></span></li>
                <?php 
                }
              }?>
            </ul><div class="form-group" id="container">
            <ul class="list-group">
           </ul>
           </div>
           </div>
          <div id='TextBoxesGroup'>
          <div id="TextBoxDiv1">
          <div class="form-group">
          <label>New Guide Lines </label>
          <input class="form-control" type='text' id='textbox1' placeholder="Guideline" >
          </div>
          </div>
          </div>
          
          <input type='button' id="question1" class="btn btn-lg btn-info" onclick="add();" value='Add Guidelines'>
          </div> 
           <div id="container">	
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
   	
   	html += '<li class="list-group-item list-group-item-success"><input type="text" class="form-control" name="items[]" value="'+ arr[i] +'" ></li>';
      // html += '<input class="form" type="text"  placeholder="Guideline" value="'+ arr[i] +'" >';
   }
   var con = document.getElementById('container');
   con.innerHTML = html;
}


$('#save').click(function()
{
$('#imagelodar').show();
var values = [];
$("input[name='items[]']").each(function() {
    values.push($(this).val());

});


 var data1 = {
    "id"                      : $("#id").val(), 
    "userid"                  : $("#userid").val(),
    "guidelines"              : JSON.stringify(values),
    "age_group"               : $("#agegroup").val(),
    "gender"                  : $("#gender").val(),
    "sport"                   : $("#sport").val()
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
                	//$('#imagelodar').hide();
                 window.location.href = url+"/forms/listguidelines?performance";
                }
            },
            close: function () {
            //	$('#imagelodar').hide();
             window.location.href = url+"/forms/listguidelines?performance";
            }
        }
    });  
      }
      else 
      {
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

});

function dele($this){
    //alert($this.id);
    var id = $this.id;
    var text_id = id.split("_");
    //alert(id[0]);
    $('#'+id[0]).attr('name', 'other_amount');
    $('#'+id[0]+"_li").hide();
}



// $('#resetPrompt').click(function(){
//     $('#input1').attr('name', 'other_amount');
// });



</script>