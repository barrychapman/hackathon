<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<?php echo $this->Html->charset(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/mobile/jquery.mobile-1.4.3.min.css" />
    <script src="/mobile/jquery-1.11.1.min.js"></script>


    <script type="text/javascript">

        setTimeout(function() {
            $(document.body).on('click', 'a', function(event) {
                window.location = this.href;
                event.stopPropagation();
                return false;
            });
        }, 500);
    </script>

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

        <div id="content" class="ui-mobile-viewport ui-overlay-a">

            <script type="text/javascript">

                var driverRequests = "[{"date":"2014-07-09","requests":[{"id":1,"status":1,"arrivaltime":"2014-07-09 14:00:00","route":{"origin":{"id":3,"latitude":53.91,"longitude":12.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}},"destination":{"id":3,"latitude":50.91,"longitude":18.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}}},"ride":null}]},{"date":"2014-07-10","requests":[{"id":1,"status":1,"arrivaltime":"2014-07-09 14:00:00","route":{"origin":{"id":3,"latitude":53.91,"longitude":12.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}},"destination":{"id":3,"latitude":50.91,"longitude":18.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}}},"ride":null}]},{"date":"2014-07-10","requests":[{"id":1,"status":1,"arrivaltime":"2014-07-09 14:00:00","route":{"origin":{"id":3,"latitude":53.91,"longitude":12.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}},"destination":{"id":3,"latitude":50.91,"longitude":18.09,"name":"Elysee Grand","area":{"id":1,"name":"CongressCenter Hamburg"}}},"ride":null}]}]";

            </script>

            <!-- Start of first page -->
            <div data-role="page" id="page_inital" data-url="page_inital" tabindex="0" class="ui-page ui-page-theme-a ui-page-active" style="min-height: 519px;">

                <div data-role="header" role="banner" class="ui-header ui-bar-inherit">
                    <h1 class="ui-title" role="heading" aria-level="1">Landing Page (Blue Points)</h1>
                </div>

                <div data-role="main" class="ui-content">
                    <p>Welcome to Blue Points</p>

                    <div class="ui-grid-b">

                        <?php foreach ($users as $user): ?>

                        <div class="ui-block-a" style="float: left; clear: none !important;">
                            <a data-role="button" href="/user/select/<?php echo $user['User']['id']; ?>" class="ui-link ui-btn ui-shadow ui-corner-all" role="button">
                                <img width="32" height="32" style="width: 32px; height: 32px;" alt="" src="/img/muppets/<?php echo $user['User']['icon']; ?>"><br/>
                                <?php echo $user['User']['name']; ?>
                            </a>
                        </div>

                        <?php endforeach; ?>

                    </div>
                </div>
                <!-- /content -->
            </div>
            <!-- /page -->

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">


			<p>

			</p>
		</div>
	</div>
</body>
</html>
