<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <? if ($styles) : ?>
        <? foreach ($styles as $style) : ?>
            <link rel="stylesheet" type="text/css" href="<?= $style; ?>"/>
        <? endforeach; ?>
    <? endif; ?>
    <? if ($scripts) : ?>
        <? foreach ($scripts as $script) : ?>
            <script type="text/javascript" src="<?= $script ?>"></script>
        <? endforeach; ?>
    <? endif; ?>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="<?= SITE_URL ?>">Home</a></li>
            <li class="active"><a href="<?= SITE_URL ?>login/logout/1">Log out</a></li>
        </ul>
        <h3 class="text-muted">Task manager</h3>
    </div>






