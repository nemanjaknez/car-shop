<!DOCTYPE html>
<html>
    <head>
        <title>Car Shop</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo Misc::link('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">    
        <link href="<?php echo Misc::link('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">    
        <link href="<?php echo Misc::link('assets/css/style.css'); ?>" rel="stylesheet">    
        <script src="<?php echo Misc::link('assets/js/jquery-3.2.1.min.js'); ?>"></script>
        <script src="<?php echo Misc::link('assets/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo Misc::link('assets/js/main.js'); ?>"></script>
    </head>
                
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="<?php echo Misc::link(''); ?>">
                        <img src="<?php echo Configuration::BASE_URL .'assets/img/logo.png'; ?>" alt="Logo">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">                
                    <?php if (Session::exists('user_id')): ?>
                        <?php include 'app/views/_global/menu-session.php'; ?>
                    <?php else: ?>
                        <?php include 'app/views/_global/menu-no-session.php'; ?>
                    <?php endif; ?>