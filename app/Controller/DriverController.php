<?php
class DriverController extends AppController {

    public $uses = array(
        'User'
    );

    public function beforeFilter() {


        $layout = $this->Session->read('current_layout');

        if (!$layout)
            $layout = 'passenger';

        $this->layout = $layout;

    }


    public function index() {



    }


}