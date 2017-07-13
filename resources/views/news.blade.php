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
            <h2>NEWS</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="newspage">
                                <h3>Welcome!</h3>
                                <i>ancvdasdfls</i>
                                <img src="{{URL::asset('')}}images/homepage/banner.jpg" class="img-responsive">
                                <p>Perfect Property Company (PPC) is known as a professional enterprise operating in the
                                    field of real estate brokerage and marketing both domestically and internationally.
                                    PPC
                                    focuses on two main areas:
                                    - Real estate - Tourist Resorts PPC is the most trusted and satisfied option for all
                                    customers. PPC is found and </p>
                                <a href="" class="btn search-form pull-right">Read more</a>

                            </div>
                            <hr>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">FIND YOUR PLACE</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal-" action="" method="">
                                <div class="form-group">

                                    <select class="form-control">
                                        <option value="">Location</option>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <select class="form-control">
                                        <option value="">Property Type</option>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <select class="form-control">
                                        <option value="">Property Status</option>
                                    </select>
                                </div>

                                <div class="form-group">

                                    <select class="form-control">
                                        <option value="">Bedrooms</option>
                                    </select>

                                </div>
                                <div class="form-group">

                                    <select class="form-control">
                                        <option value="">Min Budget</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option value="">Max Budget</option>
                                    </select>
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control" placeholder="Keyword"/>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default form-control search-form">Search
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>

                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">FEATURE PROPERTIES</h3>

                        </div>
                        <div class="panel-body">

                                <div class="col-lg-12">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>

                                <div class="col-lg-12">
                                    <img src="{{URL::asset('')}}images/homepage/property.jpg"
                                         class="district img-responsive">
                                    <h5>The Vista An Phu</h5>
                                    <i>537 Nguyen Duy Trinh, District 2</i>
                                    <hr/>
                                    <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> <span
                                                class="glyphicon glyphicon-bed pull-right"> 2Bedrooms</span></p>
                                </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection