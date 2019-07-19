@extends('cms.auth.layouts.auth')

@section('register')
    <body class="register">
    <div class="login_wrapper">
        <div class="animate form">
            <section class="login_content">
                <form method="post" action="{{route('register')}}" enctype="multipart/form-data" accept-charset="UTF-8"><input name="_token" type="hidden" value="PEKfUPheR9BvZSaLdqCjwnZGK1QTHVuspEKBpb8f">
                    {{csrf_field()}}
                    <h1>Create account</h1>
                    <div>
                        <input type="text" name="name" class="form-control"
                               placeholder="Name"
                               value="" required autofocus/>
                    </div>
                    <div>
                        <input type="email" name="email" class="form-control"
                               placeholder="E-Mail address"
                               required/>
                    </div>
                    <div>
                        <select class="form-control" name="status" id="status">
                            <option selected disabled>Choose option</option>
                            <option value="1">active</option>
                            <option value="0">inactive</option>
                        </select>
                        <a href="" style="color: red">{{$errors->first('status')}}</a>
                    </div>
                        <div>
                            <select class="form-control" name="privilege" id="privilege">
                                <option selected disabled>Choose option</option>
                                <option>admin</option>
                                <option>super_admin</option>
                            </select>
                            <a href="" style="color: red">{{$errors->first('privilege')}}</a>
                        </div>
                    <div>
                        <input type="file" name="upload" class="form-control"
                               value="" style="margin-bottom: 13px;" required autofocus/>
                    </div>
                        <div>
                        <input type="text" name="user_name" class="form-control"
                               placeholder="UserName"
                               value="" required autofocus/>
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control"
                               placeholder="Password"
                               required=""/>
                    </div>
                    <div>
                        <input type="password" name="confirm_password" class="form-control"
                               placeholder="Confirm password"
                               required/>
                    </div>




                    <div>
                        <button type="submit"
                                class="btn btn-default submit">Sign up</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member?
                            <a href="{{route('login')}}" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <div class="h1">Laravel Admin</div>
                            <p>&copy; 2018 Laravel Admin. All rights reserved</p>
                            <p>Terms of Service and Privacy Policy</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <div>
    </div>
    </body>
@endsection