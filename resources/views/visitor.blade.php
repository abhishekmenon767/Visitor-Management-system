@extends('index')

@section('content')
@auth
<h1 class="text-center" style="font-size: 24px; color: #333; margin-bottom: 20px; text-transform: uppercase; font-weight: bold;">Add Visitors</h1>
<br><br>
<center>
<form action="{{ route('visitor.store') }}" method="POST" class="mx-auto" style="max-width: 400px;">
    @csrf

    <div class="form-group mb-3">
        <label for="name">Visitor Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group mb-3">
        <label for="email">Visitor Email:</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group mb-3">
        <label for="mobile_no">Visitor Mobile Number:</label>
        <input type="tel" class="form-control" id="mobile_no" name="mobile_no" required>
    </div>

    <div class="form-group mb-3">
        <label for="address">Visitor Address:</label>
        <input type="text" class="form-control" id="address" name="address" required>
    </div>

    <div class="form-group mb-3">
        <label for="meet_person_name">Visitor Meet Person Name:</label>
        <input type="text" class="form-control" id="meet_person_name" name="meet_person_name" required>
    </div>

    <div class="form-group mb-3">
        <label for="department">Visitor Department:</label>
        <input type="text" class="form-control" id="department" name="department" required>
    </div>

    <div class="form-group mb-3">
        <label for="reason_to_meet">Visitor Reason to Meet:</label>
        <input type="text" class="form-control" id="reason_to_meet" name="reason_to_meet" required>
    </div>

    <div class="form-group mb-3">
        <label for="enter_time">Visitor Enter Time:</label>
        <input type="datetime-local" class="form-control" id="enter_time" name="enter_time" required>
    </div>


    <div class="form-group text-center">
        <input type="submit" class="btn btn-primary" value="Submit">
    </div>
</form>
<br>
<br>
<br>   
</center>

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    // Success alert for form submission
    @if (session('form_success'))
    Swal.fire({
        icon: 'success',
        title: 'Form Submission Successful',
        text: "{{ session('form_success') }}",
        timer: 3000,
        showConfirmButton: false
    });
    @endif
</script>

<center>

<h1 class="text-center" style="font-size: 24px; color: #333; margin-bottom: 20px; text-transform: uppercase; font-weight: bold;">All Visitors</h1>
<br>

<br>
<div class="table-responsive">
    <table class="table table-bordered text-center">
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

    <a href="/allvisitors">View All</a>
</div>

</table></center></center>
@endauth

<!-- Include SweetAlert JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>

<script>
    // Success alert after visitor checkout
    @if (session('checkout_success'))
    Swal.fire({
        icon: 'success',
        title: 'Checkout Success',
        text: "{{ session('checkout_success') }}",
        timer: 3000,
        showConfirmButton: false
    });
    @endif

    // Error alert if visitor checkout fails
    @if (session('checkout_error'))
    Swal.fire({
        icon: 'error',
        title: 'Checkout Error',
        text: "{{ session('checkout_error') }}",
        timer: 3000,
        showConfirmButton: false
    });
    @endif
</script>
@endsection
