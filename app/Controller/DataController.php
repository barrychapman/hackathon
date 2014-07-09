<?php

class DataController extends AppController {

    public $uses = array();

    public function index()
    {

    }

    public function listareasandlocations( $param = null ) {
        $this->layout = 'ajax';
        $response = array(
            array(
                'id' => 1,
                'name' => 'CCH Congress Center Hamburg',
                'locations' => array(
                    array(
                        'id' => 1,
                        'latitude' => 59.21,
                        'longitude' => 9.49,
                        'name' => '2. OG, Raum 8'
                    ),
                    array(
                        'id' => 2,
                        'latitude' => 59.225,
                        'longitude' => 9.495,
                        'name' => '1. OG, Raum 7'
                    ),
                    array(
                        'id' => 3,
                        'latitude' => 59.231,
                        'longitude' => 9.491,
                        'name' => '1. OG, Raum 20'
                    )
                )
            ),
            array(
                'id' => 2,
                'name' => 'Flughafen Hamburg',
                'locations' => array(
                    array(
                        'id' => 4,
                        'latitude' => 59.24,
                        'longitude' => 9.47,
                        'name' => 'Terminal A'
                    ),
                    array(
                        'id' => 5,
                        'latitude' => 59.241,
                        'longitude' => 9.495,
                        'name' => 'Terminal B'
                    )
                )
            )
        );
        $this->set(compact('response'));
    }


    public function listoutlookmeetings( $param = null ) {
        $this->layout = 'ajax';
        $response = array(
            array(
                'id' => 1,
                'subject' => 'Mittagspause',
                'start' => '2014-07-09 10:00:00',
                'end' =>  '2014-07-09 11:00:00',
                'location' => array(
                    'id' => 1,
                    'latitude' => 59.21,
                    'longitude' => 9.49,
                    'name' => '2. OG, Raum 8'
                )
            ),
            array(
                'id' => 2,
                'subject' => 'Change Advisory Board',
                'start' => '2014-07-09 12:30:00',
                'end' =>  '2014-07-09 13:00:00',
                'location' => array(
                    'id' => 2,
                    'latitude' => 59.225,
                    'longitude' => 9.495,
                    'name' => '1. OG, Raum 7'
                )
            ),
            array(
                'id' => 2,
                'subject' => 'Change Advisory Board',
                'start' => '2014-07-09 12:30:00',
                'end' =>  '2014-07-09 13:00:00',
                'location' => array(
                    'id' => 2,
                    'latitude' => 59.225,
                    'longitude' => 9.495,
                    'name' => '1. OG, Raum 7'
                )
            )
        );
        $this->set(compact('response'));
    }


    public function listrequestsfordriver( $param = null ) {
        $this->layout = 'ajax';
        $response = array(
            array(
                'date' => '2014-07-09',
                'requests' => array(
                    array(
                        'id' => 1,
                        'status' => 1,
                        'arrivaltime' => '2014-07-09 14:00:00',
                        'route' => array(
                            'origin' => array(
                                'id' => 3,
                                'latitude' => 53.91,
                                'longitude' => 12.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            ),
                            'destination' => array(
                                'id' => 3,
                                'latitude' => 50.91,
                                'longitude' => 18.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            )
                        ),
                        'ride' => null
                    )
                )
            ),
            array(
                'date' => '2014-07-10',
                'requests' => array(
                    array(
                        'id' => 1,
                        'status' => 1,
                        'arrivaltime' => '2014-07-09 14:00:00',
                        'route' => array(
                            'origin' => array(
                                'id' => 3,
                                'latitude' => 53.91,
                                'longitude' => 12.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            ),
                            'destination' => array(
                                'id' => 3,
                                'latitude' => 50.91,
                                'longitude' => 18.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            )
                        ),
                        'ride' => null
                    )
                )
            ),
            array(
                'date' => '2014-07-10',
                'requests' => array(
                    array(
                        'id' => 1,
                        'status' => 1,
                        'arrivaltime' => '2014-07-09 14:00:00',
                        'route' => array(
                            'origin' => array(
                                'id' => 3,
                                'latitude' => 53.91,
                                'longitude' => 12.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            ),
                            'destination' => array(
                                'id' => 3,
                                'latitude' => 50.91,
                                'longitude' => 18.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            )
                        ),
                        'ride' => null
                    )
                )
            )
        );
        $this->set(compact('response'));
    }

    public function listrequestsofpassenger( $param = null ) {
        $this->layout = 'ajax';
        $response = array(
            array(
                'date' => '2014-07-09',
                'requests' => array(
                    array(
                        'id' => 1,
                        'status' => 2,
                        'arrivaltime' => '2014-07-09 14:00:00',
                        'route' => array(
                            'origin' => array(
                                'id' => 3,
                                'latitude' => 53.91,
                                'longitude' => 12.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            ),
                            'destination' => array(
                                'id' => 3,
                                'latitude' => 50.91,
                                'longitude' => 18.09,
                                'name' => 'Elysee Grand',
                                'area' => array(
                                    'id' => 1,
                                    'name' => 'CongressCenter Hamburg'
                                )
                            )
                        ),
                        'ride' => array(
                            array(
                                'status' => 1,
                                'driver' => array(
                                    'name' => 'Jan',
                                    'phone' => '0531-21285109',
                                    'email' => 'jan.david.peters@vwfs.com',
                                    'icon' => 'jan.jpg'
                                ),
                                'car' => array(
                                    'make' => 'Audi',
                                    'model' => 'A1 Sportback',
                                    'capacity' => 4,
                                    'carbonfootprint' => '+',
                                    'icon' => 'golf.jpg',
                                    'hp' => 90,
                                    'trunk' => true
                                )
                            ),
                            array(
                                'status' => 1,
                                'driver' => array(
                                    'name' => 'Jan',
                                    'phone' => '0531-21285109',
                                    'email' => 'jan.david.peters@vwfs.com',
                                    'icon' => 'jan.jpg'
                                ),
                                'car' => array(
                                    'make' => 'Audi',
                                    'model' => 'A1 Sportback',
                                    'capacity' => 4,
                                    'carbonfootprint' => '+',
                                    'icon' => 'golf.jpg',
                                    'hp' => 90,
                                    'trunk' => true
                                )
                            )
                        )
                    )
                )
            )
        );
        $this->set(compact('response'));
    }

    public function placepickuprequest( $param = null ) {
        $this->layout = 'ajax';
        $response = array('success' => true);
        $this->set(compact('response'));
    }

    public function acceptride( $param = null ) {
        $this->layout = 'ajax';
        $response = array('success' => true);
        $this->set(compact('response'));
    }

    public function offerride( $param = null ) {
        $this->layout = 'ajax';
        $response = array('success' => true);
        $this->set(compact('response'));
    }



}