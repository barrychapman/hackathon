<div data-role="tabs" id="driver_home_tabs">
    <div data-role="navbar">
        <ul>
            <li><a href="#page_driver_tab_pickups" data-icon="navigation" data-theme="a" data-ajax="true">Pickups</a></li>
            <li><a href="#page_driver_tab_events" data-icon="comment" data-theme="a" data-ajax="false">Events</a></li>
            <li><a href="#page_driver_tab_page3" data-icon="eye" data-theme="a" data-ajax="false">...</a></li>
        </ul>
    </div>
    <!-- /navbar -->

    <!-- /header -->

    <?php echo $this->element('Driver/pickups', array('jsonRequestsForDriver' => $jsonRequestsForDriver)); ?>
    <?php echo $this->element('Driver/events'); ?>

    <div id="page_driver_tab_page3" class="ui-content">
        <h1>Page3</h1>
    </div>
</div>