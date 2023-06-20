@extends('index')

@section('content')
@auth
<style>
    .date-field {
        width: 150px; /* Adjust the width as desired */
        margin: 0 auto; /* Center the date field */
    }
</style>

<form action="{{ route('admin') }}" method="GET" class="date-filter-form">
    <div class="form-group">
        <input type="date" id="date" name="date" class="form-control date-field" value="{{ request('date') }}">
    </div>
</form><br>

<div style="border: 2px solid black; background-color: black; color: white; padding: 20px;">
    <h1 class="text-center" style="font-size: 24px; color: white; margin-bottom: 20px; text-transform: uppercase; font-weight: bold;">PROGRESS</h1>

    <div class="text-center d-flex justify-content-between">
        <div>
            <h2 class="h6 font-weight-bold">Total Visitors</h2>
            <h2 class="h2 font-weight-bold text-dark">{{ $totalVisitors }}</h2>
        </div>

        <div>
            <h2 class="h6 font-weight-bold">Visitors In</h2>
            <h2 class="h2 font-weight-bold text-success">{{ $totalVisitorsIn }}</h2>
        </div>

        <div>
            <h2 class="h6 font-weight-bold">Visitors Out</h2>
            <h2 class="h2 font-weight-bold text-danger">{{ $totalVisitorsOut }}</h2>
        </div>
    </div>
</div>

<br><br><br>
<h1 class="text-center" style="font-size: 24px; color: #333; margin-bottom: 20px; text-transform: uppercase; font-weight: bold;">LOG</h1>

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
                <td>{{ $visitor->out_time ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#date').change(function () {
            var date = $(this).val();
            var url = "{{ route('admin') }}?date=" + date;
            window.location.href = url;
        });
    });
</script>
@endauth
@endsection
