<?php

class UserController extends AppController {

    public $uses = array('User');


    public function select($userId = null) {

        $user = $this->User->find(
            'first',
            array(
                'conditions' => array(
                    'User.id' => $userId
                )
            )
        );

        if (!$user) {
            $this->Session->setFlash('Error: User not found');
            $this->redirect('/');
        } else {
            $this->Session->write('LoggedInUser', $user);
            $this->redirect('/home/load');
        }






    }



}