
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 <section class="content-header">
      <h1>
        View Event
       <?php $user = $this->session->userdata('item'); 
           if($user['userType'] == 101 || $user['userType'] == 102)
           {
       ?>

        <a id="btnbbb" href="#" class="btn bg-navy btn-flat margin" data-toggle="modal" data-target="#myModal">Error Log</a>
        <?php } ?>
      </h1>
     
    </section>
         <section class="content"> 
          <div class="loading" id="imagelodar" hidden="">Loading&#8230;</div>
      <div class="row">
	  
		<div class="col-md-8">
				
			<?php $event = $this->register->getEventInfo($id); 
			//print_r($event);
				if(!empty($event)){
					
					$event = $event[0];
				}
				
			?>
			
			<div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_event" data-toggle="tab">Event </a></li>
              <li><a href="#tab_organiser" data-toggle="tab">Organiser</a></li>
              <li><a href="#tab_eligible" data-toggle="tab">Eligibility</a></li>
             </ul> 	 
             <form role="form" action="" class="register">  
            <div class="tab-content">
              <div class="tab-pane active" id="tab_event">
			   <div class="box-header with-border">
                <h4>Job Details:</h4 > 	
				</div>
                <div class="box-body">
					<div class="timeline-item">
					    <input type="hidden" name="userid" id="userid" value="<?php echo $event['userid'];?>">
						<h5 class="timeline-header no-border"><b>Event Title: </b> &nbsp;<?php echo ucfirst($event['name']);?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header"><b href="#">Event Description: </b></h5>

						<div class="timeline-body">
						  <?php echo $event['description'];?>
						</div>
					   
					  </div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Event Type: </b> &nbsp;<?php echo $event['type'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Sports: </b> &nbsp;<?php echo $event['sport_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $event['address_1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $event['address_2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $event['location'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>State: </b> &nbsp;<?php echo $event['state'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $event['PIN'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Event Link: </b> &nbsp;<?php echo $event['event_links'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Start Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['start_date']));?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>End Date: </b> &nbsp;<?php echo @date('d-m-Y', strtotime($event['end_date']));?></h5>
					</div>
					<!-- STATE IS ID BASED -->
					
					
              </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_organiser">
			   <div class="box-header with-border">
                <h4>Organisation Details:</h4> 	
			  </div>
                <div class="box-body">
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Organiser Name: </b> &nbsp;<?php echo $event['organizer_name'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Email: </b> &nbsp;<?php echo $event['email_app_collection'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Contact No.: </b> &nbsp;<?php echo $event['mobile'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line1: </b> &nbsp;<?php echo $event['organizer_address_line1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Address Line2: </b> &nbsp;<?php echo $event['organizer_address_line2'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>City: </b> &nbsp;<?php echo $event['organizer_city'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>State: </b> &nbsp;<?php echo $event['organizer_state'];?></h5>
					</div>
					<div class="timeline-item">
					<h5 class="timeline-header no-border"><b>Pin: </b> &nbsp;<?php echo $event['organizer_pin'];?></h5>
					</div>
				</div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_eligible">
			  <div class="box-header with-border">
                <h4>Requirements:</h4> 	
			</div>
                <div class="box-body">
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Criteria 1: </b> &nbsp;<?php echo $event['eligibility1']." Years";?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Criteria 2: </b> &nbsp;<?php echo $event['eligibility2'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Entry Start Date: </b> &nbsp;<?php echo $event['entry_start_date'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>Entry End Date: </b> &nbsp;<?php echo $event['entry_end_date'];?></h5>
					</div>
					
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>T & C 1: </b> &nbsp;<?php echo $event['terms_cond1'];?></h5>
					</div>
					<div class="timeline-item">
						<h5 class="timeline-header no-border"><b>T & C 2: </b> &nbsp;<?php echo $event['terms_cond2'];?></h5>
					</div>
				</div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
			
			
          </div>
	  </div>
	  <div class="col-md-4">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
               <?php if($event['image']) { ?>
		   <img style="display:block; border:2px"; width="325px" height="225px" src = "<?php  echo base_url()."uploads/event/".$event['image']; ?>">
            <?php } else { ?>
		   <img style="display:block; border:2px"; width="325px" height="225px" src = "<?php  echo base_url('img/no-image.jpg');?>">
          <?php } ?>	
            </div>
          </div>
          </div>
</div>
</div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="    width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Mobile View</h4>
      </div>
      <div class="modal-body">
         <div id="container">
            <ul class="list-group">
            </ul>
          </div>
          <div id='TextBoxesGroup'>
          <div id="TextBoxDiv1">
          <div class="form-group">
          <label>Event Bug List </label>
          <textarea class="form-control" type='textarea' id='textbox1' placeholder="Guideline" ></textarea>
          </div>
          </div>
          </div>
          <input type='button' id="question1" class="btn btn-lg btn-info" onclick="add();" value='Add Bug'>
         <div class="modal-footer">
          <input type='button' id="sendMail" class="btn btn-lg btn-info" onclick="sendmail();" value='Sent Mail to user' data-dismiss="modal">
<!-- 
          <input type="button" name="sendMail" class="btn btn-flat btn-info" onclick="sendMail();" value="Sent Mail to User"> -->
         </div>
          </div>
          
          <input type="hidden" class="form-control" name="test" value="" id="ntest">
          <input type="hidden" name="nsectonv" class="form-control" id="nsectonv" value=""> 
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
 
  var arr = [];

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
}

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


function sendmail()
{
   $("#imagelodar").show();
   var data = {
   	  "userid"    : $("#userid").val(),
   	  "buglist"   : JSON.stringify(arr)

   };
  console.log(JSON.stringify(data));
  var url = '<?php echo site_url();?>'
  var data1 = eval(data);
  $.ajax({
  	type  : "POST",
  	url   : '<?php echo site_url('forms/eventbugmail')?>',
  	data  : data1,
  	dataType :"text",
  	success :function(result)
  	{
  		// alert(result);
  		if(result == 1)
        {
        $.confirm({
        title: 'Congratulations!',
        content: 'Mail has been sent .',
        type: 'green',
        typeAnimated: true,
        animationSpeed: 1500,
        animationBounce: 3,
        buttons: {
            tryAgain: {
                text: 'Thank You !',
                btnClass: 'btn-green',
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
                      	 $('#imagelodar').hide();
                      }
                  },
                  close: function () {
                  	 $('#imagelodar').hide();
                  }
              }
          });
      }  
  	}
  });
}
</script>


