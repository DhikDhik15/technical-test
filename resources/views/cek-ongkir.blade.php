<!DOCTYPE html>
<html>
<head>
    <title>Ongkir</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <style>
        /* Custom styles */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #343a40;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Ongkos Kirim dari Jogja ke Kota Lain</h1>
                <form method="post" action="{{ route('result') }}" class="shadow">
                    @csrf
                    <div class="mb-3">
                        <label for="destination" class="form-label">Pilih Kota Tujuan:</label>
                        <select name="destination" id="destination" class="form-select">
                            @foreach($cities as $city)
                                <option value="{{ $city['city_id'] }}">{{ $city['city_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Berat (gram):</label>
                        <input type="number" name="weight" id="weight" required class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="courier" class="form-label">Pilih Kurir:</label>
                        <select name="courier" id="courier" class="form-select">
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS Indonesia</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Hitung Ongkos Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
