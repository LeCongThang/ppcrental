<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 wow fadeInDown" data-wow-duration="1.5s">
                <img src="{{URL::asset('')}}images/common_icon/footer-logo.png">
                <div class="padding30"></div>
                <ul class="list-inline">
                    <li><a href="{{$info->youtube}}" target="_blank"><img src="{{URL::asset('')}}images/common_icon/social1.png"></a></li>
                    <li><a href="{{$info->linked}}" target="_blank"><img src="{{URL::asset('')}}images/common_icon/social2.png"></a></li>
                    <li><a href="{{$info->facebook}}" target="_blank"><img src="{{URL::asset('')}}images/common_icon/social3.png"></a></li>
                </ul>
            </div>
            <div class="col-lg-4 wow fadeInRight" data-wow-duration="1.5s">
                <h4><strong style="color: #342315;">Perfect Property Company, VietNam</strong></h4>

                <hr style="color: #342315; border-bottom: 3px solid #342315"/>
@if(\Illuminate\Support\Facades\Session::get('locale')=='en')
                {!! $info->vietnam_address_en !!}
    @else
                    {!! $info->vietnam_address !!}
                @endif
            </div>
            <div class="col-lg-4 wow fadeInRight" data-wow-duration="1.5s">
                <h4><strong style="color: #342315;">Perfect Property Company, USA</strong></h4>

                <hr style="color: #342315; border-bottom: 3px solid #342315"/>

                {!! $info->usa_address_en !!}
            </div>

        </div>
    </div>
    <img src="{{URL::asset('')}}images/common_icon/footer-bg.png" class="img-responsive wow fadeInUp" data-wow-duration="1.5s"/>
    <div class="text-center">

        <p class="copyright text-muted small">Copyright &copy; Perfect Property Company 2017. All Rights Reserved</p>
        <p>Designed by <a href="https://hbbsolution.com"> HBB Solutions</a></p>

    </div>
</footer>