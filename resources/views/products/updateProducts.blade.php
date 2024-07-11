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
<form  action="{{route('products.updatePostProducts')}}" method="post">
    @csrf
    <input type="hidden" value="{{$product->id}}" name="productsId">
    <label class="form-lable" for="">Tên Sản Phẩm:</label>
    <input class="form-control" type="text" name="name" value="{{$product->name}}"><br>
    <label class="form-lable" for="">Category:</label>
    <select class="form-select "  name="category">
        @foreach ($category as $value)
            <option value="{{$value->id}}"
            @if($product->category_id == $value->id)
                selected
            @endif
            >
                {{$value->name}}
            </option>
        @endforeach
    </select><br><br>
    <label class="form-lable" for="">Price:</label>
    <input class="form-control" type="text" name="price" value="{{$product->price}}"><br>
    <label class="form-lable" for="">View:</label>
    <input class="form-control" type="text" name="view" value="{{$product->view}}"><br>
    <button class="btn btn-primary" type="submit">Cập nhật</button>
</form>
</body>
</html>