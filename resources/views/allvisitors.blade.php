@extends('index')

@section('content')
<div style="position: relative; text-align: center;">
    <div style="position: relative; margin-bottom: 20px;">
        <form action="{{ route('visitor.search') }}" method="GET" class="form-inline">
            <div class="form-group">
                <input type="text" name="keyword" class="form-control" placeholder="Search Visitors">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="table-responsive">
        <center>
            <h1 class="text-center" style="font-size: 24px; color: #333; margin-bottom: 20px; text-transform: uppercase; font-weight: bold;">All Visitors</h1>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center">
                    <thead class="table table-bordered table-striped text-center">
                        <tr>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Phone</th>
                            <th class="text-center" scope="col">Department</th>
                            <th class="text-center" scope="col">Reason</th>
                            <th class="text-center" scope="col">Check In</th>
                            <th class="text-center" scope="col">Check Out</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitors as $visitor)
                        <tr>
                            <td>{{ $visitor->name }}</td>
                            <td>{{ $visitor->mobile_no }}</td>
                            <td>{{ $visitor->department }}</td>
                            <td>{{ $visitor->reason_to_meet }}</td>
                            <td>{{ $visitor->enter_time }}</td>
                            <td>
                                @if ($visitor->out_time === null)
                                    <form action="{{ route('visitor.checkout', $visitor->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Checkout</button>
                                        <input type="hidden" name="out_time" value="{{ now()->format('Y-m-d H:i:s') }}">
                                    </form>
                                @else
                                    <button type="button" class="btn btn-success" disabled>{{ $visitor->out_time }}</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </center>
    </div>
</div>
@endsection
