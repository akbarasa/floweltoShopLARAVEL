@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4><i>Welcome to flowelto shop</i></h4>
                <h5 class="lead">The Best flower Shop in Binus University</h5>
            </center>
            <hr>
        <div class="container mt-4">
            <div class="row">
            @foreach($category as $c)
            <a href="{{ url('/viewcflower/'.$c->id) }}" style="text-decoration: none;">
                <div class="col-mb-6 ml-2">
                    <div class="card" style="width: 340px; background-color: #f75cc0">

                        <div class="card-body">
                            <img src="../picture/{{$c->category_pic}}" alt="a" width="300" height="300">

                            <center>
                               <b>
                                 <h5 style="margin-top: 15px; text-decoration: none; color:black"> {{$c->category_name}} </h5>
                               </b>
                            </center>
                        </div>
                       
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        </div>
        </div>
    </div>
</div>
@endsection
