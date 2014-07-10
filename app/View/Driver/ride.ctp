<?php

$this->set('backTarget', '/driver/calendar');

?>
<script type="text/javascript">

    var points = {};
    points.origin = {};
    points.dest = {};


    points.origin.lat = '<?php echo $ride['Route']['Origin']['lat']; ?>';
    points.origin.lan = '<?php echo $ride['Route']['Origin']['lang']; ?>';

    points.dest.lat = '<?php echo $ride['Route']['Destination']['lat']; ?>';
    points.dest.lan = '<?php echo $ride['Route']['Destination']['lang']; ?>';

    $(function(){
        initialize_map();
        initmap(points, 'passenger', "/img/muppets/6.png");
    });

</script>

<div id="screen1" title="Your Pickup Details" class="panel" selected="true">
    <fieldset style="padding: 10px;">

        <div class="row">
            <p style="font-weight: bold; color: #000;">Origin Area</p>
            <p style="font-weight: bold; color: #666;"><?php echo $ride['Route']['Origin']['Area']['name']; ?></p>
            <p style="font-weight: bold; color: #666;">
                <span style="color: #666;"><?php echo $this->Time->format('F j, Y, g:i a', $ride['Ride']['pickup_time']); ?></span>
            </p>
        </div>

        <div class="row">
            <p style="font-weight: bold; color: #000;">Destination Area</p>
            <p style="font-weight: bold; color: #666;"><?php echo $ride['Route']['Destination']['Area']['name']; ?></p>
            <p style="font-weight: bold; color: #666;">
                <span style="color: #666;"><?php echo $this->Time->format('F j, Y, g:i a', $ride['Request'][0]['arrival_time']); ?></span>
            </p>
        </div>

    </fieldset>
<!--
    <fieldset>
        <div class="row">
            <div style="margin-left: 10px;float: left; clear: left; padding: 10px">
                <p><strong>Your Car</strong></p>
                <p>
                    <?php /*echo $user['Car']['brand'] . ' - ' . $user['Car']['model']; */?>
                </p>
                <p>
                    <img style="max-height: 46px;" src="/img/cars/<?php /*echo $user['Car']['icon']; */?>"/>
                </p>
            </div>
        </div>

    </fieldset>-->
    <fieldset>
        <div class="row">

            <div id="map" style="width:100%; height:220px"></div>

        </div>
    </fieldset>

    <a class="redButton" href="/driver/cancel_offer/<?php echo $ride['Ride']['id']; ?>/pickups">Cancel Offer</a>

</div>