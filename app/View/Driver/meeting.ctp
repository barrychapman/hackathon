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

            <div id="map" style="width:100%; height:220px"></div>


        </div>
    </fieldset>

    <fieldset>
        <div class="row">


            <?php if (!empty($meeting['Request'])): ?>
            <?php foreach($meeting['Request'] as $request): ?>

                <div style="margin-left: 10px;float: left; clear: left; padding: 10px">


                    <a style="float: left; margin-right: 15px; margin-top: -5px; position: relative; padding: 3px; font-size: .85em; line-height: 12px; height: 16px; border-width: 1px; " class="button blueButton" href="#">
                        Approve Request
                    </a>

                    <img width="32" height="32" style="float: left; width: 32px; height: 32px;" alt="" src="/img/muppets/<?php echo $request['User']['icon']; ?>">
                    <span style="display: inline-block; float: left; padding: 4px 5px 4px 10px;"><?php echo $request['User']['name']; ?></span>
                    <span style="color: #aaa; display: inline-block; float: left; padding: 4px 0;">
                        - Traveling from <?php echo $request['User']['Office']['name']; ?>
                    </span>


                </div>

            <?php endforeach; ?>
            <?php else: ?>
            <div style="margin-left: 10px;float: left; clear: left; padding: 10px">

                <p>No Requested Pickups for this Meeting</p>

            </div>
            <?php endif; ?>
        </div>
    </fieldset>
</div>