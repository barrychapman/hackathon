<?php $this->set('backTarget', '/passenger/calendar'); ?>
<ul id="screen1" title="Your Requests" selected="true">



    <?php if (!empty($events)): ?>
    <?php foreach($events as $event): ?>

        <li>
            <a href="/passenger/event/<?php echo $event['Request']['id']; ?>">
            <span class="meeting-time">
                <?php echo $this->Time->format('g:ia', $event['Meeting']['time']); ?>
            </span>
            <span class="meeting-name">
                <?php echo $event['Meeting']['desc']; ?>
            </span>
            </a>
        </li>


    <?php endforeach; ?>
    <?php else: ?>
    <li>
        No Outstanding Requests
    </li>

    <?php endif; ?>
    <li class="group">Application Options</li>
    <li>
        <a href="/logout">Log Out</a>
    </li>
</ul>