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
                <h4 class="modal-title" id="myModalLabel">Sign in</h4>
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
                    <div class="form-group">
                        <a href="">Forgot password?</a><br>
                        <a href="">Don't have account?</a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Sign up" class="btn search-form"/>
                </div>
            </form>
        </div>
    </div>
</div>