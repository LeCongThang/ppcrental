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
        <div class="home-below-menu"
             style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>SALE</h2>
        </div>


        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-heading">
                            <h3 class="panel-title">FIND YOUR PLACE</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-inline" action="" method="">
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Location</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Property Type</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Property Status</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">

                                    <input type="text" class="form-control" placeholder="Keyword"/>
                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Bedrooms</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-3">

                                    <select class="form-control">
                                        <option value="">Min Budget</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <select class="form-control">
                                        <option value="">Max Budget</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-3">
                                    <button type="submit" class="btn btn-default form-control search-form">Search
                                    </button>
                                </div>


                            </form>

                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-custom">
                        <div class="panel-body panel-body-custom">
                            <div class="col-lg-10">
                                <p>406 Properties found</p>

                            </div>
                            <div class="col-lg-2" style="padding-bottom: 20px;">
                                <select class="pull-right form-control">
                                    <option>Default</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{URL::asset('')}}images/project/image-1.jpg"
                                     class="img-responsive">
                                <h5>The Vista An Phu</h5>
                                <i style="color: #75D2F0">537 Nguyen Duy Trinh, District 2</i>
                                <p>Brand new apartments with unbelievable river and city view, completely renovated and tastefully furnished,
                                    with attention to details, modern colors, designer lighting and high quality accessories.</p>
                                <hr/>
                                <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> &nbsp; &nbsp;&nbsp; <span
                                            class="glyphicon glyphicon-bed"> 2Bedrooms</span></p>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{URL::asset('')}}images/project/image-1.jpg"
                                     class="img-responsive">
                                <h5>The Vista An Phu</h5>
                                <i style="color: #75D2F0">537 Nguyen Duy Trinh, District 2</i>
                                <p>Brand new apartments with unbelievable river and city view, completely renovated and tastefully furnished,
                                    with attention to details, modern colors, designer lighting and high quality accessories.</p>
                                <hr/>
                                <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> &nbsp; &nbsp;&nbsp; <span
                                            class="glyphicon glyphicon-bed"> 2Bedrooms</span></p>
                            </div>
                            <div class="col-lg-4">
                                <img src="{{URL::asset('')}}images/project/image-1.jpg"
                                     class="img-responsive">
                                <h5>The Vista An Phu</h5>
                                <i style="color: #75D2F0">537 Nguyen Duy Trinh, District 2</i>
                                <p>Brand new apartments with unbelievable river and city view, completely renovated and tastefully furnished,
                                    with attention to details, modern colors, designer lighting and high quality accessories.</p>
                                <hr/>
                                <p><span class="glyphicon glyphicon-home"> 50m<sup>2</sup></span> &nbsp; &nbsp;&nbsp; <span
                                            class="glyphicon glyphicon-bed"> 2Bedrooms</span></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection