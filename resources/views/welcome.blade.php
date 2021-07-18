@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Developer Exam</h1>
    <p>Landing Page...</p>
    
    @auth
        <a href="{{ route('home') }}" class="btn btn-secondary">Go to Dashboard</a>
    @endauth
    
</div>
@endsection
