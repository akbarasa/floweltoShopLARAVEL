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
            <form method="POST" action="{{ url('/updateflower')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <input type="hidden" name="flowerid" value="{{$flower->id}}">
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-5">
                    <img src="../picture/{{$flower->flower_pic}}" alt="a" width="250" height="250">
                </div>
                <div class="col-md-7">
                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">NAME</span>
                        <div class="col-md-7">
                            <input class="form-control @error('flower_name') is-invalid @enderror  " type="text" name="flower_name" id="" placeholder="{{$flower->flower_name}}" value="{{$flower->flower_name}}">


                            @error('flower_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">CATEGORY</span>

                        <div class="col-md-7">
                            <select class="form-control @error('categoryid') is-invalid @enderror" name="categoryid" placeholder="{{$flower->Category->category_name}}">
                                @foreach($category as $c)
                                    <option value="{{$c->id}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>

                            @error('categoryid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">PRICE</span>

                        <span class="col-sm-1">Rp </span>
                        <div class="col-md-5">
                            <input type="number" name="flower_price" id="" placeholder="{{$flower->flower_price}}" class="form-control @error('flower_price') is-invalid @enderror " value="{{$flower->flower_price}}">

                            @error('flower_price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        ,00
                    </div>
                    <hr>

                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">DESCRIPTION</span>

                        <div class="col-md-7">
                            <textarea class="form-control @error('flower_desc') is-invalid @enderror " name="flower_desc" id="" placeholder="{{$flower->flower_desc}}" value="{{$flower->flower_desc}}">{{$flower->flower_desc}}</textarea>

                            @error('flower_desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">PICTURE</span>

                        <div class="col-md-7">
                            <input type="file" name="photo" id=""><br>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">
                    Update
                    </button>

                </div>
            </div>
        </div>
            </form>
    </div>
    </div>
</div>
@endsection
