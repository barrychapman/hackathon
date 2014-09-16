<?php $this->set('backTarget', '/passenger/daily'); ?>

<script type="text/javascript">

    $(function() {

        if ($('.select-location:checked').val() === 'custom') {

            $('.custom-form-field').removeClass('disabled').attr('disabled', false);
            $('.form-container').removeClass('disabled-form');

        } else {

            $('.custom-form-field').addClass('disabled').attr('disabled', true);
            $('.form-container').addClass('disabled-form');

        }


        $(document.body).on('change', '.select-location', function() {

            if ($(this).val() === 'home') {

                $('.custom-form-field').addClass('disabled').attr('disabled', true);
                $('.form-container').addClass('disabled-form');

            } else if ($(this).val() === 'custom') {

                $('.custom-form-field').removeClass('disabled').attr('disabled', false);
                $('.form-container').removeClass('disabled-form');

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
    #DailyRouteHomePickupHome + label > span {
        background: url('/img/icon/loc_blu.png') no-repeat left center;
    }

    #DailyRouteHomePickupCustom + label > span {
        background: url('/img/icon/loc_grn.png') no-repeat left center;
    }

</style>



<div id="screen1" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <h1>Daily Route</h1>
            <?php echo $this->Form->create('DailyRoute', array('autocomplete' => 'off', 'id' => 'DailyRoute', 'url' => $this->here)); ?>

            <div class="radio-container" style="padding: 10px;">
                <h3>Home Pickup Location</h3>
                <div style="display: inline-block">
                    <?php echo $this->Form->radio('home_pickup', array('home' => '<span>Use my Home (default)</span>'), array('hiddenField' => true, 'class' => 'select-location', 'legend' => false)); ?>
                    <?php echo $this->Form->radio('home_pickup', array('custom' => '<span>Enter a custom location</span>'), array('hiddenField' => false, 'class' => 'select-location', 'legend' => false)); ?>
                </div>
            </div>

            <div class="form-container">

                <h3>Custom Location</h3>
                <p style="font-weight: bold; color: #333;">
                    <?php echo $this->Form->input('home_pickup_street', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('home_pickup_city', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('home_pickup_postcode', array('label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                    <?php echo $this->Form->input('home_pickup_country', array('options' => array('Germany' => 'Germany'), 'style' => 'margin-left: 10px; width: 90%;', 'label' => array('class' => 'label-element'), 'class' => 'custom-form-field')); ?>
                </p>

            </div>

        </div>

    </fieldset>

    <?php echo $this->Form->submit('Save Changes', array('class' => 'grayButton')); ?>

</div>