<?php $this->set('backTarget', '/passenger'); ?>





<div id="screen1" title="<?php echo $profile['User']['name']; ?> Info" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <h1>My Passenger Profile</h1>
            <p style="font-weight: bold; color: #000;"><img src="/img/muppets/<?php echo $profile['User']['icon']; ?>"></p>
            <p style="font-weight: bold; color: #333;"><?php echo $profile['User']['name']; ?>'s Profile Page</p>
            <p style="font-weight: bold; color: #333;">
                <h3>Home Address</h3>
                <address>
                    <?php echo $profile['User']['street'];?><br/>
                    <?php echo $profile['User']['city'];?><br/>
                    <?php echo $profile['User']['postcode'];?><br/>
                    <?php echo $profile['User']['country'];?>
                </address>
            </p>
            <p style="font-weight: bold; color: #000;">
                <h3>Office Location</h3>
                <address>
                    <?php echo $profile['Office']['name']; ?>
                </address>
            </p>
            <p style="font-weight: bold; color: #000;">
                <h3>My Default View</h3>
                <div>
                    <?php
                    switch($profile['User']['default_view']) {
                        case 'passenger':
                            echo '<span style="color: #090; font-weight: bold;">Passenger</span>';
                            break;
                        case 'driver':
                            echo '<span style="color: #000080; font-weight: bold;">Driver</span>';
                            break;
                        default:
                            echo 'Passenger';
                    }
                    ?>
                </div>
            </p>

        </div>
        <div class="row">
            <p style="line-height: 24px;">
               <a class="whiteButton" href="/passenger/profile/edit">Edit Profile</a>
            </p>
        </div>
    </fieldset>
</div>