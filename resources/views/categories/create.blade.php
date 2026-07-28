<h1>Create Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div>
        <label>Category Name</label><br>
        <input type="text" name="name">
    </div>

    <br>

    <div>
        <label>Description</label><br>
        <textarea name="description"></textarea>
    </div>

    <br>

    <button type="submit">Save Category</button>
</form>