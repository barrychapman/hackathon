<script type="text/javascript">

    var points = {};
    points.origin = {};
    points.dest = {};


    points.origin.lat = '<?php echo $event['Ride']['Driver']['Office']['lat']; ?>';
    points.origin.lan = '<?php echo $event['Ride']['Driver']['Office']['lang']; ?>';

    points.dest.lat = '<?php echo $event['Meeting']['Location']['lat']; ?>';
    points.dest.lan = '<?php echo $event['Meeting']['Location']['lang']; ?>';

    $(function(){
        initialize_map();
        initmap(points, 'passenger', "/img/muppets/6.png");
        createMarkerSingle(points);
    });

</script>
<br/>
<fieldset style="padding: 10px;">
    <div class="row">
        <div id="map" style="width:100%; height:220px"></div>
    </div>
</fieldset>