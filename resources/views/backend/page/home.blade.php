@extends('backend.layout.base')


@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4">Products</h1>
            <hr>
        </div>

        <div class="col-md-12 d-none">
            <div class="row">

                <div class="col-md-4 col-lg-3">
                    <x-backend.select2 label="Category" name="categories" url="{{route('category.select2search')}}" multiple/>
                </div>

                <div class="col-md-4 col-lg-3">
                    <label class="d-block" for="category">Category</label>
                    <select name="" id="category" class="form-control w-auto d-inline">
                        <option value="">All</option>
                        <option value="">Red Rose</option>
                    </select>
                </div>

                <div class="col-md-4 col-lg-3">
                    <label class="d-block" for="category">Category</label>
                    <select name="" id="category" class="form-control w-auto d-inline">
                        <option value="">All</option>
                        <option value="">Red Rose</option>
                    </select>
                </div>

                <div class="col-md-4 col-lg-3">
                    <label class="d-block" for="category">Category</label>
                    <select name="" id="category" class="form-control w-auto d-inline">
                        <option value="">All</option>
                        <option value="">Red Rose</option>
                    </select>
                </div>


            </div>
            <hr>
        </div>

        <div class="col-md-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Variants</td>
                        <td>Status</td>
                        <td>Edit</td>
                        <td>Remove</td>
                    </tr>
                </thead>
            </table>
        </div>

    </div>

    <div>
        <div class="floating-action-bar">
            floating alert
        </div>
    </div>

@endsection
