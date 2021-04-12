@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <center>
                <h5 class="lead">Your Transaction History</h5>
            </center>
            <hr>

            <a class="btn btn-light" onclick="goBack();">
                🡰 PREVIOUS
            </a>

            <br>
            <br>

            <div class="container mt-4">
                <table class="table table-borderless">
                    @foreach($header as $h)
                    <tr class="table-active">
                        <td class="align-middle">
                             <center> 
                                <a href="{{ url('/viewhistorydetail/'.$h->id) }}"  style="text-decoration: none;color: black">
                                    Transaction at {{$h->created_at}}
                                </a>
                            </center>
                        </td>       
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
