<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Proposal TA</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #ffffff;
            padding: 15px 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            border-bottom: 3px solid #4a90e2;
        }

        .navbar h3 {
            margin: 0;
            color: #2c3e50;
        }

        .container {
            max-width: 1000px;
            margin: 30px auto;
            padding: 0 20px;
        }
    </style>
</head>

<body>

    <!-- Bagian Header / Navigasi Atas -->
    <div class="navbar">
        <h3>🎓 Sistem Informasi Proposal Tugas Akhir</h3>
    </div>

    <!-- Bagian Konten Utama (Form lu bakal masuk ke sini) -->
    <div class="container">
        @yield('content')
    </div>

</body>

</html>
