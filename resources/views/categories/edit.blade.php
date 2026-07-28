<h1>Edit Category</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
    <label>Category Name</label><br>

    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <input
        type="text"
        name="name"
        value="{{ old('name', $category->name) }}">
</div>

<br>

<div>
    <label>Description</label><br>

    @error('description')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <textarea name="description">{{ old('description', $category->description) }}</textarea>
</div>

    <br>

    <button type="submit">Update Category</button>
</form>