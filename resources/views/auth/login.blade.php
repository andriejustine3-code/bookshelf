@extends('layouts.app')

@section('content')
    <h1>Manager Login</h1>
    <form method="POST"
        action="{{ route(login.store) }}">
        @csrf
        <label for="email">Email</label>
        <input type="email" name="email"  id="email" value="{{ old('email') }} required">
        <label for="password" >Password</label> 
        @error('email')
            <p class="error">{{ $message }}</p>
        @enderror 
        <input type="password" name="password" id="submit" value="Login">
    </form>
@endsection