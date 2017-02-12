<!DOCTYPE html>
<html lang="en">
<head>
    <? wp_head(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
    <?php
        bloginfo( 'name' );
        wp_title( '|' );
    ?>
    </title>
    <!-- IMPORT FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Playfair+Display:700,700i" rel="stylesheet">
</head>
<body>
    <!-- 'header' partial here. -->
    <main role="main">