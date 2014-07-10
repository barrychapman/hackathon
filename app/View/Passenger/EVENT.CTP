<?php

$this->set('backTarget', '/passenger/events');

?>

<div id="screen1" title="Viewing Your Ride Request" class="panel" selected="true">

    <fieldset style="padding: 10px;">
        <div class="row">
            <p style="font-weight: bold; color: #000;"><?php echo $event['Request']['desc']; ?></p>
            <p style="font-weight: bold; color: #333;">Arrival Time:<br/>
                <span style="color: #000;"><?php echo $this->Time->format('F j, Y, g:i a', $event['Meeting']['time']); ?></span><br/>
            </p>
        </div>
        <div class="row">
            <p style="line-height: 24px;">
                <strong>Status</strong><br/>

                <?php

                switch($event['Request']['status']) {

                    case 'OPEN':

                        echo $this->element('Passenger/Request/open', array('event' => $event));
                        break;
                    case 'ACCEPTED':

                        echo $this->element('Passenger/Request/accepted', array('event' => $event));
                        break;

                }

                ?>

            </p>

        </div>
    </fieldset>

    <a class="redButton" href="/passenger/cancel/<?php echo $event['Request']['id']; ?>">Cancel Request</a>

</div>