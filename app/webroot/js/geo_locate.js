
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize_map()
{

    directionsDisplay = new google.maps.DirectionsRenderer();
    var myOptions = {
        zoom: 19,
        mapTypeControl: false,
        streetViewControl: false,
        mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DEFAULT},
        navigationControl: true,
        navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map"), myOptions);
}




/*initi geo data selection */
function initmap(points, func, img)
{
// 	if(geo_position_js.init())
// 	{
// 		document.getElementById('current').innerHTML="Receiving...";
// 		geo_position_js.getCurrentPosition(show_position,function(){document.getElementById('current').innerHTML="Couldn't get location"},{enableHighAccuracy:true});
// 	}
// 	else
// 	{
// 		document.getElementById('current').innerHTML="Functionality not available";
// 	}

    show_position(points, func, img);


}

/*show position in map*/
function show_position(points, func, img)
{

    /*52.433466, 10.794749* mockup for hackathon*/

    console.log(typeof points);
    console.log(typeof points.origin);

    var lat = points.origin.lat;
    var lan = points.origin.lan;



    directionsDisplay.setMap(map);
    var pos=new google.maps.LatLng(lat, lan);
    map.setCenter(pos);
    directionsDisplay.setMap(map);
    map.setZoom(19);

    var infowindow = new google.maps.InfoWindow({
        content: '<img src="'+img+'" />'
    });

    var marker = new google.maps.Marker({
        position: pos,
        icon: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png",
        animation:google.maps.Animation.BOUNCE,
        map: map,
        title:"You are here"
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
    });

    if (func === 'passenger') {
        Route(points);
    } else if (func === 'driver') {


    }


}

function getRandomPoint(min, max) {
    return Math.random() * (max - min) + min;
}


function createMarker(count) {

    for (i = 0; i<count; i++) {

        /*52.422536, 10.746965*/
        /*52.449561, 10.782350*/



  /*      randlat = getRandomPoint(52.429840, 52.441738);
        randlon = getRandomPoint(10.742049, 10.789580);
*/
        randlat = getRandomPoint(52.446223, 52.446523);
        randlon = getRandomPoint(10.785519, 10.785819);
        var pos=new google.maps.LatLng(randlat, randlon);

        var marker = new google.maps.Marker({
            position: pos,
            icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
            animation:google.maps.Animation.BOUNCE,
            map: map,
            title:"You are here"
        });

    }
}


function Route(points) {

    /*receiving ending geo*/

    var start = new google.maps.LatLng(points.origin.lat, points.origin.lan);
    var end = new google.maps.LatLng(points.dest.lat, points.dest.lan);

    var request = {
        origin:start,
        destination:end,
        travelMode: google.maps.TravelMode.WALKING
    };
    directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(result);
        } else { alert("couldn't get directions:"+status); }
    });

}
google.maps.event.addDomListener(window,'load');


