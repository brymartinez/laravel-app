@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Patients
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('patients.store') }}">
          <div class="form-group">
              @csrf
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>
          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>
          <div class="form-group">
              <label for="birth_date">Birth Date:</label>
              <input type="date" class="form-control" name="birth_date"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection