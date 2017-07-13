<style>
    .modal-content{

        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        border:transparent;
    }
</style>
<div class="modal fade" id="signinModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header modal-custom">
                <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Sign in</h4>
            </div>
            <div class="modal-body">
                <form action="{{URL::asset('')}}/admin/create-language" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <input class="form-control" type="text" name="language" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <a href="">Forgot password?</a><br>
                        <a href="">Don't have account?</a>
                    </div>
                    <div class="form-actions no-color">

                        <input type="submit" value="Sign in" class="btn search-form"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>