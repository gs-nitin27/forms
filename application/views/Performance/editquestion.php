<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Question
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Sub-Section</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
          <label for="sub_section" class="control-label">Sub-Section</label>
          <input type="text" placeholder="Sub-Section" class="form-control" id="sub_section">
          <input type="hidden"  class="form-control" id="newsub_section">
          </div>
         <!--  <div class="form-group">
          <label for="qustn" class="control-label">Question</label> -->
          <div id='TextBoxesGroup'>
          <div id="TextBoxDiv1">
          <div class="form-group">
          <label>Question </label>
          <input class="form-control" type='text' id='textbox1' placeholder="Question" >
          </div>
          </div>
          </div>
          <div id="container"></div>
          <input type='button' id="question1" class="btn btn-lg btn-info" onclick="add();" value='Add Question'>
          </div>

          <script type="text/javascript">
            var id ="";
             var qu_array = [];
             var new_sub = {};
             var new_sec = {};

            function sub($this)
            {
                id = $this.id;
                $("#newsub_section").val(id);
            }
            function add() 
             {
             if(!$("#textbox1").val())
             {
              alert("please insert question !");
              return ;
             }
             var inp = document.getElementById('textbox1');
             qu_array.push(inp.value);
             inp.value = '';
             show();
             }
            function show() 
            {
               var html = '';
               for (var i=0; i<qu_array.length; i++) 
               {
                html += '<div>' + qu_array[i] + '</div>';
               }
               var con = document.getElementById('container');
               con.innerHTML = html;
            }
           
           function save_newsection()
           {
             $('#imagelodar').show();
             var sub = $("#newsub_section").val();
             var nsub = $("#sub_section").val();
             var index = sub.split("_");
             var newsub   = $.parseJSON(section_data);

              $.each(newsub, function(i,l)
              {
               var nt =JSON.stringify(l);
               var ntr = JSON.parse(nt);
               if( i == index[0])
               {     
                 $.each(ntr, function(x,y)
                 {
                    var tem1 = JSON.stringify(y);
                     new_sec[x] =y;
                  });
                
                new_sec[nsub]=qu_array;
                var addsec = JSON.stringify(new_sec);
                newsub[i] =new_sec;
                
               }
               else
               {
               }
              });
              savesubsection(JSON.stringify(newsub));
           }
        </script>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="save_newsection();" class="btn btn-primary" data-dismiss="modal">Create   </button>
        </div>
       </div> 
    </div>
  </div>
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

// console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/getQuestions_data'); ?>',
    data: data,
    dataType: "JSON",
    success: function(result) {
      $('#imagelodar').hide();
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


    var de = document.createElement('div');
    de.style = 'text-align:center';
    de.innerHTML ='<button  type="button" id="'+i+"_addsection"+'" onclick="sub(this);" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add New Sub-Section</button>';
    document.getElementById(i).appendChild(de);
     }


          var subsec =JSON.stringify(l);
          var subsect = JSON.parse(subsec);
          $.each(subsect , function(x,y)
          {
          if(sec_increment ==1) 
           {
           var div1 = document.createElement('div');
           div1.className = 'container';
           div1.innerHTML = '<div class="header"><span>'+x+'</span><button style="float:right!important;" class="btn btn-default btn-xs" data-title="Delete" id="'+i+"_"+x+"_del"+'" onclick="subsecdelete(this);" ><span class="glyphicon glyphicon-remove"></span></button><button style="float:right!important;margin-right: 5px;" class="btn btn-default btn-xs" data-title="Edit" id="'+i+x+"_d"+'" onclick="divto(this);" ><span class="glyphicon glyphicon-edit"></span></button><div class="content" id="'+i+x+"_div"+'"><ul id='+x+i+'>';
           document.getElementById(i).appendChild(div1);
         }
           var ques = JSON.stringify(y);
           var quest = JSON.parse(ques);
           var did =  i+"_"+x;
           var arr =  i+"_"+x+"_in";
           $('#'+x+i).empty();
           var del = 0;

           $.each(quest , function(a,b)
           {
             // alert(x+"_"+b);
            //  alert(b);
              var div2 = document.createElement('div');
              div2.className = 'form-group';
              div2.innerHTML = ' <li>'+b+'<button style="float:right!important;"  class="btn btn-danger btn-xs" data-title="Delete" id="'+did+"_"+del+'" onclick="Ndel(this);" ><span class="glyphicon glyphicon-trash"></span></button></li>';
              document.getElementById(x+i).appendChild(div2);
              del++;
           });

            
              var div3 = document.createElement('div');
               //div3.className = 'row';
              div3.innerHTML = '</ul></div><div class="box-footer"><input type="text" name="arr" class="form-control" id="'+arr+'" ><br><input type="button" class="btn btn-lg btn-primary" name="Add" id="'+did+'" onclick="addN(this);" value="Add"  ></div>';
              document.getElementById(x+i).appendChild(div3);
       
           
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
              document.getElementById(x+i).appendChild(div5);
             }         
              });
          if(sec_increment ==1)
          {
            var div4 = document.createElement('div');
            div4.innerHTML = '</div></div>';
            document.getElementById('tab-content').appendChild(div4);
           }
     });
    if(sec_increment ==1){
     var sec = Nsection.split(',');
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


function subsecdelete($this)
{
            $('#imagelodar').show();
             var new_sec = {};
             var sub = $this.id;
             var nsub = $("#sub_section").val();
             var index = sub.split("_");
             var newsub   = $.parseJSON(section_data);
              $.each(newsub, function(i,l)
              {
               var nt =JSON.stringify(l);
               var ntr = JSON.parse(nt);
               if( i == index[0])
               {     
                 $.each(ntr, function(x,y)
                 {
                    if(x == index[1])
                    {
                    }else
                    {
                      var tem1 = JSON.stringify(y);
                      new_sec[x] =y;  
                    }
                  });
                   newsub[i] =new_sec;
               }
               else
               {
               }
              });
             savesubsection(JSON.stringify(newsub));
}

function Ndel($this)
{
  $('#imagelodar').show();
  var did = $this.id;
  var testing = [];
  var index =   did.split("_");
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
  $('#imagelodar').show();
  var sid = $this.id;
  var input_id = sid +"_in";
  var testing = [];
  var index = sid.split("_");
  var test = index[0];
  var test1 = index[1];
  if(!$("#"+input_id).val())
  {
      alert("Please Enter Question !");
      $('#imagelodar').hide();
      return ;
  }
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
 $('#imagelodar').show();
   var data1 = {
    "id"           : $("#questions_id").val(),
    "question"     : at
   };
var string_userid = $("#string_userid").val();
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);
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

function savesubsection(at)
{   
   $('#imagelodar').show();
   var data1 = {
    "id"           : $("#questions_id").val(),
    "question"     : at
   };
var string_userid = $("#string_userid").val();
console.log(JSON.stringify(data1));
var url = '<?php echo site_url();?>'
var data = eval(data1);
  $.ajax({
    type: "POST",
    url: '<?php echo site_url('forms/updatequestion'); ?>',
    data: data,
    dataType: "text",
    success: function(result) {
    $('#imagelodar').hide();
    var list = {0: "a",  1: "b", 2 :"c" , 3 : "d", 4:"e", 5:"f", 6:"g", 7:"h", 8:"i" ,9 : "j"};
                var temp='';
                var number = $("#questions_id").val(), output = [], sNumber = number.toString();
                for (var i = 0, len = sNumber.length; i < len; i += 1)
                 {
                    output.push(+sNumber.charAt(i)); 
                    for (x in list) 
                       {     
                        if(x == output[i])
                         {
                          temp += list[x];
                           }
                          }
                          }
     window.location.href = url+"/forms/editquestion/"+temp +"?performance";
    }
});
}
 $(document).ready(function()
 {
   displaydata();
 }); 
</script>
