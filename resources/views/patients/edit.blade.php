@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Patient
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
      <form method="post" action="{{ route('patients.update', $patient->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="first_name">First Name:</label>
          <input type="text" class="form-control" name="first_name" value={{ $patient->first_name }} />
        </div>
        <div class="form-group">
          <label for="last_name">Last Name:</label>
          <input type="text" class="form-control" name="last_name" value={{ $patient->last_name }} />
        </div>
        <div class="form-group">
          <label for="birth_date">Birth Date:</label>
          <input type="date" class="form-control" name="birth_date" value={{ $patient->birth_date }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection