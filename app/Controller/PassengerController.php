<?php

App::uses('HttpSocket', 'Network/Http');

class PassengerController extends AppController {

    public $uses = array(
        'User',
        'DailyRoute',
        'Meeting',
        'Request',
        'Location'
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

    public function daily($func = null, $param = null) {

        if ($func === 'edit') {

            $userId = $this->Session->read('LoggedInUser.User.id');

            $daily = $this->DailyRoute->find(
                'first',
                array(
                    'contain' => false,
                    'conditions' => array(
                        'DailyRoute.user_id' => $userId
                    )
                )
            );


            if ($param === 'work_pickup') {

                if ($this->request->is('put') || $this->request->is('post')) {

                    // do save stuff

                    $this->DailyRoute->set($this->request->data);

                    if ($this->DailyRoute->validates()) {

                        if ($this->request->data['DailyRoute']['work_pickup'] === 'office') {
                            $save = array(
                                'DailyRoute' => array(
                                    'work_pickup_street' => NULL,
                                    'work_pickup_city' => NULL,
                                    'work_pickup_postcode' => NULL,
                                    'work_pickup_country' => NULL
                                )
                            );

                            $this->DailyRoute->id = $daily['DailyRoute']['id'];

                            $this->DailyRoute->save($this->request->data);

                            $this->DailyRoute->save($save, false);

                            $this->redirect('/passenger/daily');

                        } else {

                            $this->DailyRoute->id = $daily['DailyRoute']['id'];

                            $this->DailyRoute->save($this->request->data);

                            $this->redirect('/passenger/daily');

                        }

                    } else {

                        die('test');

                    }



                } else {

                    $this->request->data['DailyRoute'] = $daily['DailyRoute'];
                    $this->render('daily/edit_work_pickup');

                }





            } elseif ($param === 'home_pickup') {

                if ($this->request->is('put') || $this->request->is('post')) {

                    if ($this->request->is('put') || $this->request->is('post')) {

                        // do save stuff

                        $this->DailyRoute->set($this->request->data);

                        if ($this->DailyRoute->validates()) {

                            if ($this->request->data['DailyRoute']['home_pickup'] === 'home') {
                                $save = array(
                                    'DailyRoute' => array(
                                        'home_pickup_street' => NULL,
                                        'home_pickup_city' => NULL,
                                        'home_pickup_postcode' => NULL,
                                        'home_pickup_country' => NULL
                                    )
                                );

                                $this->DailyRoute->id = $daily['DailyRoute']['id'];

                                $this->DailyRoute->save($this->request->data);

                                $this->DailyRoute->save($save, false);

                                $this->redirect('/passenger/daily');

                            } else {

                                $this->DailyRoute->id = $daily['DailyRoute']['id'];

                                $this->DailyRoute->save($this->request->data);

                                $this->redirect('/passenger/daily');

                            }

                        } else {

                            die('test');

                        }



                    } else {

                        $this->render('daily/edit_home_pickup');

                    }



                } else {

                    $this->request->data['DailyRoute'] = $daily['DailyRoute'];
                    $this->render('daily/edit_home_pickup');

                }



            } else {
                $this->redirect('/passenger/daily');
            }





        }


        $userId = $this->Session->read('LoggedInUser.User.id');

        if ($this->request->is('ajax') && ($this->request->is('put') || $this->request->is('post'))) {

            $routeId = $this->request->data['DailyRoute']['id'];

            $daily = $this->DailyRoute->find(
                'first',
                array(
                    'conditions' => array(
                        'DailyRoute.id' => $routeId,
                        'DailyRoute.user_id' => $userId
                    )
                )
            );



            if ($daily) {

                $saved = $this->DailyRoute->save($this->request->data, false);
                echo json_encode($saved);
                exit();

            }


        }

        $daily = $this->DailyRoute->find(
            'first',
            array(
                'contain' => false,
                'joins' => array(
                    array(
                        'table' => 'users',
                        'alias' => 'Profile',
                        'type'  => 'inner',
                        'conditions' => array(
                            'Profile.id = DailyRoute.user_id'
                        )
                    ),
                    array(
                        'table' => 'locations',
                        'alias' => 'Office',
                        'type'  => 'inner',
                        'conditions' => array(
                            'Office.id = Profile.office_id'
                        )
                    )

                ),
                'fields' => array(
                    'Profile.*',
                    'Office.*',
                    'DailyRoute.*'
                ),
                'conditions' => array(
                    'DailyRoute.user_id' => $userId
                )
            )
        );

        if (!$daily) {
            $save = array(
                'DailyRoute' => array(
                    'user_id' => $userId
                )
            );

            $saved = $this->DailyRoute->save($save, false);
            $daily = $saved;

        }

        $user = $this->User->find('first', array('contain' => array('Office'), 'conditions' => array('User.id' => $userId)));

        $this->request->data = $daily;
        $this->set(compact('daily', 'user'));

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

    public function profile($param = null) {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $profile = $this->User->find(
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

        $this->set(compact('profile'));

        if ($param === 'edit') {

            if ($this->request->is('put') || $this->request->is('post')) {

                $this->User->id = $userId;

                $this->User->set($this->request->data);

                if ($this->User->validates()) {

                    $httpSocket = new HttpSocket();

                    $address = $this->request->data['User']['street'] . "\n" . $this->request->data['User']['city'] . ", " . $this->request->data['User']['postcode'] . ', Germany';

                    $result = $httpSocket->get('https://maps.googleapis.com/maps/api/geocode/json', array('address' => $address));

                    $resp = $result->body;

                    $resp = json_decode($resp);

                    $resp = Set::reverse($resp);

                    if ($resp['status'] === 'OK') {

                        $this->request->data['User']['lat']     = $resp['results'][0]['geometry']['location']['lat'];
                        $this->request->data['User']['lng']     = $resp['results'][0]['geometry']['location']['lng'];


                        $this->User->save($this->request->data);
                        $this->redirect('/passenger/profile');
                    } else {
                        // stuff for fails
                    }




                } else {
                    // validation errors
                }



            }


            $locations = $this->Location->find(
                'list',
                array(
                    'order' => 'Location.name ASC'
                )
            );

            $this->set(compact('locations'));

            $this->request->data = $profile;
            $this->render('edit_profile');
        }


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