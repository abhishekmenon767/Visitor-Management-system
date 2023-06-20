@extends('index')

@section('content')
<style>
        


.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="password"] {
    width: 100%;
    padding: 10px;
    border-radius: 3px;
    border: 1px solid #ccc;
}

.form-group input[type="submit"] {
    width: 100%;
    padding: 10px;
    border-radius: 3px;
    border: none;
    background-color: #e85555;
    color: #ffffff;
    font-weight: bold;
    cursor: pointer;
}

.form-group input[type="submit"]:hover {
    background-color: #d95c5c;
}

    </style>

    <div class="container">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="{{old('username')}}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  required>
            </div>
            <div class="form-group">
                <input type="submit" value="Register and Login">
            </div>
        </form>
    </div>
@endsection