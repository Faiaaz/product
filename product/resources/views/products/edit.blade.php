<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">update product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}"/>
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $product->email }}"/>
                    </div>

                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" class="form-control" name="phone" value="{{ $product->phone }}"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update product</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>





{{--


@extends('base')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Update a contact</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('products.update', $product->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="first_name">Name:</label>
                    <input type="text" class="form-control" name="name" value={{ $product->name }} />
                </div>

                <div class="form-group">
                    <label for="last_name">Email:</label>
                    <input type="text" class="form-control" name="email" value={{ $product->email }} />
                </div>

                <div class="form-group">
                    <label for="email">Phone:</label>
                    <input type="text" class="form-control" name="phone" value={{ $product->phone }} />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection

--}}
