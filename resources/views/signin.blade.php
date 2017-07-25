<style>
    .modal-content {

        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        border: transparent;
    }
</style>
<div class="modal fade" id="signinModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header modal-custom">
                <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">{{trans('home.signin')}}</h4>
            </div>
            <form action="{{URL::asset('')}}login" method="post">
                <div class="modal-body">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group" style="height: 40px">
                        <div class="col-lg-9">
                            <a href="">{{trans('home.forgot')}}</a><br>
                            <a href="">{{trans('home.donthave')}}</a>
                        </div>
                        <div class="col-lg-2">
                            <input type="submit" value="{{trans('home.signin')}}" class="btn search-form"/>
                        </div>
                    </div>


                </div>

            </form>
        </div>
    </div>
</div>