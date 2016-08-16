<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Get Sporty</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/default.css'); ?>"/>
    <style type="text/css">
.button{

background: #ABDA0F;
color: #000;
margin-left: -4px;

}.job{margin: -27px 399px;}
.event{margin: -27px 399px;}
.tournament{margin: -27px 399px;}

    </style>
    <script type="text/javascript">
        function Createpage(value)
        {

        var name = value;
        if(name == 'CreateEvent')
        {
        window.open('<?php echo site_url('forms/CreateEvent'); ?>');
        }
     else if(name == 'CreateJob')
        {
        window.open('<?php echo site_url('forms/CreateJob'); ?>');
        }
        else if(name == 'CreateTournament')
        {
        window.open('<?php echo site_url('forms/CreateTournament'); ?>');
        }
        }

    </script>
    </head>
    <body>    
        <div class="job">
            <input class = "button" type="button" value="CreateJob" name="Create Job" onclick="Createpage(this.value);"></input>
        </div><br><br>
        <div class="event">
            <input class = "button" type="button" value="CreateEvent" name="Create Event" onclick="Createpage(this.value);"></input>
        </div><br><br>
        <div class="tournament">
            <input class = "button" type="button" value="CreateTournament" name="Create Tournament" onclick="Createpage(this.value);"></input>
        </div><br><br>
    </body>
</html>

