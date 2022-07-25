@extends('auth.layouts.layout_dashboard')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary">
                <div class="row">
                    <div class="col-6 text-white">
                        <h5 class="fs-4 fw-bolder d-xl-flex justify-content-xl-start mb-0">Management User</h5>
                    </div>
                    <div class="col-6" style="text-align: right">
                        <a href="#" class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#tambah">Tambah User</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->role }}</td>
                                    <td style="text-align: right">
                                        <a href="{{ url('/edit-user/' . $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        {{-- <a href="#" class="btn btn-sm btn-primary">Edit</a> --}}
                                    </td>
                                    <td>
                                        <a href="{{ url('/delete-user/' . $row->id) }}" onclick="return confirm ('Yakin menghapus?')" class="btn btn-sm btn-danger">Delete</a>
                                        {{-- <a href="#" class="btn btn-sm btn-danger">Delete</a> --}}
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- modalTambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-light">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Form Tambah Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('tambahUser') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="" disabled selected>Pilih role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-primary text-light">Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
