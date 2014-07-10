<?php

    $this->set('backTarget', '/driver/calendar/');

?>

<ul id="screen1" title="Your Offered Rides" selected="true">


    <?php if (!empty($rides)): ?>
    <?php foreach($rides as $ride): ?>

        <?php
        if (isset($date)) {
            if ($date !== $ride['Ride']['arrival_time']) {
                $dateChanged = true;
            } else {
                $dateChanged = false;
            }
        } else {
            $dateChanged = true;
        }
        ?>


        <?php if ($dateChanged): ?>
            <li class="group"><?php echo $this->Time->format('n/d/Y', $ride['Ride']['arrival_time']); ?></li>
            <?php $date = $ride['Ride']['arrival_time']; ?>
        <?php else: ?>

            <?php $date = $ride['Ride']['arrival_time']; ?>

        <?php endif; ?>





        <li>
            <a href="/driver/ride/<?php echo $ride['Ride']['id']; ?>">
                <img width="28" height="28" src="/img/muppets/<?php echo $ride['Request'][0]['User']['icon']; ?>" style="float: left;" />
                <span style="font-weight: bold; font-size: 1.1em; margin-left: 10px; padding: 2px; float: left;">
                    <?php echo $ride['Request'][0]['User']['name']; ?>
                </span>
                <span style="float: left; margin-left: 10px; color: #666; margin-top: 4px;">
                    <?php echo $this->Time->format('g:ia', $ride['Ride']['arrival_time']); ?>
                </span>
                <span style="float: left; margin-left: 10px; color: #999; margin-top: 4px;">
                    <?php echo $ride['Route']['Destination']['Area']['name']; ?>
                </span>
                <div style="clear: both;"></div>
            </a>
        </li>


    <?php endforeach; ?>
    <?php else: ?>
        <li>You have no Outstanding Pickups</li>
    <?php endif; ?>
    <li class="group">Application Options</li>
    <li>
        <a href="/logout">Log Out</a>
    </li>
</ul>