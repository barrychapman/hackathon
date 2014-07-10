<?php
class DriverController extends AppController {

    public $uses = array(
        'User',
        'Meeting',
        'Request',
        'Ride'
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
                    'Office',
                    'Car'
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
                            'Request.status' => array('OPEN', 'OFFERED')
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

    public function cancel_offer($rideId) {

        $ride = $this->Ride->find(
            'first',
            array(
                'conditions' => array(
                    'Ride.id' => $rideId
                ),
                'contain' => array(
                    'Request'
                )
            )
        );

        if ($ride) {

            $this->Ride->delete($rideId);

            $request = array(
                'Request' => $ride['Request']
            );

            $request['Request']['status'] = 'OPEN';
            $request['Request']['ride_id'] = NULL;

            $this->Request->id = $request['Request']['id'];
            $this->Request->save($request);

            $this->redirect('/driver/meeting/' . $request['Request']['meeting_id']);

        } else {

            $requests = $this->Request->find(
                'all',
                array(
                    'conditions' => array(
                        'Request.ride_id' => $rideId
                    )
                )
            );


            $this->Request->id = $requests[0]['Request']['id'];
            $this->Request->saveField('ride_id', NULL);
            $this->Request->saveField('status', 'OPEN');
            $this->redirect('/driver/meeting/' . $requests[0]['Request']['meeting_id']);

        }




    }

    public function offer($requestId) {

        $userId = $this->Session->read('LoggedInUser.User.id');

        $user = $this->User->find(
            'first',
            array(
                'conditions' => array(
                    'User.id' => $userId
                ),
                'contain' => array(
                    'Office',
                    'Car'
                )
            )
        );

        $request = $this->Request->find(
            'first',
            array(
                'conditions' => array(
                    'Request.id' => $requestId
                ),
                'contain' => array(
                    'Meeting'
                )
            )
        );

        if ($request) {
            $ride = array(
                'Ride' => array(
                    'desc' => 'Offered Ride',
                    'car_id' => 1,
                    'route_id' => $request['Request']['route_id'],
                    'driver_id' => $user['User']['id'],
                    'arrival_time' => $request['Meeting']['time'],
                    'pickup_time' => date('Y-m-d H:i:s', strtotime('-15 minutes', strtotime($request['Meeting']['time'])))
                )
            );

            unset($request['Request']['created'], $request['Request']['modified']);


            $this->Ride->create();
            $this->Ride->save($ride);

            $request['Request']['ride_id'] = $this->Ride->id;
            $request['Request']['status'] = 'OFFERED';

            $this->Request->id = $request['Request']['id'];
            $this->Request->save($request);


            $this->redirect('/driver/meeting/' . $request['Meeting']['id']);
        }





    }


}