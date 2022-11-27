@extends('layout.app')

@section('content')
<section class="background-radial-gradient overflow-hidden">
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
      height: 220px;
      width: 220px;
      top: -50px;
      left: -130px;
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
      top: 220px;
      left: -700px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>

  <div class="container px-2 py-3 px-md-3 text-center text-lg-start my-3">
    <div class="row gx-lg-5 align-items-center mb-5">
      <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
        <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
          Sign In <br />
          <span style="color: hsl(218, 81%, 75%)">Laravel TO DO</span>
        </h1>
        <p class="mb-4 opacity-70" style="color: hsl(0,0%,100%); font-size: 24px">
            Remember your Work,<br /> from work to play.
        </p>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0 position-relative vh-100">
        <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
        <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
        <div id="radius-shape-3" class="position-absolute shadow-5-strong"></div>

        @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert" style="top: 80px;">
                {{Session::get('fail')}}
            </div>
        @endif

        <div class="card bg-glass" style="top: 110px;">
          <div class="card-body px-4 py-5 px-md-5">
            <form method="post" action="{{route('loginUser')}}">
              @csrf  
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

              <div class="form-outline mb-4">
                <p class="small fw-bold mt-2 pt-1 mb-4">Don't have an account? <a href="{{route('register')}}"
                    class="link-danger">Sign Up</a></p>
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">
                Login
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection