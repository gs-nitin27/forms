  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create Content
        
      </h1>
     
    </section>
         <section class="content"> 
      <div class="row">
	  <div class="col-md-6">
		<div class=" alert alert-success" id="msgdiv" style="display:none">
			<strong>Info! <span id = "msg"></span></strong> 
		</div>

			<div class="nav-tabs-custom">

    <head>
        <script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
    </head>
        <form>
            <label>Title</label><input class="form-control" type="text" name="title">
            <label>Url</label><input class="form-control" type="text" name="url">
            <label>Description</label>
            <textarea name="editor1" id="editor1" rows="10" cols="80" >
                This is my textarea to be replaced with CKEditor.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>


			
          </div>
	  </div>
</section>
</div>
<script type='text/javascript' src="<?php echo base_url(); ?>assets/dist/js/ckeditor.js"></script>
