<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('Includes/head'); ?>


</head>
<body class="landscape">

    <div class="toolbar">
        <h1 id="pageTitle">Your Driver Page</h1>
        <a class="button blueButton" href="/switch/to/passenger">Passenger Page</a>
    </div>

    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
</body>
</html>
