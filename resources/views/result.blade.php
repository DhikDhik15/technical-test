<!DOCTYPE html>
<html>
<head>
    <title>Hasil Ongkos Kirim</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 mb-4">Hasil Ongkos Kirim</h1>
        <ul class="list-group">
            @foreach($costs as $cost)
                <li class="list-group-item">
                    <h4 class="mb-3"><strong>{{ $cost['service'] }}</strong></h4>
                    <p>Deskripsi: {{ $cost['description'] }}</p>
                    <p>Harga: {{ $cost['cost'][0]['value'] }}</p>
                    <p>Estimasi: {{ $cost['cost'][0]['etd'] }} hari</p>
                </li>
            @endforeach
        </ul>
        <a href="{{ route('index') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
