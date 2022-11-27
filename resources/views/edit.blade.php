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
      height: 220px;
      width: 220px;
      top: -50px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }
  </style>

  <div class="container">
  <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>

    <div class="d-flex py-3">
      <div class="me-auto p-2"><span class="fw-bold ls-tight" style="color: hsl(218, 81%, 95%); font-size: 24px;">Laravel TO DO</span></div>
      <div class="p-2"><span style="color: hsl(218, 81%, 95%); font-size: 24px;">Welcome, <span style="color: hsl(0, 90%, 50%)">{{auth()->user()->fname}}</span></span></div>
    </div>

    <div class="container px-4 py-0">
    <span style="color: hsl(218, 81%, 95%); font-size: 16px;">Update To Do list</span>
        <form action="{{route('editTodo')}}" method="post">
            <div class="d-flex">
                @csrf
                <input type="hidden" name="id" value="{{$data->id}}">
                <input type="text" class="form-control m-1" name="todo" value="{{$data->todo}}" placeholder="Enter To do">
                <button type="submit" class="btn btn-primary m-1">Update</button>
            </div>
        </form>
    </div>
</section>
@endsection