<?php

    $this->set('backTarget', '/passenger/meeting/' . $meetingId);

?>

<script type="text/javascript">

    var points = {};
    points.origin = {};
    points.dest = {};



    points.origin.lat = '<?php echo $meeting['User']['Office']['lat']; ?>';
    points.origin.lan = '<?php echo $meeting['User']['Office']['lang']; ?>';

    points.dest.lat = '<?php echo $meeting['Meeting']['Location']['lat']; ?>';
    points.dest.lan = '<?php echo $meeting['Meeting']['Location']['lang']; ?>';

    $(function(){
        initialize_map();
        initmap(points, 'passenger', "/img/muppets/6.png");
    });

</script>


<ul id="screen1" title="Request a Ride" selected="true">
    <li class="group">Origin (My Office)</li>
    <li><?php echo $meeting['User']['Office']['Area']['name']; ?></li>
    <li style="font-weight: normal;"><?php echo $meeting['User']['Office']['name']; ?></li>
    <li class="group">Destination</li>
    <li><?php echo $meeting['Meeting']['Location']['Area']['name']; ?></li>
    <li style="font-weight: normal;"><?php echo $meeting['Meeting']['Location']['name']; ?></li>
</ul>


<div id="screen1" title="VR Analysis Info" class="panel" selected="true">



    <fieldset style="padding: 10px;">
        <div class="row">
            <p style="font-weight: bold; color: #000;">Origin (My Office)</p>
            <p style="font-weight: normal; line-height: 24px; color: #333;">
                <span style="color: #000;"><?php echo $meeting['User']['Office']['Area']['name']; ?></span><br>
                <?php echo $meeting['User']['Office']['name']; ?>
            </p>
        </div>
        <div class="row">
            <p style="font-weight: bold; color: #000;">Destination</p>
            <p style="font-weight: normal; line-height: 24px; color: #333;">
                <span style="color: #000;"><?php echo $meeting['Meeting']['Location']['Area']['name']; ?></span><br>
                <?php echo $meeting['Meeting']['Location']['name']; ?>
            </p>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">

            <div id="map" style="width:100%; height:260px"></div>


        </div>
    </fieldset>


    <?php echo $this->Form->create('Request', array('id' => 'RequestForm', 'url' => $this->here)); ?>

    <?php echo $this->Form->hidden('Request.meeting_id', array('value' => $meeting['Meeting']['id'])); ?>


    <a class="grayButton" href="#" id="HandleRequestSubmit"">Submit Request</a>

    <?php echo $this->Form->submit('Submit', array('style' => 'opacity: 0 !important; height: 1px;' )); ?>
    <?php echo $this->Form->end(); ?>

</div>