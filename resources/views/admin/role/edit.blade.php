@extends('adminpanel.master')
@section('content')
    <div class="container">
        <div class="max-w-xl">
            <form action="{{route('admin.roles.update',$role->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" value="{{$role->name}}" placeholder="Name"
                           name="name">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>

        <div class="mt-6 p-2">
            <h2 class="text-2xl font-semibold">
                Role Permissions
            </h2>
            <div class="mt-4">

                @if($role->permissions)

                    @foreach($role->permissions as $permission)
                        <span>{{$permission->name}}</span>

                    @endforeach
                @endif
            </div>
            <div class="max-w-x3l">
                <form action="{{route('admin.role.permissions',$role->id)}}" method="post">
                    @csrf


                    <label for="permissions">Permission :</label>
                    <select class="form-select" aria-label="Default select example" name="permission" id="permissions">
                        {{--                        <option selected>Huquq tanlash</option>--}}
                        @foreach($permissions as $permission)

                            <option value="{{$permission->name}}">{{$permission->name}}</option>

                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Assign</button>
                </form>
            </div>
        </div>
    </div>

@endsection
