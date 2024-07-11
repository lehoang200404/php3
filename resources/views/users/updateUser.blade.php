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
    <h1></h1>
<form  action="{{route('users.updatePostUser')}}" method="post">
    @csrf
    <input type="hidden" value="{{$user->id}}" name="userId">
    <label class="form-lable" for="">Tên Users:</label>
    <input class="form-control" type="text" name="name" value="{{$user->name}}"><br>
    <label class="form-lable" for="">Email:</label>
    <input class="form-control" type="email" name="email" value="{{$user->email}}"><br>
    <label class="form-lable" for="">Phòng Ban:</label>
    <select class="form-select "  name="phongban">
        @foreach ($phongBan as $value)
            <option value="{{$value->id}}"
            @if($user->phongban_id == $value->id)
                selected
            @endif
            >
                {{$value->ten_donvi}}
            </option>
        @endforeach
    </select><br><br>
    <label class="form-lable" for="">Tuổi</label>
    <input class="form-control" type="text" name="tuoi" value="{{$user->tuoi}}"><br>
    <label class="form-lable" for="">Số ngày nghỉ:</label>
    <input class="form-control" type="text" name="songaynghi" value="{{$user->songaynghi}}"><br>
    <button class="btn btn-primary" type="submit">Cập nhật</button>
</form>
</body>
</html>