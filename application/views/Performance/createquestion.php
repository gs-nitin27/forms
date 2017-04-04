<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="http://static.jquery.com/ui/css/demo-docs-theme/ui.theme.css" type="text/ css" media="all" />
<style>
            /* Autocomplete
            ----------------------------------*/
            .ui-autocomplete { position: absolute; cursor: default; }   
           /* .ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/
  
            /* workarounds */
            * html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */
  
            /* Menu
            ----------------------------------*/
            .ui-menu {
                list-style:none;
                padding: 2px;
                margin: 0;
                display:block;
            }
            .ui-menu .ui-menu {
                margin-top: -3px;
            }
            .ui-menu .ui-menu-item {
                margin:0;
                padding: 0;
                zoom: 1;
                float: left;
                clear: left;
                width: 100%;
                font-size:80%;
            }
            .ui-menu .ui-menu-item a {
                text-decoration:none;
                display:block;
                padding:.2em .4em;
                line-height:1.5;
                zoom:1;
            }
            .ui-menu .ui-menu-item a.ui-state-hover,
            .ui-menu .ui-menu-item a.ui-state-active {
                font-weight: normal;
                margin: -1px;
            }
        </style>
<script>
function save()
{
$('#imagelodar').show();

//alert($("#nsectonv").val());
// var gender_v = $("#gender").val();
// var gender_value ;
// if(gender_v == 'm')
// {
//   gender_value = "Male";
// }
// else if(gender_v == 'f')
// {
//   gender_value = 'Female';
// } 

var data1 = {
    "id"                      : $("#idcode").val(), 
    "userid"                  : $("#userid").val(),
    "question"                : $("#nsectonv").val(),
    "age_group"               : $("#agegroup_value").val(),
    "gender"                  : $("#gender").val(),
   	"sport"                   : $("#sports_name").val(),
    "proffession"             : 3
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
                 window.location.href = url+"/forms/getquestion?performance";
                }
            },
            close: function () {
             window.location.href = url+"/forms/getquestion?performance";
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

                  <div class="form-group">
                  <label for="section">section</label>
                  <select id="section" class="form-control" name="section">
                  </select>
                  </div>


                <div class="form-group">
                <label for="Subsection1">Sub Section</label>
                <input type="text" class="form-control" name="Subsection1" id="Subsection1" placeholder="Enter Sub Section" >
                <label id="location_error" hidden="">A location is required</label>
                </div>

                <div id='TextBoxesGroup'>
                <div id="TextBoxDiv1">
                <div class="form-group">
               <label>Question </label><input class="form-control" type='text' id='textbox1' placeholder="Question" >
               </div>
               </div>
               </div>
               <div id="container"></div>
              <!-- <input type="button" onclick="add();" value="add" /> -->

              <input type='button' id="question1" class="btn btn-lg btn-info" onclick="add();" value='Add Question'>

              <input type='button' id="Sub_Section1" class="btn btn-lg btn-success" onclick="addsection();" value='Add Sub-Section' >
              <input type='button' id="addsubsection1" class="btn btn-lg btn-success" onclick="addNewsection();" value='Add Section'>

               <input type='button' id="saveAlldata1" class="btn btn-lg btn-danger" onclick="savedata();" value='Save Data'>


              <!-- <input type="button" id="saveAlldata1" name="saveAlldata" class="=btn btn-lg btn-danger" onclick="savedata();" value="Save Data" disabled=""> -->
              
              <!-- <input type="button" class="btn btn-lg btn-danger" onclick="show();" value="show" /> -->

              <input type="hidden" class="form-control" name="test" value="" id="ntest">
              <input type="hidden" class="form-control" name="ntext" value="" id="ntest1">
              <input type="hidden" name="nsectonv" class="form-control" id="nsectonv" value=""> 

<!-- <input type='button' class="btn btn-lg btn-info" value='Add Section' id='addButton1'>
<input type='button' class="btn btn-lg btn-danger" value='Remove Section' id='removeButton1'>
<input type='button' class="btn btn-lg btn-success" value='Save Section' id='getButtonValue1'>
 -->

<!-- <script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton1").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);


// <input type="button" class="btn btn-lg btn-info" value="Add Question" id="addButton'+ counter +'"><input type="button" class="btn btn-lg btn-danger" value="Remove Question" id="removeButton'+ counter +'"><input type="button" class="btn btn-lg btn-success" value="Save Question" id="getButtonValue'+ counter +'">

  newTextBoxDiv.after().html('<div class="form-group"><label for="Subsection1">Sub Section</label><input type="text" class="form-control" name="Subsection1" id="Subsection1" placeholder="Enter Sub Section"><div class="form-group"><label>Question #'+ counter + ' : </label>' +
        '<input class="form-control"  type="text" name="textbox' + counter +
        '" id="textbox' + counter + '" value="" placeholder="Question" ></div>');

  newTextBoxDiv.appendTo("#sectionid");
  counter++;
     });
     $("#removeButton1").click(function () {
  if(counter==1){
          alert("No more textbox to remove");
          return false;
       }
  counter--;
        $("#TextBoxDiv" + counter).remove();
     });
     $("#getButtonValue1").click(function () {
  var msg = [];
  for(i=1; i<counter; i++){
      msg[i-1]= "\n Question #" + i + " : " + $('#textbox' + i).val();
   
   }
        console.log(JSON.stringify(msg));
        //var tdata = JSON.stringify(msg);
            var ndata = {};
            ndata["Subsection"] = $("#Subsection1").val();
            ndata["Question"] =  msg;
            var tdata = JSON.stringify(ndata);
            alert(tdata);
            $("#ntdata").val(tdata);  
     });
  });
</script> -->


<!-- 
  <div class="form-group">
       
  <br><br><button type="button" class="btn btn btn-success" id="comm">Add Question</button> 

</div>
<div id="email"></div>  
<br>    
<button type="button" class="btn btn btn-info" id="send" name="commit"><b>Save</b></button> 
    
<textarea style="width:100%; height:400px" id="output"></textarea>  
<script>
var i = 0;

$(document).on('click','.delete', function(e) {
   $(this).closest('.form-group').remove();//remove --i;
  console.log('removed');
});


$('#comm').click(function(){
if (i <=10){  
$('<div class="form-group" id="email"><input type="email" class="form-control" name="email1" placeholder="Question" value="" id="email1" data-name="emailAdd" /><br><input type="text" class="form-control" name="email2" placeholder="Question rating" value="" id="email2" data-name="emailDesc"/><br><button type="button" class="btn btn btn-danger" id="minusButton">delete</button></div>').appendTo('#email');
i++; }

});


$(function () 
{ 
    $(document).on('click', '#send', function (e) {
        var dataGroup = [];
        $('.form-group').each(function () {
            var emailData = {};
            $(this).find(':input[data-name]').each(function () {
                emailData[$(this).data('name')] = $(this).val();
            });
            dataGroup.push(emailData);
        });      
        
               $('#output').val(JSON.stringify(dataGroup))
    });

})
</script>
 -->
                <!-- <div class="form-group">
                <div class="input_fields_wrap">
                <label for="exampleInputEmail1">Question</label>
                <div><input type="text" class="form-control" name="mytext[]"></div>
                <button class="add_field_button">Add More Question</button>
                </div>
                </div> -->

               <!--  <input type="text" class="form-control" name="ntdata" id="ntdata" placeholder="Enter Question"> -->
                  
               <!--  <div class="form-group">
                <label for="exampleInputEmail1">Question</label>
                <input type="text" class="form-control" name="question" id="question" placeholder="Enter Question">
                <label id="question_error" hidden>question is required.</label>
                </div> -->
                
              <!--   <div class="form-group">
                  <?php// $profession = $this->register->getprofession();
             ?>
                <label for="proffession" >Profession</label>
                <select id="proffession" class="form-control" name="proffession">
                <option>-select-</option>
                <?php// if(!empty($profession)){
                     // foreach($profession as $prof)
                     // {
                	   //   ?>
                 <option value="<?php// echo $prof['profession'];?>"><?php //echo $prof['profession']?></option>
                 <?php// } }
                 ?>    
                </select>
                <label id="proffession_error" hidden>Profession is required</label>	
                </div> -->
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
 
  var cheak_section = [];
  var arr = [];
  var section = {};
  var nsection = {};

  function add() 
  {
   if(!$("#textbox1").val())
   {
      alert("please insert question !");
      return ;
   }

   var inp = document.getElementById('textbox1');
   arr.push(inp.value);
   inp.value = '';
   show();

      $("#saveAlldata1").hide();
      $("#addsubsection1").hide();

      $("#addsubsection1").hide();
      $("#Sub_Section1").show();
}

function show() 
{
   var html = '';
   for (var i=0; i<arr.length; i++) {
      html += '<div>' + arr[i] + '</div>';
   }
   var con = document.getElementById('container');
   con.innerHTML = html;
   $("#ntest").val(arr);
}


function addsection()
{
    var subsection = $("#Subsection1").val();
     for (var i=0; i<section.length; i++) 
     { }
      section[subsection]= arr;
      arr = [];
       
        var sectionvalue = JSON.stringify(section);
       $("#ntest1").val(sectionvalue);

       //alert(JSON.stringify(section));
       $("#Subsection1").val("");

       $("#addsubsection1").show();

       $("#saveAlldata1").show();


       $("#Sub_Section1").show();
}

function addNewsection()
{
       var section_v = $("#section").val();
       if(cheak_section == "")
       {
        cheak_section.push(section_v);
        }
        else
        {
         for(var k= 0; k<cheak_section.length; k++)
          {  
            if(cheak_section[k] == section_v)
            {
                  alert("Please Change Section created");
                  return 0;

            }
          }
          cheak_section.push(section_v);
    }

   

   for(var i= 0; i<nsection.length;i++)
   {       
   }
    nsection[section_v] = section;
    section = {};

     var nsectionvalue = JSON.stringify(nsection);
     $("#nsectonv").val(nsectionvalue);
     $("#addsubsection1").hide();
     $("#Sub_Section1").hide();
     $("#saveAlldata1").hide();
}

function savedata()
{


   var section_v = $("#section").val();

       for(var k= 0; k<cheak_section.length; k++)
          {  
            if(cheak_section[k] == section_v)
            {
                  alert("Please Change Section(This section is already selected!)");
                  return 0;

            }
          }

   for(var i= 0; i<nsection.length;i++)
   {

   }
    nsection[section_v] = section;
    section = {};

     var nsectionvalue = JSON.stringify(nsection);
     $("#nsectonv").val(nsectionvalue);
    // alert(nsectionvalue);

      // $("#question1").prop('hide', true);
      // $("#Sub_Section1").prop('hidden', true);
      // 
      $("#saveAlldata1").hide();
      $("#addsubsection1").hide();
      $("#question1").hide();
      $("#Sub_Section1").hide();
      $("#save").show();

}

//$("#section").focus

</script>


<!-- <script type="text/javascript">
$(document).ready(function(){
  var counter = 2;
   // var i=1;
  //  var id = "#addButton"+ i;
    $("#addButton").click(function () {

   if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html(' <div class="form-group"><label>Question #'+ counter + ' : </label>' +
        '<input class="form-control"  type="text" name="textbox' + counter +
        '" id="textbox' + counter + '" value="" placeholder="Question" ></div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup");


  counter++;
     });

     $("#removeButton").click(function () {
  if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

  counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

  var msg = [];
  for(i=1; i<counter; i++){
      msg[i-1]= "\n Question #" + i + " : " + $('#textbox' + i).val();
   
   }
        console.log(JSON.stringify(msg));
        //var tdata = JSON.stringify(msg);

            var ndata = {};
            ndata["Subsection"] = $("#Subsection1").val();
            ndata["Question"] =  msg;
            var tdata = JSON.stringify(ndata);

            //alert(tdata);

            $("#ntdata").val(tdata);
              
     });
  });
</script> -->

<script>
$("#sport").change(function()
 {          
              var myArray = $("#sport").val().split(","); 
              var age = $("#agegroup").val().split(","); 

              $("#agegroup_value").val(age[0]);
              $("#sports_name").val(myArray[0]);

              var code = myArray[1] + age[1];

              $("#idcode").val(code);

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
                     //alert(data);
                     if(!data)
                     {
                      $.confirm({
                              title: 'Sorry!',
                              content: 'Analytics is not created.',
                              type: 'red',
                              icon: 'fa fa-warning',
                              typeAnimated: true,
                              animationSpeed: 1500,
                              animationBounce: 3,
                             
                              buttons: {
                                  tryAgain: {
                                      text: 'Thank You !',
                                      btnClass: 'btn-red',
                                      action: function(){
                                      }
                                  },
                                  close: function () {
                                  }
                              }
                          });
                      }
                      else 
                      {
                        var sec = [];
                        sec.push("<ul>");
                        for(i in data)
                         {
                          sec.push("<li>"+data[i]+"</li><br>");
                         }
                        sec.push("</ul>");
                        $.confirm({
                                title: 'Analytics is created. ',
                                content: sec,
                                type: 'green',
                                typeAnimated: true,
                                animationSpeed: 1500,
                                animationBounce: 3,
                               
                                buttons: {
                                    tryAgain: {
                                        text: 'Choose Section For Create Question  !',
                                        btnClass: 'btn-green',
                                        action: function(){
                                         $("#gender").prop('disabled',true);
                                         $("#agegroup").prop('disabled',true);
                                         $("#sport").prop('disabled',true);
                                         //alert(JSON.stringify(data));
                                         $('#section').find('option').remove(); 
                                         $("#section").append('<option selected>-Select-</option>');
                                         for(i in data)   
                                         $("#section").append("<option value=\""+data[i]+"\">"+data[i]+"</option>");
                                        }
                                    },
                                    close: function () {
                                     $("#gender").prop('disabled',true);
                                     $("#agegroup").prop('disabled',true);
                                     $("#sport").prop('disabled',true);
                                     //alert(JSON.stringify(data));
                                     $('#section').find('option').remove(); 
                                     $("#section").append('<option selected>-Select-</option>');
                                     for(i in data)   
                                     $("#section").append("<option value=\""+data[i]+"\">"+data[i]+"</option>");
                                    }
                                }
                            });
                      } 
                } 
            });
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

        $(this).ready( function() {
            $("#Subsection").autocomplete({
                minLength: 1,

                source: 
                function(req, add){
                    $.ajax({
                        url: "<?php echo site_url('forms/subsection'); ?>",
                        dataType: 'json',
                        type: 'POST',
                        data: req,
                        success:    
                        function(data){
                            if(data.response =="true"){
                                add(data.message);
                            }
                            else
                            {
                             // alert("Choose Currect City Name");
                              //$("#rlocation").val("");
                            }
                        },
                    });
                }
                
            });
        });

     $('#save').click(function()
     {

     	//alert("hii");
       //  var question = $('#question').val();
       //  if(question == "")
       //  {
       //    $("#question_error").show();
       //    $("#question_error").css('color', 'red');
       //  }
       //  else{
       //    $("#question_error").hide(); 
       //  }
      
      
       //  var age_group = $('#age_group').val();
       //  if(age_group == "")
       //  {
       //    $("#age_group_error").show();
       //    $("#age_group_error").css('color', 'red');
       //  }
       //  else{
       //    $("#age_group_error").hide(); 
       //  }
       //  var gender = $('#gender').val();
       //  if(gender == "")
       //  {
       //    $("#gender_error").show();
       //    $("#gender_error").css('color', 'red');
       //  }
       //  else{
       //    $("#gender_error").hide(); 
       //  }
       //  var proffession = $('#proffession').val();
       //  if(proffession == "-select-")
       //  {
       //    $("#proffession_error").show();
       //    $("#proffession_error").css('color', 'red');
       //  }
       //  else{
       //    $("#proffession_error").hide(); 
       //  }
       // if(question!="" && age_group!="" && level!="" && gender!="" &&proffession!="-select-"){
          save();
       // }
    });

   $(document).ready(function() 
  {
      $("#saveAlldata1").hide();
      $("#addsubsection1").hide();
      $("#question1").show();
      $("#Sub_Section1").hide();
      $("#save").hide();

   
  });

  </script>


