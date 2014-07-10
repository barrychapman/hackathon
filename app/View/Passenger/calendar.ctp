<ul id="screen1" title="Your Meetings" selected="true">

<?php foreach($meetings as $meeting): ?>

    <?php
        if (isset($date)) {
            if ($date !== $meeting[0]['meeting_date']) {
                $dateChanged = true;
            } else {
                $dateChanged = false;
            }
        } else {
            $dateChanged = true;
        }
    ?>


    <?php if ($dateChanged): ?>
        <li class="group"><?php echo $this->Time->format('n/d/Y', $meeting[0]['meeting_date']); ?></li>
        <?php $date = $meeting[0]['meeting_date']; ?>
    <?php else: ?>

        <?php $date = $meeting[0]['meeting_date']; ?>

    <?php endif; ?>



    <li>
        <a href="/passenger/meeting/<?php echo $meeting['Meeting']['id']; ?>">
            <span class="meeting-time">
                <?php echo $this->Time->format('g:ia', $meeting['Meeting']['time']); ?>
            </span>
            <span class="meeting-name">
                <?php echo $meeting['Meeting']['desc']; ?>
            </span>
        </a>
    </li>


<?php endforeach; ?>
    <li class="group">Application Options</li>
    <li>
        <a href="/logout">Log Out</a>
    </li>
</ul>