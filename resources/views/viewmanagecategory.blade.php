@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>

                <h4>Manage Category</h4>
            </center>
            <hr>

            <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>

            <div class="container mt-4">
                <div class="row">
                @foreach($category as $c)

            <div class="col-mb-6 ml-2">
                <div class="card" style="width: 340px;background-color: #f75cc0">

                    <div class="card-body">
                        <img src="../picture/{{$c->category_pic}}" alt="a" width="300" height="300">
                        <center>
                           <b>
                               <h5 style="margin-top: 15px; text-decoration: none; color:black">
                                    {{$c->category_name}}
                               </h5>
                           </b>

                        </center>
                        <a href="{{ url('/categoryupdate/'.$c->id) }}" class="btn btn-success">Update Category</a>
                        <a href="{{ url('/categorydelete/'.$c->id) }}" class="btn btn-danger">Delete Category</a>
                    </div>
                    
                </div>
            </div>

                @endforeach
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
