<script type="text/javascript">

    <?php $jsonRequestsForDriver = $this->requestAction('/data/listrequestsfordriver', array('return')); ?>


    var driverRequests = '<?php echo $jsonRequestsForDriver; ?>';


</script>


<!-- Start of first page -->
<div data-role="page" id="page_inital">

    <div data-role="header">
        <h1>Landing Page (Blue Points)</h1>
    </div>
    <!-- /header -->
</div>
<!-- /page -->


<div data-role="page" id="page_driver_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_passenger_home" data-icon="recycle" class="ui-btn-left" data-transition="flow">Passenger</a>
        <h1>Driver Home</h1>
        <a href="#page_driver_options" data-icon="gear" class="ui-btn-right" data-transition="slide">Options</a>
    </div>

    <?php echo $this->element('Driver', array('jsonRequestsForDriver' => $jsonRequestsForDriver)); ?>

</div>


<div data-role="page" id="page_passenger_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_driver_home" data-icon="recycle" class="ui-btn-left" data-transition="flow" data-direction="reverse">Driver</a>
        <h1>Passenger Home</h1>
        <!-- <a href="#" data-icon="gear" class="ui-btn-right">Options</a> -->
    </div>


    <?php echo $this->element('Passenger'); ?>


    <!-- /navbar -->
</div>


<?php

#echo json_encode($response);


?>


<div data-role="page" id="page_driver_offer_ride">page_driver_offer_ride</div>

<div data-role="page" id="page_driver_options">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_driver_home" data-icon="back" class="ui-btn-left"
           data-transition="slide" data-direction="reverse">Back</a>

        <h1>Driver Options</h1>
    </div>
    <!-- /header -->


</div>


