@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4><i>Welcome to flowleto shop</i></h4>
            </center>
            <hr>

            <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>

            <form method="POST" action="{{ url('/addcart')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="flowerid" value="{{$flower->id}}">
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-sm-5">
                            <img src="../picture/{{$flower->flower_pic}}" alt="a" width="250" height="250">
                        </div>

                        <div class="col-md-7">
                            <div class="form-group row">
                                <span class="col-md-7 lead mr-4" style="color: black">
                                    <h2>{{$flower->flower_name}}</h2>
                                </span>
                            </div>

                        
                            <div class="form-group row">
                                <span class="col-md-4 lead mr-4" style="color: black">PRICE</span>

                                <span class="col-md-5 lead mr-4">Rp {{$flower->flower_price}},00 </span>
                               
                            </div>
                            <hr>

                            <div class="form-group row">
                                <span class="col-md-4 lead mr-4" style="color: black">DESCRIPTION</span>
                                <span class="col-md-6 lead mr-4">
                                    <p style="word-wrap: break-word;min-width: 250px;max-width: 500px; text-align: justify;">
                                        {{$flower->flower_desc}}
                                    </p>
                                </span>
                            </div>

                            @guest
                            <hr>
                            <span class="lead mr-4" style="color: black">QUANTITY</span>
                            <input type="number" name="flower_qty" id="" class="col-md-3"><br>
                            <button type="submit" class="btn btn-success mt-4">
                            + Add to Cart
                            </button>

                            @else
                            @if(Auth::user()->userPosition == 'customer')
                            <hr>
                            <span class="lead mr-4" style="color: black">QUANTITY</span>
                            <input type="number" name="flower_qty" id="" class="col-md-3"><br>
                            <button type="submit" class="btn btn-success mt-4">
                            + Add to Cart
                            </button>
                            @endif
                            @endguest
                        </div>
                    </div>

                </div>
               

            </form>
    </div>
    </div>
</div>
@endsection
