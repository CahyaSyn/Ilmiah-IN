@extends('auth.layouts.layout_dashboard')

@section('body')
    <style>
        .preserveLines {
            white-space: pre-wrap;
        }
    </style>
    <div class="container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="fs-4 fw-bolder d-xl-flex justify-content-xl-center mb-0">Surat Lamaran Pekerjaan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <form target="_blank"action="{{ route('lamaranPekerjaanPost') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            {{-- biodata --}}
                            <div class="row" id="biodata">
                                <input type="hidden" name="idUser" value="{{ Auth::user()->id }}">
                                <div class="col-lg-12">
                                    <h5 class="fs-5 fw-bolder text-center">Masukkan Biodatamu</h5>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="namaLengkap" class="form-control" placeholder="Masukkan Nama Lengkap kamu ...">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempatLahir" class="form-control" placeholder="Ex : Magelang">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                                        <input type="date" name="tglLahir" class="form-control" placeholder="Masukkan Tanggal Lahirmu ...">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Jenis Kelamin</label>
                                    <select class="form-select" name="jk">
                                        <option value="" disabled selected>Pilih jenis kelaminmu</option>
                                        <option value="Laki laki">Laki laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Pendidikan Terakhir</label>
                                        <input name="pendidikan" type="text" class="form-control" placeholder="Ex: SMK">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">No Telp</label>
                                        <input name="telp" type="text" class="form-control" placeholder="Ex: 0815xxxx">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Ex: vulan@gmail.com">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating">
                                        <textarea name="alamat" class="form-control preserveLines" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Alamatmu</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 d-flex mt-2" style="justify-content: right">
                                    <button id="biodataNext" class="btn btn-primary" type="button">Selanjutnya</button>
                                </div>
                            </div>

                            <div class="row" id="penerimaSurat">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Posisi yang ingin dilamar</label>
                                        <input name="posisi" type="text" class="form-control" placeholder="Ex : Manager">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Penerima Surat</label>
                                        <input name="penerimaSurat" type="text" class="form-control" placeholder="Ex : Hrd">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Lokasi surat diterbitkan</label>
                                        <input name="lokasi" type="text" class="form-control" placeholder="Ex : Magelang">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Kapan surat diterbitkan</label>
                                        <input name="terbit" type="date" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 d-flex" style="justify-content: right">
                                    <button id="penerimaSuratBack" class="btn btn-danger" type="button">Kembali</button>&nbsp;
                                    <button id="penerimaSuratNext" class="btn btn-primary" type="button">Selanjutnya</button>
                                </div>
                            </div>

                            <div class="row" id="listBerkas">
                                <div class="col-lg-12">
                                    <h5 class="fs-5 fw-bolder text-center">Masukkan Berkas Sebagai Lampiran</h5>
                                </div>

                                <div class="col-lg-12" id="berkas">
                                    <div class="mb-2">
                                        <label for="exampleFormControlInput1" class="form-label">List Berkas</label>
                                        <input name="list[]" type="text" class="form-control" value="Foto Copy Ijazah Terakhir" required>
                                    </div>
                                    <div class="mb-2">
                                        <input name="list[]" type="text" class="form-control" value="Curiculum Vitae (CV)" required>
                                    </div>
                                    <div class="mb-2">
                                        <input name="list[]" type="text" class="form-control" value="Foto 3 * 4" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <button id="hapusBerkas" class="btn btn-outline-danger btn-sm mt-2" type="button">Hapus Berkas</button>&nbsp;
                                    <button id="tambahBerkas" class="btn btn-outline-primary btn-sm mt-2" type="button">Tambah Berkas</button>
                                </div>

                                <div class="col-lg-12 mt-5 d-flex" style="justify-content: center">
                                    <button id="listBack" class="btn btn-danger" type="button">Kembali</button>&nbsp;
                                    <button id="preview" class="btn btn-success" type="submit">Download</button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#penerimaSurat").hide();
            $("#listBerkas").hide();

            // Next Button + validation
            $("#biodataNext").click(function() {
                var namaLengkap = document.getElementsByName("namaLengkap")[0].value;
                var tempatLahir = document.getElementsByName("tempatLahir")[0].value;
                var tglLahir = document.getElementsByName("tglLahir")[0].value;
                var jk = document.getElementsByName("jk")[0].value;
                var pendidikan = document.getElementsByName("pendidikan")[0].value;
                var email = document.getElementsByName("email")[0].value;
                var alamat = document.getElementsByName("alamat")[0].value;
                var telp = document.getElementsByName("telp")[0].value;
                if (namaLengkap == "" || tempatLahir == "" || tglLahir == "" || jk == "" || pendidikan == "" || email == "" || alamat == "" || telp == "") {
                    toastr.error("Isi data dengan lengkap");
                } else {
                    $("#penerimaSurat").show();
                    $("#biodata").hide();
                }
            });
            $("#penerimaSuratNext").click(function() {
                var posisi = document.getElementsByName("posisi")[0].value;
                var penerimaSurat = document.getElementsByName("penerimaSurat")[0].value;
                var lokasi = document.getElementsByName("lokasi")[0].value;
                var terbit = document.getElementsByName("terbit")[0].value;
                if (posisi == "" || penerimaSurat == "" || lokasi == "" || terbit == "") {
                    toastr.error("Isi data dengan lengkap");
                } else {
                    $("#listBerkas").show();
                    $("#penerimaSurat").hide();
                }
            });

            // Back Button
            $("#penerimaSuratBack").click(function() {
                $("#biodata").show();
                $("#penerimaSurat").hide();
            });
            $("#listBack").click(function() {
                $("#penerimaSurat").show();
                $("#listBerkas").hide();
            });


            // tambah list berkas
            $("#tambahBerkas").click(function() {
                $("#berkas").append('<div class="mb-2"><input name="list[]" type="text" class="form-control" placeholder="Tambahkan Berkas" required></div>');
                let panjang = document.getElementsByName("list[]").length;
                if (panjang == 7) {
                    $("#tambahBerkas").hide();
                }
            });
            // hapus list berkas
            $("#hapusBerkas").click(function() {
                $("#berkas").children().last().remove();
                let panjang = document.getElementsByName("list[]").length;
                if (panjang == 1) {
                    $("#hapusBerkas").hide();
                }
            });


            // submit form
            $("#preview").submit(function() {
                var idUser = document.getElementsByName("idUser")[0].value;
                var elements = document.getElementsByName("list[]");
                var list = [];
                for (var i = 0; i < elements.length; i++) {
                    list.push(elements[i].value);
                }
                var data = {
                    idUser: idUser,
                    namaLengkap: namaLengkap,
                    tempatLahir: tempatLahir,
                    tglLahir: tglLahir,
                    jk: jk,
                    pendidikan: pendidikan,
                    email: email,
                    telp: telp,
                    alamat: alamat,
                    posisi: posisi,
                    penerimaSurat: penerimaSurat,
                    lokasi: lokasi,
                    terbit: terbit,
                    list: list
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: data,
                    success: function(data) {
                        console.log(data);
                    }
                });
                // endAjax
            });
        })
    </script>
@endsection
