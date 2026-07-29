<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @if (session('success'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
        {{ session('success') }}
    </div>
@endif

    <h1>Categories</h1>

    <table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>

    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <a href="{{ route('categories.edit', $category) }}">
                    Edit
                </a>

                <form action="{{ route('categories.destroy', $category) }}" method="POST">
    @csrf
    @method('DELETE')

    <button
        type="submit"
        onclick="return confirm('Are you sure you want to delete this category?')">
        Delete
    </button>
</form>
            </td>
        </tr>
    @endforeach
</table>
</head>
<body>
    
</body>
</html>