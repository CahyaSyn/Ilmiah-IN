@extends('auth.layouts.layout_dashboard')

@section('body')
    <div class="table-responsive">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="fs-4 fw-bolder d-xl-flex justify-content-xl-center mb-0">Form Edit Data User</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('editUserPost') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $data->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $data->email }}">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin" {{ $data->role == 'admin' ? 'selected' : '' }}>admin</option>
                            <option value="user" {{ $data->role == 'user' ? 'selected' : '' }}>user</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
