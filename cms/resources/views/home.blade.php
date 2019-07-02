@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! <br>
                    <a href="/categories/new">Add category</a>
                        <ul class="list-group">
                            @foreach($category as $ctgory)

                                <li class="list-group-item">
                                    {{$ctgory->name}}
                                    <a href="\categories\{{$ctgory->id}}\delete" class="btn btn-danger btn-sm ml-1 float-right">delete</a>

                                    <a href="\categories\{{$ctgory->id}}\edit" class="btn btn-success btn-sm float-right">edit</a>

                                </li>

                            @endforeach
                        </ul>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
