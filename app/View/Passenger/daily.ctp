<?php $this->set('backTarget', '/passenger/events'); ?>

<script type="text/javascript">

    $(function() {

        var $_direction = $('.select-route:checked');

        if ($_direction.val() === 'round_trip') {
            $('.change-origin,.change-destination').removeClass('disabled');

            $('.work-address').show();
            $('.home-address').show();

        } else if ($_direction.val() === 'one_way_to_home') {
            $('.change-origin,.change-destination').removeClass('disabled');

            $('.work-address').show();
            $('.home-address').show();

        } else if ($_direction.val() === 'one_way_to_work') {

            $('.work-address').show();
            $('.home-address').show();

        } else {
            $('.work-address').hide();
            $('.home-address').hide();
        }



        $(document.body).on('change', '.select-route', function() {
            if ($(this).hasClass('disabled')) {
                return;
            }

            var $data = $('#DailyRoute').serialize();

            $('.select-route').attr('disabled', true).addClass('disabled');

            var $this = $(this);

            $.ajax({
                url: '/passenger/daily',
                data: $data,
                type: 'POST',
                success: function(response) {

                    if ($this.val() === 'round_trip') {
                        $('.change-origin,.change-destination').removeClass('disabled');

                        $('.work-address').show();
                        $('.home-address').show();

                    } else if ($this.val() === 'one_way_to_home') {
                        $('.change-origin,.change-destination').removeClass('disabled');

                        $('.work-address').show();
                        $('.home-address').show();

                    } else if ($this.val() === 'one_way_to_work') {

                        $('.work-address').show();
                        $('.home-address').show();

                    } else {

                        $('.work-address').hide();
                        $('.home-address').hide();

                    }

                    $('.select-route').attr('disabled', false).removeClass('disabled');

                }
            });


            $('.select-route').addClass('disabled').attr('disabled', true);


        });




    });

</script>



<style>
    input[type="radio"] {
        margin-top: 30px;
        margin-right: 10px;
        cursor: pointer;
    }
    input[type="radio"] + label > span {
        cursor: pointer;
        padding: 10px 10px 10px 62px;
        color: #333;
        font-weight: bold;
        display: block;
        height: 52px;
        line-height: 52px;
        vertical-align: middle;
    }
    input.selected-noroute + label > span {
        background: url('/img/icon/no_route.png') no-repeat left center;
    }

    input.selected-ow2h + label > span {
        background: url('/img/icon/home.png') no-repeat left center;
    }

    input.selected-ow2w + label > span {
        background: url('/img/icon/case.png') no-repeat left center;
    }

    input.selected-rt + label > span {
        background: url('/img/icon/round.png') no-repeat left center;
    }

</style>



<div id="screen1" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <h1>Daily Route</h1>
            <?php echo $this->Form->create('DailyRoute', array('autocomplete' => 'off', 'id' => 'DailyRoute', 'url' => $this->here)); ?>
            <?php echo $this->Form->hidden('id'); ?>

            <div class="radio-container" style="padding: 10px;">
                <h3>Select your direction of travel</h3>
                <div style="width: 60%; display: inline-block">
                    <?php echo $this->Form->radio('direction', array('no_route' => '<span>No daily route needed</span>'), array('hiddenField' => false, 'class' => 'select-route selected-noroute', 'legend' => false)); ?>
                    <?php echo $this->Form->radio('direction', array('one_way_to_work' => '<span>One Way (Home to work)</span>'), array('hiddenField' => false, 'class' => 'select-route selected-ow2w', 'legend' => false)); ?>
                    <?php echo $this->Form->radio('direction', array('one_way_to_home' => '<span>One Way (Work to home)</span>'), array('hiddenField' => false, 'class' => 'select-route selected-ow2h', 'legend' => false)); ?>
                    <?php echo $this->Form->radio('direction', array('round_trip' => '<span>Round Trip</span>' ), array('hiddenField' => false, 'class' => 'select-route selected-rt', 'legend' => false)); ?>
                </div>
            </div>

            <?php echo $this->Form->end(); ?>

            <div class="" style="padding: 10px; background: #fefefe; margin-bottom: 20px; border: 1px solid #eee;">


                <div class="home-address" style="display: block; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; background: #fafafa;">
                    <h3>Home Address:</h3>

                    <p>
                    <address style="margin-bottom: 20px;">
                        <?php

                        if ($daily['DailyRoute']['home_pickup'] === 'custom') {

                            echo $daily['DailyRoute']['home_pickup_street'] . "<br/>" .
                                 $daily['DailyRoute']['home_pickup_city'] . ", " .
                                 $daily['DailyRoute']['home_pickup_postcode'] . "<br/>" .
                                 $daily['DailyRoute']['home_pickup_country'];

                        } else {

                            echo $user['User']['street'] . "<br/>" .
                                 $user['User']['city'] . ", " .
                                 $user['User']['postcode'] . "<br/>" .
                                 $user['User']['country'];
                        }

                        ?>
                    </address>

                    <a style="display: block;" href="/passenger/daily/edit/home_pickup" class="change-origin whiteButton">Change Home</a>
                    </p>


                </div>
                <div class="work-address" style="display: block; margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; background: #fafafa;">
                    <h3>Work Location:</h3>
                    <p>
                    <address style="margin-bottom: 20px;">
                        <?php

                            if ($daily['DailyRoute']['work_pickup'] === 'custom') {

                                echo $daily['DailyRoute']['work_pickup_street'] . "<br/>" .
                                     $daily['DailyRoute']['work_pickup_city'] . ", " .
                                     $daily['DailyRoute']['work_pickup_postcode'] . "<br/>" .
                                     $daily['DailyRoute']['work_pickup_country'];

                            } else {

                                echo $daily['Office']['street'] . "<br/>" .
                                     $daily['Office']['city'] . ", " .
                                     $daily['Office']['postcode'] . "<br/>" .
                                     $daily['Office']['country'];
                            }

                        ?>
                    </address>

                    <a style="display: block;" href="/passenger/daily/edit/work_pickup" class="change-destination whiteButton">Change Work</a>
                    </p>


                </div>
            </div>
        </div>

    </fieldset>
</div>