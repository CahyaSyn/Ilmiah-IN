@extends('auth.layouts.layout_dashboard')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="fs-4 fw-bolder d-xl-flex justify-content-xl-center mb-0">Your File</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Your File</th>
                                <th>Created at</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama_project }}</td>
                                    <td>{{ date('d F Y', strtotime($row->created_at)) }}</td>
                                    <td style="text-align: right">
                                        <a href="{{ url('/download-file/' . $row->nama_project) }}" class="btn btn-sm btn-primary">Download</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('/delete-file/' . $row->nama_project) }}" onclick="return confirm ('Yakin menghapus?')" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
