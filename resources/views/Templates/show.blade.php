@extends('layouts.user_layout')
@section('content')
    <div class="album py-5" style="height:120vh;">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                <h2> User Details </h2>
                <hr>
                <div class="card-body">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="John"
                                value="{{ $crud->first_name }}" disabled>
                        </div>
                        <div class="col">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Doe"
                                value="{{ $crud->last_name }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com" value="{{ $crud->email }}" disabled>
                        </div>
                        <div class="col">
                            <label for="mobile" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" id="contact" name="contact"
                                placeholder="1234567890" value="{{ $crud->contact }}" disabled>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="gender" class="form-label">Gender</label><br>
                            <input type="radio" id="gender" name="gender" value="Male"
                                @if ($crud->gender == 'Male') checked @endif disabled>Male
                            <input type="radio" id="gender" name="gender" value="Female"
                                @if ($crud->gender == 'Female') checked @endif disabled>Female
                        </div>
                        <div class="col">
                            <label for="hobbies" class="form-label">Hobbies</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]"
                                    value="Travelling" {{-- @if (in_array('Travelling', $crud->hobbies)) checked @endif --}} disabled>
                                <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]"
                                    value="Music" {{-- @if (in_array('Music', $crud->hobbies)) checked @endif --}} disabled>
                                <label class="form-check-label" for="inlineCheckbox2">Music</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]"
                                    value="Coding" {{-- @if (in_array('Coding', $crud->hobbies)) checked @endif --}} disabled>
                                <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" disabled>{{ $crud->address }}</textarea>
                        </div>
                        <div class="col">
                            <label for="inputCountry" class="form-label">Country</label>
                            <select class="form-select" name="country" id="country" aria-label="Default select example"
                                required="">
                                <option selected disabled>Select</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}" @if ($crud->country == $country->id) selected @endif>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="profile" class="form-label">Profile</label><br>
                            <img src="{{ url('profiles') . '/' . $crud->profile }}" alt="Profile Image" height="200" />
                        </div>
                    </div>
                    <br>
                    <div class="mb-3">
                        <input type="submit" name="regist" id="regist" value="Register" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
