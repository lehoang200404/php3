<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="center">Danh sách Users</h1><br>
    <a class="btn btn-info" href="{{route('users.addUsers')}}">Thêm mới</a><br><br>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phòng Ban</th>
                <th>Tuổi</th>
                <th>Số ngày nghỉ</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $user)
                <tr>
                    <td>{{$user -> id}}</td>
                    <td>{{$user -> name}}</td>
                    <td>{{$user -> email}}</td>
                    <td>{{$user -> ten_donvi}}</td>
                    <td>{{$user -> tuoi}}</td>
                    <td>{{$user -> songaynghi}}</td>
                    <td>
                        <a href="{{route('users.updateUser', $user->id)}}" class="btn btn-primary">Sửa</a>
                        <a href="" class="btn btn-success">Chi tiết</a>
                        <a href="{{route('users.deleteUser', $user->id)}}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>