<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ilmiah In || Export PDF</title>
    {{-- bootstrap4 cdn --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>
<style>
    .preserveLines {
        white-space: pre-wrap;
    }

    .judulMakalah {
        font-size: 16pt;
        font-weight: bold;
        text-align: center;
    }

    .dosen {
        font-size: 12pt;
        margin-top: 15%;
        width: 100%;
        position: absolute;
    }

    .dosen p {
        margin: auto;
        width: 40%;
    }

    .penyusun {
        font-size: 12pt;
        margin-top: 20%;
        width: 100%;
        position: absolute;
    }

    .penyusun p {
        margin: auto;
        width: 40%;
    }

    .footer {
        margin-top: 50%;
        font-size: 16pt;
        text-align: center;
        font-weight: bold
    }


    .img-thumbnail {
        margin-top: 3%;
        padding: 0.25rem;
        background-color: #fff;
        max-width: 100%;
        height: auto;
    }

    #img {
        text-align: center;
    }
</style>

<body>

    <div class="judulMakalah preserveLines">
        <p>{{ $data['judul'] }}</p>
    </div>
    <div id="img">
        <img class="img-thumbnail" src="{{ storage_path('app/public/') . $data['logo'] }}" alt="" width="30%">
    </div>
    <div class="dosen">
        <p>{{ $data['dosen'] }}</p>
    </div>
    <div class="penyusun preserveLines">
        <p>{{ $data['penyusun'] }}</p>
    </div>
    <div class="footer preserveLines">
        <p>{{ $data['footer'] }}</p>
    </div>

</body>

</html>
