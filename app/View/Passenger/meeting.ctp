<?php

    $this->set('backTarget', '/passenger/calendar');

?>
<script type="text/javascript">

    var points = {};
    points.origin = {};
    points.dest = {};


    points.origin.lat = '<?php echo $user['Office']['lat']; ?>';
    points.origin.lan = '<?php echo $user['Office']['lang']; ?>';

    points.dest.lat = '<?php echo $meeting['Location']['lat']; ?>';
    points.dest.lan = '<?php echo $meeting['Location']['lang']; ?>';

    $(function(){
        initialize_map();
        initmap(points, 'passenger', "/img/muppets/6.png");
    });

</script>

<div id="screen1" title="<?php echo $meeting['Meeting']['desc']; ?> Info" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <p style="font-weight: bold; color: #000;"><?php echo $meeting['Meeting']['desc']; ?></p>
            <p style="font-weight: bold; color: #333;">
                <span style="color: #000;"><?php echo $this->Time->format('F j, Y, g:i a', $meeting['Meeting']['time']); ?></span><br/>
            </p>
        </div>
        <div class="row">
            <p style="line-height: 24px;">
                <strong><?php echo $meeting['Location']['Area']['name']; ?></strong><br/>
                <?php echo $meeting['Location']['name']; ?>
            </p>

            <div id="map" style="width:100%; height:260px"></div>


        </div>
    </fieldset>

    <fieldset>
        <div class="row">

            <strong style="padding: 10px; margin-top: 10px;float: left;">Attendees</strong>



        <?php foreach($meeting['MeetingUser'] as $user): ?>

            <div style="margin-left: 10px;float: left; clear: left; padding: 10px">
                <img width="32" height="32" style="float: left; width: 32px; height: 32px;" alt="" src="/img/muppets/<?php echo $user['User']['icon']; ?>">
                <span style="display: inline-block; float: left; padding: 4px 0 4px 10px;"><?php echo $user['User']['name']; ?></span>






            </div>

        <?php endforeach; ?>
        </div>
    </fieldset>

    <?php if (!empty($meeting['Request'])): ?>
        <a class="redButton" href="/passenger/cancel/<?php echo $meeting['Request'][0]['id']; ?>">Cancel Request</a>
    <?php else: ?>
        <a class="whiteButton" href="/passenger/request/<?php echo $meeting['Meeting']['id']; ?>">Request a Ride</a>
    <?php endif; ?>
</div>