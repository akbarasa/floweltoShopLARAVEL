@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <center>
                <h3 class="lead">Your Cart</h3>
            </center>
            <hr>
            <div class="container-fluid mt-4">
                <a class="btn btn-light" onclick="goBack();">
                    🡰 PREVIOUS
                </a>

                <br>
                <br>
                <table class="table table-borderless text-md-center">
                    <thead>
                        <tr >
                            <th scope="col">Picture</th>
                            <th scope="col">Flower Name</th>
                            <th scope="col">SubPrice</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $c)
                        <tr class="table-active">
                            <form method="POST" action="{{ url('/cartupdate')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <input type="hidden" name="cartid" value="{{$c->id}}">
                                <td class="align-middle" style="width: 10%;"><img src="../picture/{{$c->Flower->flower_pic}}" width="100" height="100" alt=""></td>
                                <td class="align-middle" style="width: 15%;">{{$c->Flower->flower_name}}</td>
                                <td class="align-middle" style="width: 15%;">Rp. {{$c->sub_price}},00</td>
                                <td class="align-middle" style="width: 10%;">
                                    <div class="form-group">
                                        <div class="row">
                                            <input min="0" max="100" class="col-sm-4" type="number" name="quantity" id="" placeholder="{{$c->quantity}}">
                                            <button class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>

                   
                </table>
                <center> <a href="/cartcheckout" class="btn btn-success">+ Checkout</a> </center>
               
            </div>
        </div>
    </div>
</div>

@endsection
