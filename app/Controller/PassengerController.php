<?php
class PassengerController extends AppController {

    public $uses = array(
        'User',
        'Meeting',
        'Request'
    );

    public function beforeFilter() {


        $layout = $this->Session->read('current_layout');

        if (!$layout)
            $layout = 'passenger';

        $this->layout = $layout;

        parent::beforeFilter();

    }

    public function index() {

        $this->redirect('/passenger/calendar');

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
                        'conditions' => array(
                            'Request.meeting_id' => $meetingId,
                            'Request.status' => 'OPEN'
                        )
                    ),
                    'Location' => array(
                        'Area'
                    ),
                    'MeetingUser' => array(
                        'User'
                    )
                )
            )
        );

        $this->set(compact('meeting', 'user'));

    }

    public function request($meetingId) {

        $this->set(compact('meetingId'));
        $userId = $this->Session->read('LoggedInUser.User.id');


        if ($this->request->is('post') || $this->request->is('put')) {



            $meeting = $this->Meeting->MeetingUser->find(
                'first',
                array(
                    'conditions' => array(
                        'MeetingUser.meeting_id' => $this->request->data['Request']['meeting_id'],
                        'MeetingUser.user_id' => $userId
                    ),
                    'contain' => array(
                        'User' => array(
                            'Office' => array(
                                'Area'
                            )
                        ),
                        'Meeting' => array(
                            'Location' => array(
                                'Area'
                            )
                        )
                    )
                )
            );

            $this->loadModel('Route');

            $route = $this->Route->find(
                'first',
                array(
                    'conditions' => array(
                        'Route.origin_id' => $this->Session->read('LoggedInUser.User.office_id'),
                        'Route.dest_id' => $meeting['Meeting']['location_id']
                    )
                )
            );

            if ($route) {
                $routeId = $route['Route']['id'];
            } else {

                $route = array(
                    'Route' => array(
                        'dest_id' => $meeting['Meeting']['location_id'],
                        'origin_id' => $this->Session->read('LoggedInUser.User.office_id')
                    )
                );

                $this->Route->save($route);
                $routeId = $this->Route->id;

            }


            $save = array(
                'Request' => array(
                    'desc' => 'Request for ride',
                    'user_id' => $userId,
                    'meeting_id' => $meeting['Meeting']['id'],
                    'arrival_time' => $meeting['Meeting']['time'],
                    'status' => 'OPEN',
                    'route_id' => $routeId
                )
            );

            $this->Request->create();
            $this->Request->save($save);
            $this->Session->setFlash('Your route request has been submitted');
            $this->redirect('/passenger/events');

        }


        $meeting = $this->Meeting->MeetingUser->find(
            'first',
            array(
                'conditions' => array(
                    'MeetingUser.meeting_id' => $meetingId,
                    'MeetingUser.user_id' => $userId
                ),
                'contain' => array(
                    'User' => array(
                        'Office' => array(
                            'Area'
                        )
                    ),
                    'Meeting' => array(
                        'Location' => array(
                            'Area'
                        )
                    )
                )
            )
        );

        $this->set(compact('meeting'));

    }

    public function event($requestId) {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $event = $this->User->Request->find(
            'first',
            array(
                'conditions' => array(
                    'Request.user_id' => $userId,
                    'Request.id' => $requestId,
                    'Request.status' => array('OPEN','ACCEPTED','OFFERED')
                ),
                'contain' => array(
                    'User',
                    'Meeting' => array(
                        'Location'
                    ),
                    'Ride' => array(
                        'Driver' => array(
                            'Office'
                        )
                    )
                )
            )
        );

        $this->set(compact('event'));

    }

    public function events() {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $events = $this->User->Request->find(
            'all',
            array(
                'conditions' => array(
                    'Request.user_id' => $userId,
                    'Request.status' => array('OPEN','OFFERED')
                ),
                'contain' => array(
                    'User',
                    'Meeting' => array(
                        'order' => 'Meeting.time ASC'
                    )
                )
            )
        );

        $this->set(compact('events'));

    }

    public function cancel($requestId) {
        $userId = $this->Session->read('LoggedInUser.User.id');


        $request = $this->Request->find(
            'first',
            array(
                'conditions' => array(
                    'Request.id' => $requestId,
                    'Request.user_id' => $userId
                ),
                'contain' => false
            )
        );

        $request['Request']['status'] = 'CANCELLED';

        unset($request['Request']['created'], $request['Request']['modified']);

        $this->Request->id = $requestId;
        $this->Request->save($request);

        $this->redirect('/passenger/calendar');

    }


}