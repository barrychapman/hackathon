<!DOCTYPE html>
<html>
<head>


    <?php echo $this->element('Includes/head'); ?>


</head>
<body class="landscape">

<div class="toolbar">
    <h1 id="pageTitle">Welcome to Blue Points</h1>
    <a id="backButton" class="button" href="#"></a>
</div>

<!--<div id="index" title="Welcome to Blue Points" selected="true" class="panel">-->


    <?php echo $this->Session->flash(); ?>

    <?php echo $this->fetch('content'); ?>


<!--</div>-->
</body>
</html>
