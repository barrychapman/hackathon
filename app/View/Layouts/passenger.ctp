<!DOCTYPE html>
<html>
<head>
    <?php echo $this->element('Includes/head'); ?>

</head>




<body class="landscape">

<div class="toolbar">
    <h1 id="pageTitle">My Passenger Page</h1>
    <?php if (isset($backTarget)): ?>
    <a class="button leftButton" type="back" href="<?php echo $backTarget; ?>">Back</a>
    <?php endif; ?>

    <a class="button blueButton" href="/switch/to/driver">My Driver Page</a>
</div>

<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content'); ?>

<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/combodate.js"></script>

<script type="text/javascript">
    $(function() {

        $('select.select2').select2();

    });
</script>

</body>
</html>
