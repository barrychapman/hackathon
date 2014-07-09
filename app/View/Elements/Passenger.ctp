<div data-role="tabs" id="passenger_home_tabs">
    <div data-role="navbar">
        <ul>
            <li><a href="#page_passenger_tab_requests" data-icon="navigation" data-theme="a" data-ajax="false">Requests</a>
            </li>
            <li><a href="#page_passenger_tab_rides" data-icon="comment" data-theme="a" data-ajax="false">Rides</a>
            </li>
            <li><a href="#page_passenger_tab_add" data-icon="plus" data-theme="a" data-ajax="false">Add</a></li>
        </ul>
    </div>

    <?php echo $this->element('Passenger/requests'); ?>
    <?php echo $this->element('Passenger/rides'); ?>
    <?php echo $this->element('Passenger/add'); ?>



</div>