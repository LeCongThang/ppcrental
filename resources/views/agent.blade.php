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
        <div class="home-below-menu"style="background: url('{{URL::asset('images/common_icon/title-bg.jpg')}}') no-repeat center center;background-size: cover;">
            <h2>FOR AGENT</h2>
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
                                <h3>Thông tin cơ bản</h3>


                            </div>
                            <hr>
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Property type</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Property status</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">City</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">District</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Ward</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Project</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Area</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Currency</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="8"></textarea>
                                    </div>
                                </div>
                                <hr/>
                                <h4>Thông tin khác</h4>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Mặt tiền(m)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Đường vào(m)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Hướng nhà</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Hướng ban công</label>
                                    <div class="col-sm-10">
                                        <select class="form-control">
                                            <option>Choose</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Floor</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Bedrooms</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Bathrooms</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Service</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <hr/>
                                <h4>Upload images</h4>
                                <hr/>
                                <button type="submit" class="btn search-form">Post project</button>
                            </form>

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
    <style>
        .form-group label{
            text-align: left !important;
        }
    </style>
@endsection