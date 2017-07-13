@extends('layout.userlayout')
@section('content')
    <div class="intro-header">


        <!--<h1>Landing Page</h1>-->
        <!--<h3>A Template by Start Bootstrap</h3>-->
        <!--<hr class="intro-divider">-->
        <!--<ul class="list-inline intro-social-buttons">-->
        <!--<li>-->
        <!--<a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>-->
        <!--</li>-->
        <!--<li>-->
        <!--<a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>-->
        <!--</li>-->
        <!--<li>-->
        <!--<a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>-->
        <!--</li>-->
        <!--</ul>-->
        <div class="home-below-menu">
            <h2>CONTACT</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="col-lg-5">
                                <h5>Send us an email or a message on Facebook and an agent will be in touch within 24 hours</h5>
                                <form class="form-horizontal" action="" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Name" name="name" required/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Email" name="email" required/>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Phone number" name="phone" required/>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" required placeholder="Message" rows="8" name="message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="search-form btn pull-right">Send message</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 col-lg-offset-1">
                                <h5>Where to find us</h5>
                                <div id="map" style="width:auto;height:330px;background:yellow"></div>

                                <h5>Contact</h5>
                                <p>3rd floor, Jabes 1, 244 Cong Quynh street, Pham Ngu Lao ward, District 1, Ho Chi Minh city.</p>

                                <p>Phone: 028 22 532 489</p>

                                <p>Hotline: 0168 7443 002</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myMap() {
            var mapOptions = {
                center: new google.maps.LatLng(51.5, -0.12),
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
@endsection