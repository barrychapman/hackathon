<?php $this->set('backTarget', '/passenger/profile'); ?>





<div id="screen1" title="<?php echo $profile['User']['name']; ?> Info" class="panel" selected="true">
    <fieldset style="padding: 10px;">
        <div class="row">
            <h1>Editing My Profile</h1>
            <?php echo $this->Form->create('User', array('autocomplete' => 'off', 'url' => $this->here)); ?>
            <p style="font-weight: bold; color: #000;"><img src="/img/muppets/<?php echo $profile['User']['icon']; ?>"></p>
            <p style="font-weight: bold; color: #333;">
                <h3>Home Address</h3>
                <?php echo $this->Form->input('street', array('label' => array('class' => 'label-element'), 'class' => 'form-field')); ?>
                <?php echo $this->Form->input('city', array('label' => array('class' => 'label-element'), 'class' => 'form-field')); ?>
                <?php echo $this->Form->input('postcode', array('label' => array('class' => 'label-element'), 'class' => 'form-field')); ?>
                <?php echo $this->Form->input('country', array('options' => array('Germany' => 'Germany'), 'style' => 'margin-left: 10px; width: 90%;', 'label' => array('class' => 'label-element'), 'class' => 'form-field')); ?>
            </p>
            <p style="font-weight: bold; color: #000;">
                <h3>Office Location</h3>

                <?php echo $this->Form->input('office_id', array('options' => $locations, 'style' => 'margin-left: 10px; width: 90%;', 'label' => false)); ?>


            </p>
            <p style="font-weight: bold; color: #000;">
                <h3>My Default View</h3>
                <?php echo $this->Form->input('default_view', array('options' => array('passenger' => 'Passenger', 'driver' => 'Driver'), 'style' => 'margin-left: 10px; width: 90%;', 'label' => false)); ?>
            </p>
            <?php echo $this->Form->submit('Save Profile', array('class' => 'grayButton', 'id' => 'submitForm')); ?>
            <?php echo $this->Form->end(); ?>
        </div>

    </fieldset>
</div>