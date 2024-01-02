<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <div class="container d-flex">
                <h3 class="mx-1">Daftar Kategori Saya</h3>
                <button id="toggle-hform" class="btn btn-outline-dark btn-block px-3"><i class="bi bi-bookmark-plus-fill"></i></button>
            </div>
        </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif
            <div class="col-md-3" id="hiddenform">
                <form class="d-flex" action="{{route('categories.store')}}" method="post">
                    @csrf
                    <input name="name" class="form-control" type="text" placeholder="Tambahkan Nama Categori">
                    <button type="submit" class="btn btn-dark"><i class="bi bi-check-circle"></i></button>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Category</th>
                        <th scope="col">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $index => $category)
                    <tr>
                        <th scope="row">{{$index+1}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->id}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        var divHidden = document.getElementById('hiddenform');
        var btnToggle = document.getElementById('toggle-hform');
        document.addEventListener('DOMContentLoaded', function () {
            divHidden.style.display = "none";
            btnToggle.addEventListener('click', function () {
           divHidden.style.display = divHidden.style.display === "none" ? '' : 'none';
            });
        });
    </script>
</body>

</html>