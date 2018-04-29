<!DOCTYPE html>
<html lang="en">
<head>
  <title>Engine4U</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url('js/client.js') ;?>">

  </script>
  <link href="https://fonts.googleapis.com/css?family=Black+And+White+Picture" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('css/search.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('css/host.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('css/profile_header.css') ;?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

  <body>
<div class="icons">
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('main/main_page'); ?>">Engine4U</a>
          </div>

          <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right hovers">
              <?php if($this->session->userdata('logged_in')) : ?>
              <li><a href="<?php echo site_url('host_controller/host') ;?>">Host</a></li>
            <?php endif ; ?>
              <li><a data-toggle="modal" data-target="#myModal">Intruction</a></li>
              <li><a href="<?php echo site_url('search/search_engine'); ?>">Search</a></li>
              <?php if($this->session->userdata('logged_in')) : ?>
              <li><a href="<?php echo site_url('search/search_engine'); ?>">Messages</a></li>
              <?php endif ; ?>
              <?php if($this->session->userdata('logged_in')) : ?>
              <li class="popup" onclick="popupMessage()">
                <?php if (empty($this->session->profile_picture)): ?>
                <img src="<?php echo base_url().'profile_gallery/empty_profile.jpg'?>" width="30px" height="30px" alt="Profile Picture"> ;
                <?php endif; ?>
                <?php if (!empty($this->session->profile_picture)): ?>
                <img src="<?php echo base_url().'profile_gallery/'.$this->session->profile_picture?>" width="30px" height="30px" alt="Profile Picture">
                <?php endif; ?>
                  <span class="popuptext" id="myPopup">
                    <a id="popuplink" href="<?php echo site_url('user/user_profile')?>" target="_top">You profile</a><br>
                    <a id="popuplink" href="<?php echo site_url('user/logout')?>" target="_top">Log Out</a>
                  </span>

              </li>
            <?php endif ; ?>
            <?php if(!$this->session->userdata('logged_in')) : ?>
              <li><a href="<?php echo site_url('user/index'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <?php endif ; ?>

            </ul>

          </div>

      </div>
    </nav>
</div>
<div class="" style="margin-bottom:80px"></div>
<script>
// When the user clicks on div, open the popup
function popupMessage() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
}
</script>
