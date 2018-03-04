<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$title;?></title>

</head>

<body>
	<div style="width:500px;margin:100px auto 0 auto;padding:50px;border:2px solid red">
		<?if(isset($error)) :?>
			<? foreach($error as $item) :?>
				<?=$item.'<br />';?>
			<? endforeach;?>
		<?endif;?>
	</div>
</body>

</html>