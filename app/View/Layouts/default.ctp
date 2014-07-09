<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php echo $this->Html->charset(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/mobile/jquery.mobile-1.4.3.min.css" />
    <script src="/mobile/jquery-1.11.1.min.js"></script>
    <script src="/mobile/jquery.mobile-1.4.3.min.js"></script>

    <script type="text/javascript" src="/logic.css"></script>
    <meta http-equiv="refresh" content="500">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <script type="text/javascript" src="/logic.css"></script> -->

    <style type="text/css">
        .ui-icon-driver:after {
            background-image: url("../_assets/img/glyphish-icons/21-skull.png");
            /* Make your icon fit */
            background-size: 18px 18px;
        }

        .ui-icon-passenger:after {
            background-image: url("../_assets/img/glyphish-icons/21-skull.png");
            /* Make your icon fit */
            background-size: 18px 18px;
        }
    </style>

    <title>Blue Points</title>



	<?php

        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('geo');
        echo $this->Html->script('geo_locate');

        echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">

		<div id="header">

		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">


			<p>

			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
