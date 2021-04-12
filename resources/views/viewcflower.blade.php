@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <center>
                <h4><i>Welcome to flowelto shop</i></h4>
                <h5 class="lead">Our {{$category->category_name}} Collection</h5>
            </center>
            <hr>



        <div class="container-fluid mt-4">
            <div class="container mb-4">
                <div class="row justify-content-center">
                    <div class="col-sm-2">
                        <a class="btn btn-light" onclick="goBack();">
                            🡰 PREVIOUS
                        </a>
                    </div>

                    <div class="col-md-6">
                        <form class="form-inline" action="{{url('/searchflower')}}" method="POST">
                        {{ csrf_field() }}
                            <input type="hidden" name="categoryid" value="{{$category->id}}">
                            <select name="filter" class="form-control">
                                <option value="name">
                                    Name
                                </option>
                                <option value="price">
                                    Price
                                </option>

                            </select>
                                <input type="text" class="form-control m-2" placeholder="Search" name="search">
                                <br>
                                <button type="search" class="btn btn-outline-primary search m-2">Search</button>
                        </form>
                    </div>

                   
                </div>
            </div>   
        </div>

        <div class="container-fluid">
            <div class="row">
            @foreach($flower as $f)
                <div class="col-md-4" style="padding: 5px">
                    @guest
                    <a href="{{ url('/viewdetailflower/'.$f->id) }}" style="text-decoration: none;">
                        <div class="card" style="width: 340px; background-color: #f75cc0;">

                            <div class="card-body">
                                <img src="../picture/{{$f->flower_pic}}" alt="a" width="300" height="300">

                                <center>
                                    <b>
                                        <h5 style="margin-top: 15px;color:black">
                                            {{$f->flower_name}}
                                        </h5> 
                                    </b>

                                    <span class="lead" style="color:black;">Rp. {{$f->flower_price}},00</span>
                                <br>
                                </center>
                            </div>
                        </div>
                    </a>

                    @else
                    @if(Auth::user()->userPosition == 'manager')
                    <a href="{{ url('/viewdetailflower/'.$f->id) }}" style="text-decoration: none;">
                         <div class="card" style="width: 340px; background-color: #f75cc0">

                            <div class="card-body">
                                <img src="../picture/{{$f->flower_pic}}" alt="a" width="300" height="300">

                                <center>
                                    <b>
                                        <h5 style="margin-top: 15px;color:black">
                                            {{$f->flower_name}}
                                        </h5> 
                                    </b>

                                    <span class="lead" style="color:black;">Rp. {{$f->flower_price}},00</span>
                                <br>

                                <a href="{{ url('/flowerupdate/'.$f->id) }}" class="btn btn-success">Update Flower</a>
                                <a href="{{ url('/flowerdelete/'.$f->id) }}" class="btn btn-danger" onclick='confirm("Are you sure to delete this flower?");'>Delete Flower</a>
                                </center>
                            </div>
                           
                        </div>
                     </a>
                    @endif

                    @if(Auth::user()->userPosition == 'customer')
                    <a href="{{ url('/viewdetailflower/'.$f->id) }}" style="text-decoration: none;">
                         <div class="card" style="width: 340px; background-color: #f75cc0">

                            <div class="card-body">
                                <img src="../picture/{{$f->flower_pic}}" alt="a" width="300" height="300">

                                <center>
                                    <b>
                                        <h5 style="margin-top: 15px;color:black">
                                            {{$f->flower_name}}
                                        </h5>     
                                    </b>

                                    <span class="lead" style="color:black;">Rp. {{$f->flower_price}},00</span>
                                <br>
                                </center>
                            </div>
                           
                        </div>
                     </a>
                    @endif
                    @endguest
                </div>
          
            @endforeach
            </div>
        </div>


        </div>
    </div>
</div>
@endsection
