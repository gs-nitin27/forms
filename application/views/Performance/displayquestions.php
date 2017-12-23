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
       <?php

       $quest = $this->register->getQuestions($id); 
      // print_r($quest);
        if(!empty($quest))
        {
          $questions = $quest[0];
        } 
      ?>

         <div class="col-md-12">
            <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Questions</h3>
            </div>
          
            <div class="box-body">

           

          <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Gender: </b></h5>

          <div class="timeline-body">
            <?php echo $questions['gender'];?>
          </div>
             
          </div>
                  <hr>
                  <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Age Group: </b></h5>

          <div class="timeline-body">
              <?php echo $questions['age_group'];?>
          </div> 
          </div>

              
              <hr>
              <div class="timeline-item">
          <h5 class="timeline-header" style="color:rgb(0,0,255);opacity:0.6;"><b href="#"> Sport : </b></h5>
          <div class="timeline-body">
              <?php echo $questions['sport'];?>
          </div>
          </div>

            </div>
         
          </div>
          </div>
    
         
         
          

       <div class="nav-tabs-custom">
       <ul class="nav nav-tabs">

        <?php 
              $section = [];
              $questarray = $questions['question'];
              $array=json_decode($questarray);
              $i=1;
               foreach ($array as $key => $value) 
               {  $section[] = $key;
                    if($i == 1){
               ?>
              <li class="active"><a href="#<?php echo $key;?>" data-toggle="tab" id="<?php echo $i; ?>" ><?php echo $key;?></a></li>
              <!-- <li ><a href="#tab_info" data-toggle="tab" id="2" >Tournament Info</a></li>
              <li ><a href="#tab_organiser" data-toggle="tab" id="3" >Organiser Details</a></li>
              <li ><a href="#tab_eligible" data-toggle="tab" id="4" >Eligibility Criteria</a></li> -->

             <?php $i++; } else { ?>
              <li><a href="#<?php echo $key;?>" data-toggle="tab" id="<?php echo $i; ?>"><?php echo $key;?></a></li>
             <?php $i++;} }?>
             </ul> 
                  <div class="tab-content">
                <?php
              foreach ($array as $key => $value) 
               {
                ?>  
                <div class="tab-pane" id="<?php echo $key;?>">
                <div class="box-header with-border">
              <!--   <h4><?php// echo $key;?></h4 >    -->
                </div>
                <div class="box-body">
          
          
         
             <!--  <div class="timeline-item">
              <h5 class="timeline-header no-border"><b>End Date: </b> &nbsp;<?php// echo $key;?></h5>
               </div> -->
          
          
          
          
             

                <?php 
                  foreach ($value as $key1 => $sdata) 
                    {    
                        //subsection

                        //print_r($key1); 
                      ?>
                      <div class="container">
                      <?php if($key1 =="" || $key1 == '_empty_'){?>
                      <div class="header" style="height: 40px;"><span>Questions</span>
                      <?php } else {?>
                      <div class="header"><span><?php echo $key1;?></span>
                      
                     <?php }?>
                      </div>
                      <div class="content">
                      <ul class="list-group">
            <!--  <li>This is just some random content.</li>
                  <li>This is just some random content.</li>
                  <li>This is just some random content.</li>
                  <li>This is just some random content.</li> -->
                <!--  <div class="timeline-item">
                    <h5 class="timeline-header no-border"><b>Sub-Section: </b> &nbsp;<?php// echo $key1;?></h5>
                   </div> -->

                <?php

                      foreach ($sdata as $key2 => $qdata) 
                        {
                            //questions
                        ?>
                          <li class="list-group-item list-group-item-info"><?php echo $qdata;?></li>
                    <!-- <div class="timeline-item">
                    <h5 class="timeline-header no-border"><b>Questions : </b> &nbsp;<?php// echo $qdata;?></h5>
                   </div> -->
                          <?php
                          // print_r($qdata);
                         }
                         ?>
                         </ul>
                        </div>
                        </div>
                        
                         <?php

                        }
                        ?>
                        
                        </div>
                        </div>
                        <?php
               }
           
           $ques = implode(',', $section)
          ?>
              
      
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
}
</style>

</div>
<script type="text/javascript">

$(".header").click(function () {

    $header = $(this);
    //getting the next element
    $content = $header.next();
    //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
    $content.slideToggle(500, function () {
        
    });

});


 $(document).ready(function(){
  var section = '<?php echo $ques; ?>';

   var sec = section.split(',');
   //alert(sec[0]);
   $("#"+sec[0]).addClass('active');
      
 }); 
</script>
