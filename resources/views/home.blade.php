@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome, {{ Auth::user()->name }}!
                    <div class="container text-center">
                    <a href="{{ route('patients.index') }}" class="btn btn-primary">View Patients</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
