@extends('template.member.layout.layout')
@section('section-body')
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Welcome Card</h4>
            </div>
            <div class="card-body">
             <h1>Welcome, {{ session('user_name', 'Guest') }}</h1>

            </div>

        </div>
    </div>
@endsection
