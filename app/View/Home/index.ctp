<script type="text/javascript">

    <?php $jsonRequestsForDriver = $this->requestAction('/data/listrequestsfordriver', array('return')); ?>


    var driverRequests = "<?php echo $jsonRequestsForDriver; ?>";


</script>


<!-- Start of first page -->
<div data-role="page" id="page_inital">

    <div data-role="header">
        <h1>Landing Page (Blue Points)</h1>
    </div>
    <!-- /header -->

    <div data-role="main" class="ui-content">
        <p>Welcome to Blue Points</p>

        <div class="ui-grid-b">
            <div class="ui-block-a">
                <a class="ui-btn ui-shadow" href="#page_driver_home">User
                    A</a>
            </div>
            <div class="ui-block-b">
                <a data-role="button" href="#page_driver_home">User B <img
                        alt="" src="/img/Bert.svg">
                </a>
            </div>
            <div class="ui-block-c">
                <a data-role="button" href="#page_driver_home">User C</a>
            </div>
            <div class="ui-block-a">
                <a data-role="button" href="#page_driver_home">User D</a>
            </div>
            <div class="ui-block-b">
                <a data-role="button" href="#page_driver_home">User E</a>
            </div>
            <div class="ui-block-c">
                <a data-role="button" href="#page_driver_home">User F</a>
            </div>

        </div>
    </div>
    <!-- /content -->
</div>
<!-- /page -->

<div data-role="page" id="page_driver_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_passenger_home" data-icon="recycle" class="ui-btn-left" data-transition="flow">Passenger</a>
        <h1>Driver Home</h1>
        <a href="#page_driver_options" data-icon="gear" class="ui-btn-right" data-transition="slide">Options</a>
    </div>


</div>


<div data-role="page" id="page_passenger_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_driver_home" data-icon="recycle" class="ui-btn-left" data-transition="flow" data-direction="reverse">Driver</a>
        <h1>Passenger Home</h1>
        <!-- <a href="#" data-icon="gear" class="ui-btn-right">Options</a> -->
    </div>




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


