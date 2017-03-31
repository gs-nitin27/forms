<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Question
      </h1>
    </section>
         <section class="content"> 
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div> 
      <div class="row">
      <div class="col-md-12">
       <input type="hidden" name="database_id" id="database_id" value="<?php echo $id;?>">

          <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-body">
          <input type="hidden" name="questions_id" value="" id="questions_id">
          <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Gender: </b></h5>
          <div class="timeline-body">
          <input type="text" class="form-control" name="gender" id="gender" value="" disabled>
          </div>
          </div>
          <hr>
          <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Age Group: </b></h5>
          <div class="timeline-body">
            <input type="text" name="agegroup"  id="agegroup" class="form-control" value="" disabled>
          </div> 
          </div> 
          <hr>
          <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Sport : </b></h5>
          <div class="timeline-body">
        <input type="text" name="sport" class="form-control" id="sport" value="" disabled >
          </div>
          </div>
            </div>
          </div>
          </div>
         

       <div class="nav-tabs-custom">
       <ul class="nav nav-tabs" id="section">
      </ul> 
      <div class="tab-content"  id="tab-content" >
             
              
     </div>

    </div>  
</div>
</div>
</section>
<style type="text/css">
.nav-tabs-custom .container {
   padding: 0!important;
}
.nav-tabs-custom .container .header{
padding: 8px 15px;
   background-color: #5262bc;
   color: #fff;
   font-size: 18px;
}
.nav-tabs-custom .container .content{
padding-top:15px;
min-height: auto;
}
  .container {
    width:100%;
    border:1px solid #d3d3d3;
}
.container div {
    width:100%;
}
.container .header {
    background-color:#d3d3d3;
    padding: 2px;
    cursor: pointer;
    font-weight: bold;
}
.container .content {
    display: none;
    padding : 5px;
    background-color: #ffffff;
    color: #272822; 
}
</style>
</div>

<script type="text/javascript">

var sec_increment = 0;
var sub_sec_increment = 0;
var Nsection = "";
var question_data ="";
var section_data = "";

function displaydata()
{
  sec_increment = sec_increment+1;
  var data1 = {
    "id"           : $("#database_id").val()
   };

var url = '<?php echo site_url();?>'
var data = eval(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/getQuestions_data'); ?>',
    data: data,
    dataType: "JSON",
    success: function(result) {
      question_data=result;
      $("#questions_id").val(question_data['id']);
      $("#gender").val(question_data['gender']);
      $("#sport").val(question_data['sport']);
      $("#agegroup").val(question_data['age_group']);
      var questions = question_data['question'];
      section_data = questions;
      var que   = $.parseJSON(questions);
      var count = 1;
      var sub = 0;
      $.each(que, function(i,l)
      { 
          Nsection += i +",";
          if(sec_increment == 1)
          {
          if(count == 1)
          {
          $('<li class="active"><a href="#'+i+'" data-toggle="tab" id="'+count+'" >'+ i +'</a></li>', {html: i}).appendTo('ul'+"#section");
          count = count+1;
          }
          else
          {
          $('<li><a href="#'+i+'" data-toggle="tab" id="'+count+'">'+i+'</a></li>', {html: i}).appendTo('ul'+"#section");
          count = count + 1;
          }
          }

   if(sec_increment == 1){
    var div = document.createElement('div');
    div.className = 'tab-pane';
    div.id = i;
    div.innerHTML = '<div class="box-header with-border"></div><div class="box-body">';

    document.getElementById('tab-content').appendChild(div);
     }
          var subsec =JSON.stringify(l);
          var subsect = JSON.parse(subsec);
          $.each(subsect , function(x,y)
          {
         if(sec_increment ==1) 
         {
           var div1 = document.createElement('div');
           div1.className = 'container';
           div1.innerHTML = '<div class="header" "><span>'+x+'</span><button class="btn btn-success btn-xs" data-title="Delete" id="'+x+"_d"+'" onclick="divto(this);" ><span class="glyphicon glyphicon-edit"></span></button><div class="content" id="'+x+"_div"+'"><ul id='+ x +'>';
           document.getElementById(i).appendChild(div1);
         }
           var ques = JSON.stringify(y);
           var quest = JSON.parse(ques);
           var did =  i+"_"+x;
           var arr =  i+"_"+x+"in";
           $('#'+x).empty();
           var del = 0;
           $.each(quest , function(a,b)
           {
              var div2 = document.createElement('div');
              div2.className = 'form-group';
              div2.innerHTML = ' <li><button class="btn btn-danger btn-xs" data-title="Delete" id="'+did+"_"+del+'" onclick="Ndel(this);" ><span class="glyphicon glyphicon-trash"></span></button>'+b+'</li>';
              document.getElementById(x).appendChild(div2);
              del++;
           });
              var div3 = document.createElement('div');
               //div3.className = 'row';
              div3.innerHTML = '</ul></div><div class="box-footer"><input type="text" name="arr" class="form-control" id="'+arr+'" ><br><input type="button" class="btn btn-lg btn-primary" name="Add" id="'+did+'" onclick="addN(this);" value="Add"  ></div>';
              document.getElementById(x).appendChild(div3);
           
            //alert(sec_increment);  
          // var temp = document.createElement('div');
          // temp.className = 'box-footer';
          // temp.innerHTML = '<input type="text" name="arr" class="form-control" id="'+arr+'" ><br><input type="button" class="btn btn-lg btn-primary" name="Add" id="'+did+'" onclick="addN(this);" value="Add"  >';
          //  document.getElementById(i).appendChild(temp);
          if(sec_increment ==1)
          {  
              var div5 = document.createElement('div');
               //div3.className = 'row';
              div5.innerHTML = '</div></div>';
              document.getElementById(x).appendChild(div5);
             }         
          });
          if(sec_increment ==1)
          {
            var div4 = document.createElement('div');
            div4.innerHTML = '</div></div>';
            document.getElementById('tab-content').appendChild(div4);
             // sec_increment = sec_increment+1;
           }
     });
       //alert(Nsection);
    if(sec_increment ==1){
     var sec = Nsection.split(',');
   //  alert(sec[0]);
     $("#"+sec[0]).addClass('active');
      }
}
});
}    

function divto($this)
{
       var id = $this.id;
       // $("#"+id+"iv").toggle();
        $("#"+id+"iv").slideToggle(500, function () {
         });
}

// $(".header").click(function () {
//    alert("hii");

//     $header = $(this);
//     //getting the next element
//     $content = $header.next();
//     //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
//     $content.slideToggle(500, function () {
        
//     });

// });


function Ndel($this)
{
  var did = $this.id;
  var testing = [];
  var index = did.split("_");
  var test = index[0];
  var test1 = index[1];
  var del_id = index[2];
  var nttr   = $.parseJSON(section_data);
  $.each(nttr, function(i,l)
  {
 var nt =JSON.stringify(l);
 var ntr = JSON.parse(nt);
 if( i == test)
 {
   $.each(ntr, function(x,y)
   {
   var tem1 = JSON.stringify(y);
   var temp1 = JSON.parse(tem1);
   if(x == test1)
    { 
      var array_count = 0;
      $.each(temp1, function(m,n)
      { 
         if(array_count == del_id){
         }else{
         var newt = JSON.stringify(n);
         var newtt = JSON.parse(newt);
         testing.push(newtt);
       }
       array_count++;
     });
          nttr[i][x]= testing;
          var  finalarray = JSON.stringify(nttr);
          save(finalarray);
    }else{
    }
    });
 }
 else
 {
 }
});
}

function addN($this)
{
  var sid = $this.id;
  var input_id = sid +"in";
  var testing = [];
  var index = sid.split("_");
  var test = index[0];
  var test1 = index[1];
  var nttr   = $.parseJSON(section_data);
$.each(nttr, function(i,l)
{
 var nt =JSON.stringify(l);
 var ntr = JSON.parse(nt);
 if( i == test)
 {
   $.each(ntr, function(x,y)
   {
   var tem1 = JSON.stringify(y);
   var temp1 = JSON.parse(tem1);
   if(x == test1)
    { 
      $.each(temp1, function(m,n)
     { 
         var newt = JSON.stringify(n);
         var newtt = JSON.parse(newt);
         testing.push(newtt);
     });
       testing.push($("#"+input_id).val());
       $("#"+input_id).val('');
          nttr[i][x]= testing;
          var  finalarray = JSON.stringify(nttr);
          save(finalarray);
    }else{
    }
    });
 }
 else
 {
 }
});
}
function save(at)
{   
   var data1 = {
    "id"           : $("#questions_id").val(),
    "question"     : at
   };
var string_userid = $("#string_userid").val();
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);//JSON.stringify(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/updatequestion'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
    $('#imagelodar').hide();
     displaydata();   
    }
});
}
 $(document).ready(function()
 {
   displaydata();
 }); 
</script>