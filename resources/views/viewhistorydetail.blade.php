@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <center>
            <h5 class="lead">Transaction at {{$header->created_at}}</h5>
            </center>
            <hr>

            <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>

            <div class="container mt-4">
                <table class="table  table-borderless text-md-center">
                    <thead>
                        <tr>
                          <th scope="col">Picture</th>
                          <th scope="col">Flower Name</th>
                          <th scope="col">SubPrice</th>
                          <th scope="col">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($detail as $d)
                        <tr class="table-active">
                            <form method="POST" action="{{ url('/cartupdate')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <td class="align-middle" style="width: 10%;"><img src="../picture/{{$d->Flower->flower_pic}}" width="100" height="100" alt=""></td>
                                <td class="align-middle" style="width: 10%;">{{$d->Flower->flower_name}}</td>
                                <td class="align-middle" style="width: 10%;">Rp. {{$d->Flower->flower_price * $d->quantity}},00</td>
                                <td class="align-middle" style="width: 10%;">
                                    {{$d->quantity}}
                                </td>

                            </form>
                        </tr>   
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="align-middle text-md-right">Total Price </td>
                           <td>
                                 Rp. {{$header->total_price}}
                           </td>
                        </tr>

                   
                </tbody>
                </table>
              
            </div>
        </div>
    </div>
</div>
@endsection
