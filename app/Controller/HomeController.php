<?php

class HomeController extends AppController {

    public $uses = array();

    public function index( $param = null ) {

        $this->set(compact('response'));

    }


    public function geo() {


        $args = func_get_args();

        debug($args);

        foreach( $args as $key => $arg) {
            $this->set('param' . $key, $arg);
        }

        //$this->set(compact('param1','param2'));


    }


    public function load() {

        $layout = $this->Session->read('current_layout');

        if (!$layout)
            $layout = 'passenger';


        $this->layout = $layout;

        $this->setAction($layout);


    }

    public function driver() {



    }

    public function passenger() {



    }


}