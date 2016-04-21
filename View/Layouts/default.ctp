<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Volvo Autos</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,700italic,600' rel='stylesheet' type='text/css'>
		<?= $this->Html->meta('favicon.ico', '/img/favicon.ico' , array('type' => 'icon') ); ?>
		<?= $this->Html->css(array(
			'bootstrap.min', 'font-awesome.min', 'template', 'font','jquery.fancybox', 'jquery.fancybox-buttons'
		)); ?>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<?= $this->Html->scriptBlock(sprintf("var webroot = '%s';", $this->webroot)); ?>
		<?= $this->Html->scriptBlock(sprintf("var fullwebroot = '%s';", $this->Html->url('/', true))); ?>
		<?= $this->Html->script(array(
			'jquery-1.11.3.min', 'bootstrap.min','custom','core-utils','jquery.fancybox','jquery.mousewheel-3.0.6.pack'
		)); ?>
		<?= $this->fetch('meta'); ?>
		<?= $this->fetch('css'); ?>
		<?= $this->fetch('script'); ?>


		<script language='JavaScript1.1' src='//pixel.mathtag.com/event/js?mt_id=923750&mt_adid=156994&v1=&v2=&v3=&s1=&s2=&s3='></script>

		<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KJNJXJ"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KJNJXJ');</script>
		<!-- End Google Tag Manager -->
	
	</head>
	<body>
		<?php
			
			if ($this->Session->check('Message.flash')){ 

				echo $this->Session->flash();

			}

		?>
		<?= $this->element('Template/header'); ?>

		<div id="content-page" class="<?if( !empty($custom_class)){echo $custom_class;}?>">
			<?= $this->fetch('content'); ?>
		</div>
		
		<?= $this->element('Template/footer'); ?>
		<?= $this->element('Template/modal'); ?>

	</body>
</html>