<div id="page_driver_tab_pickups" class="ui-body-d  ui-content">
    <p>Pickups</p>

    <div class="ui-corner-all custom-corners">
        <div class="ui-bar ui-bar-a">
            <h3>Heading</h3>
        </div>
        <div class="ui-body ui-body-a">
            <p>Content</p>
        </div>
    </div>


    <div class="ui-body ui-body-a ui-corner-all">
        <h3>Heading</h3>

        <ul data-role="listview" data-inset="true" data-split-icon="plus" data-theme="a" data-split-theme="b">
            <li data-role="list-divider">11.00 - 12.00 @Mobile Life Campus<span class="ui-li-count">{Passengers Count}</span>
            </li>

            <?php
            $requestsForDriver = json_decode($jsonRequestsForDriver);
            ?>

            <p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>

            <?php foreach($requestsForDriver as $request): ?>
                <li>
                    <a href="#">
                        Passenger A
                    </a>
                </li>
            <?php endforeach; ?>


        </ul>


        <?php echo $this->element('footer'); ?>
        <!-- /footer -->
    </div>
</div>