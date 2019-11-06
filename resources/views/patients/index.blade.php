@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if(count($patients))
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>First Name</td>
          <td>Last Name</td>
          <td>Birth Date</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($patients as $patient)
        <tr>
            <td>{{$patient->id}}</td>
            <td>{{$patient->first_name}}</td>
            <td>{{$patient->last_name}}</td>
            <td>{{$patient->birth_date}}</td>
            <td><a href="{{ route('patients.edit',$patient->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('patients.destroy', $patient->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @else
  <div class="alert alert-danger">
      No patients yet! Click below button to add.
  </div><br />
  <div class="container text-center">
    <a href="{{ route('patients.create')}}" class="btn btn-primary">Add</a>
  </div>
  @endif
<div>
@endsection