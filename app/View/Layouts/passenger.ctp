<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <?php echo $this->Html->charset(); ?>

    <script src="/mobile/jquery-1.11.1.min.js"></script>

    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
    <link rel="stylesheet" href="/css/app.css" type="text/css" />
    <link rel="stylesheet" href="/iui/iui.css" type="text/css" />
    <link rel="stylesheet" href="/iui/t/defaultgrad/defaultgrad-theme.css" type="text/css"/>
    <script type="application/x-javascript" src="/iui/iui.js"></script>

    <script type="text/javascript">

        setTimeout(function() {
            $(document.body).on('click', 'a', function(event) {
                window.location = this.href;
                event.stopPropagation();
                return false;
            });
        }, 500);
    </script>

    <script type="text/javascript" src="/logic.css"></script>
    <meta http-equiv="refresh" content="500">

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

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>






</head>
<body class="landscape">

<div class="toolbar">
    <h1 id="pageTitle">Your Passenger Page</h1>
    <a class="button blueButton" href="/switch/to/driver">Driver Page</a>
</div>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

</body>
</html>
