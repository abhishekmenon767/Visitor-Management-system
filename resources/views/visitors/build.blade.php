@extends('index')

@section('content')
<div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">

                            <div class="col-12">
                        <div class="col-sm-8"><h2>All <b>Visitors</b></h2></div>
                        <hr class="tm-hr-primary tm-mb-55">

                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <tbody>
                    @foreach ($visitors as $visitor)
                        <tr>
                            <td>{{$visitor->name}}</td>
                            <td>{{$visitor->mobile_no}}</td>
                            <td>{{$visitor->reason_to_meet}}</td>
                            <td>{{$visitor->enter_time}}</td>
                            
                                
                          
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>

        </div>
    </div>
@endsection