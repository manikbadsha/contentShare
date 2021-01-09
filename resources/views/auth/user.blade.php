@extends('layouts.app')

@section('content')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{url('/')}}/login_asset/images/img-01.png" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ url('user/profile/register') }}" enctype="multipart/form-data">
                @csrf
                <span class="login100-form-title">
                    User Register
                </span>

                <input type="hidden" name="user" value="user">

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="">Name:</label>
                    <input class="input100" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
                </div>


                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="">Email:</label>
                    <input class="input100" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
                </div>



                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="">Date Of Birth:</label>
                    <input class="input100" id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="dob" placeholder="DOB">

                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
                </div>


                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <label for="">Phone:</label>
                    <input class="input100" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone">

                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span> -->
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" id="category_id" class="form-control">
                        <option value="male">Male</option>


                        <option value="female">Female</option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Image:</label>
                    <input type="file" class="@error('image') is-invalid @enderror" onchange="document.getElementById('img').src=window.URL.createObjectURL(this.files[0])" class="form-control" name="image" required>

                    <img id='img' alt="" class="form-fluid mt-1" style="height: 120px; width:120px;">
                    @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>










                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span> -->
                </div>



                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                    <!-- <span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span> -->
                </div>





                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>

                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">
                        Forgot
                    </span>
                    <a class="txt2" href="#">
                        Username / Password?
                    </a>
                </div>

                <div class="text-center p-t-136">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection