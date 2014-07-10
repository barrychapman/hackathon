<?php

    $this->set('backTarget', '/passenger/calendar');

?>


<div id="screen1" title="<?php echo $meeting['Meeting']['desc']; ?> Info" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <p style="font-weight: bold;">
                <span style="color: #000;"><?php echo $this->Time->format('F j, Y, g:i a', $meeting['Meeting']['time']); ?></span><br/>
            </p>
        </div>
        <div class="row">
            <p style="line-height: 24px;">
                <strong><?php echo $meeting['Location']['Area']['name']; ?></strong><br/>
                <?php echo $meeting['Location']['name']; ?>
            </p>
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

</div>