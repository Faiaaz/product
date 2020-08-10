@extends('base')

@section('main')
    <div>
        <button type="submit" class="btn btn-primary" form="search-form">Search</button>
        <button style="margin: 19px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Register</button>
        <a href="{{ route('productExport') }}" class="btn btn-primary">Excel</a>
    </div>

    {{-- registration modal starts here--}}

    @include('products.create')

    {{-- registration modal ends here --}}


    {{-- table starts here --}}
    <div class="row">
        <div class="col-sm-12">
            <h4>Products</h4>
            <table class="table table-striped" id="productsTable">
                <thead>
                   <tr>
                       <th>@sortablelink('id')</th>
                       <th>@sortablelink('name')</th>
                       <th>@sortablelink('email')</th>
                       <th>@sortablelink('phone')</th>
                   </tr>
                </thead>
                <tbody>
                <form action="{{ route('productSearch') }}" id="search-form" method="GET">
                    @csrf
                    <tr>
                        <td><input type="search" name="id" class="form-control"></td>
                        <td><input type="search" name="name" class="form-control"></td>
                        <td><input type="search" name="email" class="form-control"></td>
                        <td><input type="search" name="phone" class="form-control"></td>
                    </tr>
                </form>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->email}}</td>
                        <td>{{$product->phone}}</td>
                        <td>
                            <button data-toggle="modal" data-target="#editModal" class="btn btn-primary">Edit</button>
                            @include('products.edit')
                        </td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
