@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

             <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>
            
            <div class="card" style="background-color: #ff96da; border: none;">
                <center>
                    <h3>
                        Add new flower
                    </h3>
                </center>

                <div class="card-body">
                    <form method="POST" action="{{ url('/insertflower')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">Category</label>

                            <div class="col-md-6">
                                <select class="form-control @error('categoryid') is-invalid @enderror" name="categoryid">
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

                        <div class="form-group row">
                            <label for="flowername" class="col-md-4 col-form-label text-md-right">Flower Name</label>

                            <div class="col-md-6">
                                <input id="flowername" type="text" class="form-control @error('flowername') is-invalid @enderror" name="flowername" value="{{ old('flowername') }}" required autocomplete="name" autofocus>

                                @error('flowername')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="flowerprice" class="col-md-4 col-form-label text-md-right">Flower Price</label>

                            <div class="col-md-6">
                                <input id="flowerprice" type="number" class="form-control @error('flowerprice') is-invalid @enderror" name="flowerprice" required >

                                @error('flowerprice')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="flowerdesc" class="col-md-4 col-form-label text-md-right">Flower Description</label>

                            <div class="col-md-6">
                                <textarea id="flowerdesc" type="text" class="form-control @error('flowerdesc') is-invalid @enderror " name="flowerdesc" value="{{ old('flowerdesc') }}" required placeholder="Flower Description" autocomplete="off" autofocus></textarea>

                                @error('flowerdesc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="flowerpic" class="col-md-4 col-form-label text-md-right">Flower Picture</label>

                            <div class="col-md-6">
                                <input id="flowerpic" type="file" class="form-control @error('flowerpic') is-invalid @enderror" name="flowerpic" accept="image/gif, image/jpeg, image/png, image/jpg" required>

                                @error('flowerpic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('+ Insert new flower') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
