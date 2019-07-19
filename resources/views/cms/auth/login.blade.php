@extends('cms.auth.layouts.auth')
@section('login')
    <body class="login">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @include('cms.layouts.messages')
                <form method="post" action="{{route('login')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <h1>Log in form</h1>

                    <div>
                        <input id="user_name" type="text" class="form-control" name="user_name" value=""
                               placeholder="UserName" required autofocus>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password"
                               placeholder="Password" required>
                    </div>
                    <div class="checkbox al_left">
                        <label>
                            <input type="checkbox"
                                   name="remember" > Remember Me
                        </label>
                    </div>



                    <div>
                        <button class="btn btn-default submit" type="submit">Log in</button>
                        <a class="reset_pass" href="http://localhost:8000/password/reset">
                            Forgot your password?
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <span>Sign in with:</span>
                        <div>
                            <a href="http://localhost:8000/social/redirect/google" class="btn btn-success btn-google-plus">
                                <i class="fa fa-google-plus"></i>
                                Google+
                            </a>
                            <a href="http://localhost:8000/social/redirect/facebook" class="btn btn-success btn-facebook">
                                <i class="fa fa-facebook"></i>
                                Facebook
                            </a>
                            <a href="http://localhost:8000/social/redirect/twitter" class="btn btn-success btn-twitter">
                                <i class="fa fa-twitter"></i>
                                Twitter
                            </a>
                        </div>
                    </div>

                    <div class="separator">
                        <p class="change_link">Do not have an account?
                            <a href="{{route('register')}}" class="to_register"> Sign up </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <div class="h1">Laravel Admin</div>
                            <p>&copy; 2018 Laravel Admin. All rights reserved</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    </div>
    </form>
    </section>
    </div>


    </div>
    </div>


    <div>
    </div>

</body>
    @endsection