function UIController()
{

    this.Location = {};
    this.User = { ID: 1 };
    this.DataProvider = new DataProvider();

    this.GetOutlookMeetings = getOutlookMeetings;
    this.GetPickupRequests = getPickupRequests;
    this.ShowPickupRequests = showPickupRequests;

    this.GetOfferedRides = getOfferedRides;
    this.ShowOfferedRides = showOfferedRides;

    this.GetAreasAndLocations = getAreasAndLocations;
    this.ShowAreasAndLocations = showAreasAndLocations;


    function getOutlookMeetings()
    {
        this.DataProvider.ListOutlookMeetings(this.User, showOutlookMeetings);
    }

    function showOutlookMeetings(data)
    {
        if(success)
        {
            // TODO: generate HTML
        }
    }



    function getPickupRequests()
    {
        this.DataProvider.ListRequestsOfPassenger(this.User, _uiController.ShowPickupRequests);
    }

    function showPickupRequests(data)
    {
        if(data != null)
        {
            var dateList = $('#passengerrequests');
            for(var a = 0; a < data.length; a++)
            {
               /* var date = data[a];

                var dateListItem = $('<li></li>');
                var link = $('<a href="#"></a>');
                link.text(date.date);
                var span = $('<span class="ui-list-icon"></span>');
                span.text(date.requests.length);
                link.append(span);
                dateListItem.append(link);
                dateList.append(dateListItem);

                alert(dateList);*/
                // TODO: generate HTML
            }
        }
    }


    function getOfferedRides()
    {
        this.DataProvider.ListRequestsForDriver(this.User, this.Location, _uiController.ShowOfferedRides);
    }

    function showOfferedRides(data)
    {
        if(data != null)
        {
            var dateList = $('#driverrequests');
            for(var a = 0; a < data.length; a++)
            {
                // TODO: generate HTML
            }
        }
    }


    function getAreasAndLocations()
    {
        this.DataProvider.ListAreasAndLocations(this.User, this.Location, _uiController.ShowAreasAndLocations);
    }

    function showAreasAndLocations(data)
    {
        if(data != null)
        {
            // TODO: generate HTML
        }
    }

}

var _uiController = new UIController();


$(document).ready(function() {
    _uiController.GetPickupRequests();
    _uiController.GetOfferedRides();
    _uiController.GetAreasAndLocations();
});
