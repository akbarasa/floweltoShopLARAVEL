@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h4><i>Welcome to flowelto shop</i></h4>
            </center>
            <hr>

            <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>

            <form method="POST" action="{{ url('/updatecategory')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
            <input type="hidden" name="categoryid" value="{{$category->id}}">
        <div class="container mt-4">
            <div class="row">
                <div class="col-sm-5">
                    <img src="../picture/{{$category->category_pic}}" alt="a" width="250" height="250">
                </div>
                <div class="col-md-7">
                    <div class="form-group row">
                        <span class="col-md-4 col-form-label" style="color: black">NAME</span>
                        
                        <div class="col-md-7">
                            <input class="form-control @error('category_name') is-invalid @enderror " type="text" name="category_name" id="" placeholder="{{$category->category_name}}" value="{{$category->category_name}}">

                             @error('category_name')
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
