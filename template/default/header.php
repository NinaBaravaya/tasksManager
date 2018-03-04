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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <title><?= $title; ?></title>
</head>

<body>
<div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="<?= SITE_URL ?>">Home</a></li>
            <li class="active"><a href="<?= SITE_URL ?>login">Admin panel</a></li>
        </ul>
        <h3 class="text-muted">Task manager</h3>
    </div>
