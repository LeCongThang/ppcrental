<style>
    .modal-content{

        border-top-right-radius: 10px;
        border-top-left-radius: 10px;
        border:transparent;
    }
</style>
<div class="modal fade" id="signupModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-custom">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Sign up</h4>
            </div>
            <div class="modal-body">
                <form action="{{URL::asset('')}}/admin/create-language" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group text-center">
                        <img src="{{URL::asset('')}}images/users/user.png"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="username" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Confirm Password" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="fullname" placeholder="Fullname" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="phone" placeholder="Phone number" required/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="adress" placeholder="Address" required/>
                    </div>
                    <div class="form-actions no-color">

                        <input type="submit" value="Sign up" class="btn search-form"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>