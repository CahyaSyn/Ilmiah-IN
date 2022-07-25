@extends('auth.layouts.layout_dashboard')

@section('body')
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="fs-4 fw-bolder d-xl-flex justify-content-xl-center mb-0">Makalah</h5>
            </div>
            <div class="card-body">
                <form id="formMakalah" action="{{ url('pdfExport') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-4"><label class="form-label fw-bold d-xl-flex justify-content-xl-center">Judul</label>
                                <textarea name="judulCover" class="form-control form-control-sm preserveLines"></textarea>
                            </div>
                            <div class="mb-4"><label class="form-label fw-bold d-xl-flex justify-content-xl-center">Upload Logo</label>
                                <input name="logo" class="form-control" type="file" accept="image/*">
                            </div>
                            <div class="mb-4"><label class="form-label fw-bold d-xl-flex justify-content-xl-center">Nama Dosen</label>
                                <textarea name="dosenCover" class="form-control form-control-sm preserveLines"></textarea>
                            </div>
                            <div class="mb-4"><label class="form-label fw-bold d-xl-flex justify-content-xl-center">Penyusun</label>
                                <textarea name="penyusunCover" class="form-control form-control-sm preserveLines"></textarea>
                            </div>
                            <div class="mb-4"><label class="form-label fw-bold d-xl-flex justify-content-xl-center">Footer</label>
                                <textarea name="footerCover" class="form-control form-control-sm preserveLines"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div><label class="form-label fw-bold">Nama Dokumen</label>
                                <input name="filename" class="form-control" type="text">
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <div class="form-check form-check-inline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="formCheck-1" value="pdf" name="format" checked="">
                                        <label class="form-check-label" for="formCheck-1">PDF</label>
                                    </div>
                                </div>
                                <div class="form-check form-check-inline">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="formCheck-2" name="format" value="doc">
                                        <label class="form-check-label" for="formCheck-2">DOC</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center mt-2">
                                <button class="btn btn-sm btn-danger btn-icon-split" id="btn-export">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Export</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#formMakalah').on('submit', function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data);
                    }
                })
            })
        })
    </script>
@endsection
