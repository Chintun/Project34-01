@extends('layouts.masterauthen')
@section('content')

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}" class="user" >
                        @csrf

                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-user"
                                placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user"
                                placeholder="Email Address">
                        </div>
                        <div class="form-group">

                                <input type="password" name="password" class="form-control form-control-user"
                                     placeholder="Password">


                        </div>
                        <div class="form-group">

                                <input type="password" name="password_confirmation" class="form-control form-control-user"
                                     placeholder="Confirm Password">


                        </div>
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Register">

                        <hr>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('login') }}">Have Account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>


@endsection
