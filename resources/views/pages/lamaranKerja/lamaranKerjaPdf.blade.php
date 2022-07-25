<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lamaran Pekerjaan</title>
</head>
<style>
    body {
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
        margin: 0 2cm;
    }

    .preserveLines {
        white-space: pre-wrap;
    }

    .mt-3 {
        margin-top: 30px;
    }

    #terbit {
        font-size: 12pt;
        text-align: right
    }

    #biodata .left {
        margin-left: 7%;
        -moz-tab-size: 16;
        tab-size: 16;
    }

    #hrd span {
        margin-left: 7%
    }

    .footer {
        /* background-color: #000; */
        width: 35%;
        text-align: center;
        float: right;
    }

    table {
        width: 100%;
    }
</style>

<body>
    <div id="terbit">
        <p>{{ ucwords(strtolower($data['lokasi'])) }}, {{ date('d F Y', strtotime($data['terbit'])) }}</p>
    </div>

    <div id="hrd">
        Kepada Yth. <br>
        {{ ucwords(strtolower($data['penerimaSurat'])) }} <br>
        Di tempat
        <br><br><br>
        Dengan Hormat,

        <br><br>
        <span>Sehubungan</span> dengan informasi yang saya peroleh bahwa di perusahaan Bapak/ Ibu sedang membuka
        lowongan pekerjaan, maka untuk itu saya yang bertanda tangan di bawah ini : <br><br>
    </div>

    <div id="biodata">
        <table>
            <tr>
                <td><span class="left">Nama</span></td>
                <td><span> : {{ ucwords(strtolower($data['namaLengkap'])) }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Tempat / Tgl.Lahir</span></td>
                <td><span>: {{ ucwords(strtolower($data['tempatLahir'])) }}, {{ date('d F Y', strtotime($data['tglLahir'])) }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Jenis Kelamin</span></td>
                <td><span> : {{ $data['jk'] }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Pendidikan Terakhir</span></td>
                <td><span> : {{ ucwords(strtolower($data['pendidikan'])) }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Alamat</span></td>
                <td><span class="preserveLines">: {{ $data['alamat'] }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Nomor Telepon</span></td>
                <td><span> : {{ $data['telp'] }}</span></td>
            </tr>
            <tr>
                <td><span class="left">Email</span></td>
                <td><span> : {{ ucwords(strtolower($data['email'])) }}</span></td>
            </tr>
        </table>
    </div><br>

    <div>
        <span style="margin-left: 7%">Dengan</span> ini saya mengajukan permohonan kepada Bapak/ Ibu, kiranya dapat menerima saya sebagai
        karyawan pada posisi manager di perusahaan Bapak/ Ibu
    </div><br>

    <div>
        <span>Sebagai</span> bahan pertimbangan Bapak/ Ibu bersama ini saya lampirkan :
        <ol>
            @foreach ($data['list'] as $list)
                <li>{{ $list }}</li>
            @endforeach
        </ol>
    </div>

    <div>
        Demikian Surat Lamaran Kerja ini saya buat dengan sebenar-benarnya, besar harapan saya untuk dapat
        diterima di perusahaan Bapak/ Ibu.
    </div>

    <div class="footer mt-3">
        <p>Hormat saya,</p><br>
        <p class="mt-3">( {{ ucwords(strtolower($data['namaLengkap'])) }} )</p>
    </div>
</body>

</html>
