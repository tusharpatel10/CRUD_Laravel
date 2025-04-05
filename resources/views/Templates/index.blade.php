@extends('layouts.user_layout')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-7 col-lg-12 mx-auto">
            <div class="card-body">
                <h4 class="card-title text-center">All Users</h4>
                <a href="" class="btn"></a>
                <hr>
                @include('Templates.flash_data')
                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td>Gender</td>
                            <td>Hobbies</td>
                            <td>Address</td>
                            <td>Country</td>
                            <td>Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $user->id }}</td> --}}
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->contact }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->hobbies }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->getCountry->name }}</td>
                                <td>
                                    <a href="{{ route('crud.show', ['crud' => $user->id]) }}"
                                        class="btn btn-sm btn-primary">Show</a>
                                    <a href="{{ route('crud.edit', ['crud' => $user->id]) }}"
                                        class="btn btn-sm btn-warning">Update</a>
                                    <form action="{{ route('crud.destroy', ['crud' => $user->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Delete"></input>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">No data found</td>
                            </tr>
                            <td></td>
                        @endforelse
                    </tbody>
                </table>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
@endsection
