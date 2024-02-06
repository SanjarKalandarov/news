@extends('adminpanel.master')
@section('content')
    <div class="container">
        <h1 class="text-blue">Permissions Edit</h1>
        <br>
        <form action="{{route('admin.permissions.update',$permissions->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" value="{{$permissions->name}}" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>



@endsection
