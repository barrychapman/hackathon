<?php $this->set('backTarget', '/passenger/daily'); ?>

<?php echo $this->Html->css('bootstrap', null, array('inline' => false)); ?>

<script type="text/javascript">


    $(function() {

        $('.date-time-calc').combodate();

        if ($('.select-location:checked').val() === 'custom') {

            $('.custom-form-field').removeClass('disabled').attr('disabled', false);
            $('.form-container.custom').removeClass('disabled-form');

        } else {

            $('.custom-form-field').addClass('disabled').attr('disabled', true);
            $('.form-container.custom').addClass('disabled-form');

        }


        $(document.body).on('change', '.select-location', function() {

            if ($(this).val() === 'office') {

                $('.custom-form-field').addClass('disabled').attr('disabled', true);
                $('.form-container.custom').addClass('disabled-form');

            } else if ($(this).val() === 'custom') {

                $('.custom-form-field').removeClass('disabled').attr('disabled', false);
                $('.form-container.custom').removeClass('disabled-form');

            }

        });

    });


</script>



<style>

    .disabled-form {
        opacity: .5;
    }


    .form-container {
        padding: 20px; background: #fafafa; border-radius: 15px; border: 1px solid #ccc; margin-top: 10px;
    }

    table.pickup-dropoff-times {
        border-collapse: collapse;
        width: 60%;
    }

    table.pickup-dropoff-times thead th {
        border-bottom: 1px solid #333;
        padding-bottom: 5px;
        background: #fefefe;
        text-align: right;
    }

    table.pickup-dropoff-times tbody td {
        padding: 5px 0;
        background: #fefefe;
        text-align: right;
        border-bottom: 1px solid #999;
    }

    table.pickup-dropoff-times tbody tr:last-child td {
        border-bottom: none;
    }

    table.pickup-dropoff-times thead th:first-child,
    table.pickup-dropoff-times tbody td:first-child {
        text-align: left;
    }

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
    #DailyRouteWorkPickupOffice + label > span {
        background: url('/img/icon/loc_blu.png') no-repeat left center;
    }

    #DailyRouteWorkPickupCustom + label > span {
        background: url('/img/icon/loc_grn.png') no-repeat left center;
    }

</style>



<div id="screen1" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <h1>Daily Route</h1>
            <?php echo $this->Form->create('DailyRoute', array('autocomplete' => 'off', 'id' => 'DailyRoute', 'url' => $this->here)); ?>

            <div class="radio-container" style="padding: 10px;">
                <h3>Work Pickup Location</h3>
                <div style="display: inline-block">
                    <?php echo $this->Form->radio('work_pickup', array('office' => '<span>Use my Office (default)</span>'), array('hiddenField' => true, 'class' => 'select-location', 'legend' => false)); ?>
                    <?php echo $this->Form->radio('work_pickup', array('custom' => '<span>Enter a custom location</span>'), array('hiddenField' => false, 'class' => 'select-location', 'legend' => false)); ?>
                </div>
            </div>

            <div class="form-container times">

                <h3>Pickup/Drop-off Times</h3>

                <table class="pickup-dropoff-times" style="width: 60%; margin: 0 auto;">
                    <thead>
                    <tr>
                        <th style="width:3%;">Select</th>
                        <th style="width:15%; text-align: left;">Day</th>
                        <th style="width:37.5%;">Pickup Time</th>
                        <th style="width:37.5%;">Drop Off Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>

                            <?php echo $this->Form->checkbox('monday_pickup'); ?>

                        </td>
                        <td style="text-align: left;">Monday</td>

                        <td><?php echo $this->Form->input('mon_pickup', array('class' => 'date-time-calc',  'label' => false, 'id' => 'MondayPickupTime', 'data-template' => 'hh : mm a', 'default' => '7:00 am', 'data-format' => 'h:mm a')); ?></td>
                        <td><?php echo $this->Form->input('mon_dropoff', array('class' => 'date-time-calc', 'label' => false, 'id' => 'MondayDropoffTime', 'data-template' => 'hh : mm a', 'default' => '4:00 pm', 'data-format' => 'h:mm a')); ?></td>

                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->checkbox('tuesday_pickup'); ?>
                        </td>
                        <td style="text-align: left;">Tuesday</td>
                        <td><?php echo $this->Form->input('tues_pickup', array('class' => 'date-time-calc',  'label' => false, 'id' => 'TuesdayPickupTime', 'data-template' => 'hh : mm a', 'default' => '7:00 am', 'data-format' => 'h:mm a')); ?></td>
                        <td><?php echo $this->Form->input('tues_dropoff', array('class' => 'date-time-calc', 'label' => false, 'id' => 'TuesdayDropoffTime', 'data-template' => 'hh : mm a', 'default' => '4:00 pm', 'data-format' => 'h:mm a')); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->checkbox('wednesday_pickup'); ?>
                        </td>
                        <td style="text-align: left;">Wednesday</td>
                        <td><?php echo $this->Form->input('wed_pickup', array('class' => 'date-time-calc',  'label' => false, 'id' => 'WednesdayPickupTime', 'data-template' => 'hh : mm a', 'default' => '7:00 am', 'data-format' => 'h:mm a')); ?></td>
                        <td><?php echo $this->Form->input('wed_dropoff', array('class' => 'date-time-calc', 'label' => false, 'id' => 'WednesdayDropoffTime', 'data-template' => 'hh : mm a', 'default' => '4:00 pm', 'data-format' => 'h:mm a')); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->checkbox('thursday_pickup'); ?>
                        </td>
                        <td style="text-align: left;">Thursday</td>
                        <td><?php echo $this->Form->input('thu_pickup', array('class' => 'date-time-calc',  'label' => false, 'id' => 'ThursdayPickupTime', 'data-template' => 'hh : mm a', 'default' => '7:00 am', 'data-format' => 'h:mm a')); ?></td>
                        <td><?php echo $this->Form->input('thu_dropoff', array('class' => 'date-time-calc', 'label' => false, 'id' => 'ThursdayDropoffTime', 'data-template' => 'hh : mm a', 'default' => '4:00 pm', 'data-format' => 'h:mm a')); ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->checkbox('friday_pickup'); ?>
                        </td>
                        <td style="text-align: left;">Friday</td>
                        <td><?php echo $this->Form->input('fri_pickup', array('class' => 'date-time-calc',  'label' => false, 'id' => 'FridayPickupTime', 'data-template' => 'hh : mm a', 'default' => '7:00 am', 'data-format' => 'h:mm a')); ?></td>
                        <td><?php echo $this->Form->input('fri_dropoff', array('class' => 'date-time-calc', 'label' => false, 'id' => 'FridayDropoffTime', 'data-template' => 'hh : mm a', 'default' => '4:00 pm', 'data-format' => 'h:mm a')); ?></td>
                    </tr>
                    </tbody>
                </table>


            </div>


            <div class="form-container custom">

                <h3>Custom Location</h3>
                <p style="font-weight: bold; color: #333;">
                    <?php echo $this->Form->input('work_pickup_street', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('work_pickup_city', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('work_pickup_postcode', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('work_pickup_country', array('options' => array('Germany' => 'Germany'), 'style' => 'margin-left: 10px; width: 90%;', 'label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                </p>

            </div>

        </div>

    </fieldset>

    <?php echo $this->Form->submit('Save Changes', array('class' => 'grayButton')); ?>

</div>