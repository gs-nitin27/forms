<html>
<head>
</head>
<body style=" font-family: ;   width: 98%;">

<style>
#text .inner{
    font-size: 15px;
}
#container {
  height: 74px;
  width: 400px;
  position: relative;
}

#image {
  position: absolute;
  left: 0;
  top: 0;
}
#text {
  z-index: 100;
  position: absolute;
  color: white;
  
  left: 150px;
  top: 15px;
}

.detail {
   z-index: 100;
  color:  	#707070;
  top: -404px;
   left: 16px;
   position: relative;
}
</style>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="    width: 511px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
		<img src="/jobheader.png"><br>
<div id="container">
<img src="/jobtitle.png" id="image" style="position: absolute;">
<p id="text">
   <span style="font-weight: bold; margin-left: 24px;"> Tennis Coach<br></span>
	<span class = "inner">
	Aarti Sports Foundation,<br>
	<label style="margin-left: 45px;">Noida</label><br>
	<label style="font-size: 20px;    position: relative;    left: 135px;    top: 33px;">Job Posted 72 hours</label>
	
	
	</span>
	
  </p>
</div>
<div >
<img src="/jobdetail.png" style="position: static; margin-top: 77px;">
<p class="detail" style="font-size: 14px;  font-weight: bold;">Certified Tennis Coach Required</p>
  	<label for="type" class="detail" style="top: -354px;left: 213px;font-size: 18px;">Coach</label>
  	<label for="type" class="detail" style="top: -318px;left: 161px;font-size: 18px;">Good with Kids</label>
  	<label for="type" class="detail" style="top: -281px;left: 40px;font-size: 18px;">03</label>
  	<label for="type" class="detail" style="top: -248px;left: 18px;font-size: 18px;">AITA Certified</label>
  	<label for="type" class="detail" style="top: -197px;    left: 13px;    float: left;    font-size: 18px;">It help sports athelete acheive their goals</label>
</div>
<img src="/jobbutton.png" style="margin: -220px 0 -90px 0px">
      </div>
      
    </div>
  </div>
</div>

</body>
</html>