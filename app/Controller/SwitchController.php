<?php
class SwitchController extends AppController {

    public $uses = array();


    public function to($param = null) {

        if ($param === 'passenger') {

            $this->Session->write('current_layout', 'passenger');
            $this->redirect('/home/load');

        } elseif ($param === 'driver') {

            $this->Session->write('current_layout', 'driver');
            $this->redirect('/home/load');

        } else {

            $this->Session->write('current_layout', 'default');
            $this->redirect('/home/load');

        }



    }



}