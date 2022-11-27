@extends('layout.app')

@section('content')
<section class="background-radial-gradient vh-100 overflow-hidden">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),

        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      height: 220px;
      width: 220px;
      top: 100px;
      left: -110px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 220px;
      height: 220px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-3 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      height: 220px;
      width: 220px;
      top: 180px;
      left: -700px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-3 py-5 px-md-3 text-center text-lg-start my-3">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Sign Up <br />
          <span style="color: hsl(218, 81%, 75%)">Laravel TO DO</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(0,0%,100%); font-size: 24px">
            Remember your Work,<br /> from work to play.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
        <div id="radius-shape-1" class="position-absolute shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <div id="radius-shape-3" class="position-absolute shadow-5-strong"></div>

        <div class="card bg-glass">
          <div class="card-body px-3 py-4 px-md-5">
            <form method="post" action="{{route('registerUser')}}">
              @csrf
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mt-3 mb-4">
                  <div class="form-outline">
                    <input type="text" name="fname" class="form-control  @error('fname') is-invalid @enderror" />
                    <label class="form-label" for="fname">First name</label>
                    @error('fname')
                    <div class="invalid-feedback" style="font-size:9px; margin:0">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 mt-3 mb-4">
                  <div class="form-outline">
                    <input type="text" name="lname" class="form-control  @error('lname') is-invalid @enderror" />
                    <label class="form-label" for="lname">Last name</label>
                    @error('lname')
                    <div class="invalid-feedback" style="font-size:9px; margin:0">
                        {{$message}}
                    </div>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" />
                <label class="form-label" for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback" style="font-size:9px; margin:0">
                    {{$message}}
                </div>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />
                <label class="form-label" for="password">Password</label>
                @error('password')
                  <div class="invalid-feedback" style="font-size:9px; margin:0">
                      {{$message}}
                  </div>
                @enderror
              </div>

              <!-- Confirm Password input -->
              <div class="form-outline mb-4">
                <input type="password" name="repassword" class="form-control @error('repassword') is-invalid @enderror" />
                <label class="form-label" for="repassword">Re-Enter Password</label>
                @error('repassword')
                <div class="invalid-feedback" style="font-size:9px; margin:0">
                    {{$message}}
                </div>
                @enderror
              </div>

              <div class="form-outline mb-3">
                <p class="small fw-bold mt-2 pt-1 mb-2">Already have an account? <a href="{{route('login')}}"
                    class="link-danger">Login</a></p>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-3">
                Sign up
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection