
<script>
//document.domain = "getsporty.in";
$(document).ready(function(){
 

   
$('#save').click(function(){

var data = {

    "id"                       :"",
    "event"                    : $("#event").val(),
    "tournament"                : $("#tournament").val(),
    "job"                      : $("#job").val(), 
    "resources"                : $("#resources").val(), 
    "content"                  : $("#content").val(),
    "usermenu"                 : $("#usermenu").val()
};

console.log(JSON.stringify(data));
var data = JSON.stringify(data);
  $.ajax({

    type: "POST",

    url: '<?php echo site_url('forms/saveuserModule'); ?>',
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



</script>  
  <div class="content-wrapper">
         <section class="content"> 
      <div class="row">
    <div class="col-md-6">
    <div class=" alert alert-success" id="msgdiv" style="display:none">
      <strong>Info! <span id = "msg"></span></strong> 
    </div>
 </section>
       <section class="content"> 
       
  <form >
    
  <div class="container">
  <div class="dropdown" style="margin-top:-150px; margin-left: 60px">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">User Type
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#">Super User</a></li>
      <li><a href="#">User</a></li>
      
    </ul>
  </div>

      <div class="row text-center" style="margin-left:-300px ;margin-top:70px">
       
        <label for="event" class="btn btn-default">Event  <input type="checkbox" id="event" class="badgebox" value="1" checked><span class="badge">&check;</span></label>

        <label for="tournament" class="btn btn-primary">Tournament  <input type="checkbox" id="tournament" class="badgebox" value="1" checked><span class="badge">&check;</span></label>

        <label for="job" class="btn btn-info">job <input type="checkbox" id="job" class="badgebox" value="1" checked><span class="badge" >&check;</span></label>
        
        <label for="resources" class="btn btn-success">Resources <input type="checkbox" id="resources" class="badgebox" value="1" checked><span class="badge">&check;</span></label>
       
        <label for="content" class="btn btn-warning">Content <input type="checkbox" id="content" class="badgebox" value="0"><span class="badge">&check;</span></label>
        
       <!--  <label for="usermenu" class="btn btn-danger">User Menu <input type="checkbox" id="usermenu" class="badgebox" value="6"><span class="badge">&check;</span></label> -->
  
  </div>
 

  <button type="button" class="btn btn-success" id="save" style="margin-top:120px;margin-left: 400px">Save</button>
</div>
  </form>
      
          </div>
    </div>
</section>
</div>

<script type="text/javascript">

    $('#tournament').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#tournament").val(1);
               val=1;
            
        }
        else {
          var val=$("#tournament").val(0);
               val=0;
            
        }
    });
     $('#job').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#job").val(1);
               val=1;
            
        }
        else {
          var val=$("#job").val(0);
               val=0;
            
        }
    });

      $('#event').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#event").val(1);
               val=1;
            
        }
        else {
          var val=$("#event").val(0);
               val=0;
            
        }
    });
       $('#resources').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#resources").val(1);
               val=1;
           
        }
        else {
          var val=$("#resources").val(0);
               val=0;
           
        }
    });

        $('#content').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#content").val(1);
               val=1;
            
        }
        else {
          var val=$("#content").val(0);
               val=0;
           
        }
    });

        $('#usermenu').change(function() {
        if ($(this).prop('checked')) {
            var val=$("#usermenu").val(1);
               val=1;
                   }
        else {
          var val=$("#usermenu").val(0);
               val=0;
            
        }
    });
</script>
