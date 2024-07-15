<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Task  {{$todo->id}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .text-justify {
    text-align: justify;
}
    </style>
</head>
<body style="background: pink">

    <div class="container mt-5 mb-5">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>{{ $todo->name }}</h4>
                        <hr>
                        <p>{{$todo->description}}</p>
                        @if ($todo->is_done === 'belum selesai')
                            <p class="text-danger">Ayo Segera Selesaikan Tugas Ini</p>
                        @else
                            <p class="text-success">Tugas Ini Sudah Selesai</p>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>