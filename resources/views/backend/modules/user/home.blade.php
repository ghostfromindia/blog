@extends('backend.layout.base')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">{{$name}}</h1>
            <hr>
        </div>


        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Slug</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Remove</th>
                </tr>
                </thead>

                <tbody>
                @foreach($collection as $obj)
                    <tr>
                        <td>{{$obj->id}}</td>
                        <td><a href="{{route('user.edit', with(encrypt($obj->id)))}}">{{$obj->name}}</a></td>
                        <td>{{$obj->email}}</td>

                        <td>{!! $obj->status == 1? '<span class="text-success">active</span>' : '<span class="text-danger">inactive</span>' !!}</td>
                        <td>Remove</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            {!! $collection->links('backend.layout.pagination') !!}
        </div>

    </div>

    <div>
        <div class="floating-action-bar">
            <a href="{{route('user.create')}}" class="btn btn-dark">New User</a>
        </div>
    </div>

@endsection
