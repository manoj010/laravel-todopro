@extends('layout.app')

@section('content')
<section class="container-fluid">
  <style>

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
      <div class="p-2"><span style="color: hsl(218, 81%, 95%); font-size: 24px; z-index: 10;">Welcome, <span style="color: hsl(0, 90%, 50%)">{{auth()->user()->fname}}</span></span></div>
      <div class="p-2">                    
        <form action="{{route('logout')}}" method="get">
            <button type="submit" class="btn btn-danger">Log Out</button>
        </form>
      </div>
    </div>

    <div class="container px-4 py-0">
    <span style="color: hsl(218, 81%, 95%); font-size: 16px;">Add To Do to list</span>
        <form action="{{route('addTodo')}}" method="post">
            <div class="d-flex">
                @csrf
                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                <input type="text" name="todo" class="form-control m-1 @error('todo') is-invalid @enderror" placeholder="Enter To do">
                <button type="submit" class="btn btn-primary m-1">Add</button>
            </div>
        </form>
    </div>

    <div class="container py-4">
        <table class="table table-striped table-dark border-success table-hover table-sm">
            <thead>
                <tr>
                <th scope="col" class="px-3">SN</th>
                <th scope="col">To Do</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @php 
                    $sn = 1;
                @endphp
                @foreach($todos as $todo)
                    <tr>
                        <th scope="row" class="px-3">{{$sn++}}</th>
                        <td style="width:800px;">{{$todo->todo}}</td>
                        <td><button type="button" class="btn btn-primary btn-sm"><a class="text-white text-decoration-none" href="{{url('/edit/'.$todo->id)}}">Edit</a></button></td>
                        <td><button type="button" class="btn btn-danger btn-sm"><a class="text-white text-decoration-none" href="{{url('/delete/'.$todo->id)}}">Delete</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection