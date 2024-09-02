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
                    <th>Child</th>
                    <th>Status</th>
                    <th>Remove</th>
                </tr>
                </thead>

                <tbody>
                @foreach($collection as $obj)
                    <tr>
                        <td>{{$obj->id}}</td>
                        <td>{{$obj->slug}}</td>
                        <td>{{$obj->title}} <a href="{{route('category.edit', with(encrypt($obj->id)))}}">Edit</a></td>
                        <td>
                            <ol>
                                @if(count($obj->childs)>0)
                                    @foreach($obj->childs as $ob)
                                        <li>{{$ob->title}}
                                            <ol>
                                                @foreach($ob->childs as $o)
                                                    <li>{{$o->title}}</li>
                                                @endforeach
                                            </ol>
                                        </li>
                                    @endforeach
                                @endif
                            </ol>

                        </td>
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
            <a href="{{route('category.create')}}" class="btn btn-dark">New Category</a>
        </div>
    </div>

@endsection
