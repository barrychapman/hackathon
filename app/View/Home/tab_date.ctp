



<!-- Start of first page -->
<div data-role="page" id="page_inital">

    <div data-role="header">
        <h1>Landing Page (Blue Points)</h1>
    </div>
    <!-- /header -->

    <div data-role="main" class="ui-content">
        <p>Welcome to Blue Points</p>

        <div class="ui-grid-b">
            <div class="ui-block-a">
                <a class="ui-btn ui-shadow" href="#page_driver_home">User
                    A</a>
            </div>
            <div class="ui-block-b">
                <a data-role="button" href="#page_driver_home">User B <img
                        alt="" src="/img/Bert.svg">
                </a>
            </div>
            <div class="ui-block-c">
                <a data-role="button" href="#page_driver_home">User C</a>
            </div>
            <div class="ui-block-a">
                <a data-role="button" href="#page_driver_home">User D</a>
            </div>
            <div class="ui-block-b">
                <a data-role="button" href="#page_driver_home">User E</a>
            </div>
            <div class="ui-block-c">
                <a data-role="button" href="#page_driver_home">User F</a>
            </div>

        </div>
    </div>
    <!-- /content -->
</div>
<!-- /page -->

<div data-role="page" id="page_driver_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_passenger_home" data-icon="recycle"
           class="ui-btn-left" data-transition="flow">Passenger</a>

        <h1>Driver Home</h1>
        <a href="#page_driver_options" data-icon="gear"
           class="ui-btn-right" data-transition="slide">Options</a>
        <!-- /navbar -->

        <!-- /header -->
    </div>

    <div data-role="tabs" id="driver_home_tabs">
        <div data-role="navbar">
            <ul>
                <li><a href="#page_driver_tab_pickups" data-icon="navigation" data-theme="a"
                       data-ajax="true">Pickups</a></li>
                <li><a href="#page_driver_tab_events" data-icon="comment" data-theme="a" data-ajax="false">Events</a>
                </li>
                <li><a href="#page_driver_tab_page3" data-icon="eye" data-theme="a" data-ajax="false">...</a></li>
            </ul>
        </div>
        <!-- /navbar -->

        <!-- /header -->

        <div id="page_driver_tab_pickups" class="ui-body-d  ui-content">
            <p>Pickups</p>

            <div class="ui-corner-all custom-corners">
                <div class="ui-bar ui-bar-a">
                    <h3>Heading</h3>
                </div>
                <div class="ui-body ui-body-a">
                    <p>Content</p>
                </div>
            </div>


            <div class="ui-body ui-body-a ui-corner-all">
                <h3>Heading</h3>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse accumsan blandit fermentum.
                    Pellentesque cursus mauris purus, auctor commodo mi ullamcorper nec. Donec semper mattis eros, nec
                    condimentum ante sollicitudin quis. Etiam orci sem, porttitor ut tellus nec, blandit posuere urna.
                    Proin a arcu non lacus pretium faucibus. Aliquam sed est porttitor, ullamcorper urna nec, vehicula
                    lorem. Cras porttitor est lorem, non venenatis diam convallis congue.</p>
            </div>

            <ul data-role="listview" data-inset="true">
                <li data-role="list-divider">Friday, October 8, 2010 <span class="ui-li-count">2</span></li>
                <li><a href="index.html">
                        <h2>Stephen Weber</h2>

                        <p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>

                        <p>Hey Stephen, if you're available at 10am tomorrow, we've got a meeting with the jQuery
                            team.</p>

                        <p class="ui-li-aside"><strong>6:24</strong>PM</p>
                    </a></li>
                <li><a href="index.html">
                        <h2>jQuery Team</h2>

                        <p><strong>Boston Conference Planning</strong></p>

                        <p>In preparation for the upcoming conference in Boston, we need to start gathering a list of
                            sponsors and speakers.</p>

                        <p class="ui-li-aside"><strong>9:18</strong>AM</p>
                    </a></li>
                <li data-role="list-divider">Thursday, October 7, 2010 <span class="ui-li-count">1</span></li>
                <li><a href="index.html">
                        <h2>Avery Walker</h2>

                        <p><strong>Re: Dinner Tonight</strong></p>

                        <p>Sure, let's plan on meeting at Highland Kitchen at 8:00 tonight. Can't wait!</p>

                        <p class="ui-li-aside"><strong>4:48</strong>PM</p>
                    </a></li>
            </ul>


            <div data-role="footer" data-position="fixed" data-tap-toggle="false">
                <p>Footer</p>
            </div>
            <!-- /footer -->
        </div>


        <div id="page_driver_tab_events" class="ui-content">

            <!-- dynamic loading  -->
            <ul data-role="listview" data-count-theme="b" data-inset="false">
                <li><a href="#">Today<span class="ui-li-count">10</span></a></li>
                <li style="background-color: #888"><a href="#">10. July 2014<span
                            class="ui-li-count">3</span></a></li>
                <li><a class="click-nav" data-date="1" href="#">11. July 2014<span class="ui-li-count">5</span></a></li>
                <li><a class="click-nav" data-date="2" href="#">12. July 2014<span class="ui-li-count">1</span></a></li>
                <li><a class="click-nav" data-date="3" href="#">13. July 2014<span class="ui-li-count">3</span></a></li>
            </ul>
        </div>

        <div id="page_driver_tab_page3" class="ui-content">
            <h1>Page3</h1>
        </div>
    </div>
</div>


<div data-role="page" id="page_passenger_home">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_driver_home" data-icon="recycle"
           class="ui-btn-left" data-transition="flow"
           data-direction="reverse">Driver</a>

        <h1>Passenger Home</h1>
        <!-- <a href="#" data-icon="gear" class="ui-btn-right">Options</a> -->
    </div>


    <div data-role="tabs" id="passenger_home_tabs">
        <div data-role="navbar">
            <ul>
                <li><a href="#page_passenger_tab_requests" data-icon="navigation" data-theme="a" data-ajax="false">Requests</a>
                </li>
                <li><a href="#page_passenger_tab_rides" data-icon="comment" data-theme="a" data-ajax="false">Rides</a>
                </li>
                <li><a href="#page_passenger_tab_add" data-icon="plus" data-theme="a" data-ajax="false">Add</a></li>
            </ul>
        </div>


        <div id="page_passenger_tab_requests" class="ui-body-d ui-content">

            <!-- dynamic loading  -->
            <ul data-role="listview" data-count-theme="b" data-inset="false">
                <li><a href="#">Today<span class="ui-li-count">10</span></a></li>
                <li style="background-color: #888"><a href="#">10. July 2014<span
                            class="ui-li-count">3</span></a></li>
                <li><a href="#">11. July 2014<span class="ui-li-count">5</span></a></li>
                <li><a href="#">12. July 2014<span class="ui-li-count">1</span></a></li>
                <li><a href="#">13. July 2014<span class="ui-li-count">3</span></a></li>
            </ul>
        </div>

        <div id="page_passenger_tab_rides" class="ui-content">
            RIDE TAB
        </div>

        <div id="page_passenger_tab_add" class="ui-content">
            [ADD TAB]
        </div>
    </div>


    <!-- /navbar -->
</div>


<?php

#echo json_encode($response);


?>


<div data-role="page" id="page_driver_offer_ride">page_driver_offer_ride</div>

<div data-role="page" id="page_driver_options">
    <div data-role="header" style="overflow: hidden;">
        <a href="#page_driver_home" data-icon="back" class="ui-btn-left"
           data-transition="slide" data-direction="reverse">Back</a>

        <h1>Driver Options</h1>
    </div>
    <!-- /header -->


</div>