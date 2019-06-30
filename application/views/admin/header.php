<?
$ci =& get_instance();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=site_url()?>favicon.ico">

    <title>Lawyer</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=site_url()?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=site_url()?>jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
    <link href="<?echo site_url();?>css/jquery.datetimepicker.css" rel="stylesheet" />
    <link href="<?=site_url()?>css/jquery.fancybox.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=site_url()?>/css/jquery.fileupload.css">
    <link rel="stylesheet" href="<?=site_url()?>/css/chosen.css">
    <!-- Custom styles for this template -->
    <link href="<?=site_url()?>css/styles.css?v=1" rel="stylesheet">
    <script src="<?=site_url()?>js/jquery-3.3.1.min.js"></script>
    <script src="<?echo site_url();?>js/jquery.datetimepicker.js"></script>
    <script src="<?=site_url()?>jquery-ui-1.12.1/jquery-ui.js"></script>
    <script src="<?=site_url()?>js/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?=site_url()?>DataTables/datatables.min.css"/> 
    <script type="text/javascript" src="<?=site_url()?>DataTables/datatables.min.js"></script>
    <script type="text/javascript" src="<?=site_url()?>js/jqueryui_datepicker_thai_min.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#" style="width: 25px;"><img src="<?=site_url()?>img/logo.png" style="width: 70px;position: absolute;left: 2px;top: 20px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url("admin/main/dashboard")?>">Home</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Maid</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?=site_url("admin/maid/create")?>">Create</a>
              <a class="dropdown-item" href="<?=site_url("admin/maid")?>">Maid List</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Banner</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?=site_url("admin/banner/create")?>">Create</a>
              <a class="dropdown-item" href="<?=site_url("admin/banner")?>">Banner List</a>
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url("admin/gallery")?>">Gallery</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ผู้ดูแล</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="<?=site_url("admin/admin_user/create")?>">เพิ่มผู้ดูแล</a>
              <a class="dropdown-item" href="<?=site_url("admin/admin_user")?>">รายการผู้ดูแล</a>
            </div>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">บัญชี</a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="<?=site_url("main/logout")?>">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>