<?php
class DriverController extends AppController {

    public $uses = array(
        'User',
        'Meeting'
    );

    public function beforeFilter() {


        $layout = $this->Session->read('current_layout');

        if (!$layout)
            $layout = 'passenger';

        $this->layout = $layout;

    }


    public function index() {

        $this->redirect('/driver/calendar');

    }

    public function calendar() {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $meetings = $this->User->MeetingUser->find(
            'all',
            array(
                'fields' => array(
                    'MeetingUser.*',
                    'DATE(`Meeting`.`time`) as meeting_date'
                ),
                'conditions' => array(
                    'MeetingUser.user_id' => $userId
                ),
                'order' => 'meeting_date ASC, Meeting.time ASC',
                'contain' => array(
                    'User' => array(
                        'fields' => array(
                            'User.*'
                        )
                    ),
                    'Meeting' => array(
                        'fields' => array(
                            'Meeting.*'
                        ),
                        'Location' => array(
                            'fields' => array(
                                'Location.*'
                            )
                        )
                    )
                )
            )
        );

        $this->set(compact('meetings'));

    }


    public function meeting($meetingId) {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $user = $this->User->find(
            'first',
            array(
                'conditions' => array(
                    'User.id' => $userId
                ),
                'contain' => array(
                    'Office'
                )
            )
        );

        $meeting = $this->Meeting->find(
            'first',
            array(
                'conditions' => array(
                    'Meeting.id' => $meetingId
                ),
                'contain' => array(
                    'Request' => array(
                        'User',
                        'conditions' => array(
                            'Request.meeting_id' => $meetingId,
                            'Request.status' => 'OPEN'
                        )
                    ),
                    'Location' => array(
                        'Area'
                    ),
                    'MeetingUser' => array(
                        'User' => array(
                            'Office'
                        )
                    )
                )
            )
        );

        $this->set(compact('meeting', 'user'));

    }

}