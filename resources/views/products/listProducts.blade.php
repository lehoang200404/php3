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
    <form action="{{ route('products.listProducts') }}" method="GET">
        <input type="text" name="searchProducts" placeholder="Nhập tên sản phẩm...">
        <button type="submit">Tìm kiếm</button>
    </form>
    <h1 class="center">Danh Sách Sản Phẩm</h1><br>
    <a class="btn btn-info" href="{{route('products.addProducts')}}">Thêm mới</a><br><br>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>View</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($listProducts as $product)
            <tr>
                <td>{{$product -> id}}</td>
                <td>{{$product -> pro_name}}</td>
                <td>{{$product -> category_id}}</td>
                <td>{{$product -> price}}</td>
                <td>{{$product -> view}}</td>
                <td>
                    <a href="{{route('products.updateProducts', $product->id)}}" class="btn btn-primary">Sửa</a>
                    <a href="" class="btn btn-success">Chi tiết</a>
                    <a href="{{route('products.deleteProducts', $product->id)}}" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>