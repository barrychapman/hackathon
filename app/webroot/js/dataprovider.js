function DataProvider()
{
    this.ListOutlookMeetings = listOutlookMeetings;
    this.ListAreasAndLocations = listAreasAndLocations;
    this.ListRequestsForDriver = listRequestsForDriver;
    this.ListRequestsOfPassenger = listRequestsOfPassenger;
    this.OfferRide = offerRide;
    this.AcceptRide = acceptRide;

    this.OutlookMeetings;
    this.Locations;
    this.PickupRequestsAsPassenger;
    this.PickupRequestsAsDriver;


    function listOutlookMeetings(currentUser, callbackFunction)
    {
        $.ajax(
            {
                url: '/data/listoutlookmeetings',
                data: {},
                type: 'post',
                success: function(output) {
                    this.OutlookMeetings = jQuery.parseJSON(output);
                    callbackFunction(true);
                },
                error: function(xhr, status, error) {
                    callbackFunction(false);
                }
            }
        );
    }


    function listAreasAndLocations(currentUser, currentLocation, callbackFunction)
    {
        $.ajax(
            {
                url: '/data/listareasandlocations',
                data: {},
                type: 'post',
                success: function(output) {
                    this.Locations = jQuery.parseJSON(output);
                    /*var areas = this.Locations;
                    callbackFunction(true);

                    $('#result').text('test');

                    var resultString = "";
                    for(m in areas)
                    {
                        for(i in areas[m].locations)
                        resultString = resultString + areas[m].name + ": " + areas[m].locations[i].name + ": " + areas[m].locations[i].latitude + "," +  areas[m].locations[i].longitude + '<br>';
                    }
                    $('#result').html(resultString);*/
                    callbackFunction(this.Locations);
                },
                error: function(xhr, status, error) {
                    callbackFunction(false);
                }
            }
        );
    }

    function listRequestsForDriver(currentUser, currentLocation, callbackFunction)
    {
        $.ajax(
            {
                url: '/data/listrequestsfordriver',
                data: {},
                type: 'post',
                success: function(output) {
                    this.PickupRequestsAsDriver = jQuery.parseJSON(output);
                    /*var requests = this.PickupRequests;
                    $('#result').text('test');

                    var resultString = "";
                    for(m in this.PickupRequestsAsDriver)
                    {
                        var request = this.PickupRequestsAsDriver[m];
                        resultString = resultString +  request.route.origin.name + " to " + request.route.destination.name + " at " + request.arrivaltime + ", Status: " + request.status + '<br>';
                    }
                    $('#offers').html(resultString);*/
                    callbackFunction(this.PickupRequestsAsDriver);
                },
                error: function(xhr, status, error) {
                    callbackFunction(null);
                }
            }
        );
    }

    function listRequestsOfPassenger(currentUser, callbackFunction)
    {
        $.ajax(
            {
                url: '/data/listrequestsofpassenger',
                data: {
                    action: 'test'
                },
                type: 'post',
                success: function(output) {
                    this.PickupRequestsAsPassenger = jQuery.parseJSON(output);
                    /*$('#result').text('test');

                    var resultString = "";
                    for(m in this.PickupRequestsAsPassenger)
                    {
                        var request = this.PickupRequestsAsPassenger[m];
                        resultString = resultString +  request.route.origin.name + " to " + request.route.destination.name + " at " + request.arrivaltime + ", Status: " + request.status + ', Car: ' + request.ride.car.make + ' ' + request.ride.car.model + ' (Capacity: ' + request.ride.car.capacity + ')<br>';
                    }
                    $('#requests').html(resultString);*/
                    callbackFunction(this.PickupRequestsAsPassenger);
                },
                error: function(xhr, status, error) {
                    callbackFunction(null);
                }
            }
        );
    }


    function offerRide(request, callbackFunction)
    {
        $.ajax(
            {
                url: '/data/offerride',
                data: request,
                type: 'post',
                success: function(output) {
                    callbackFunction(true);
                },
                error: function(xhr, status, error) {
                    callbackFunction(false);
                }
            }
        );
    }

    function acceptRide(request)
    {
        $.ajax(
            {
                url: '/data/acceptride',
                data: request,
                type: 'post',
                success: function(output) {
                    callbackFunction(true);
                },
                error: function(xhr, status, error) {
                    callbackFunction(false);
                }
            }
        );
    }
}


