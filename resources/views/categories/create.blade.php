<h1>Create Category</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div>
    <label>Category Name</label><br>

    @error('name')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <input
        type="text"
        name="name"
        value="{{ old('name') }}">
</div>

<div>
    <label>Description</label><br>

    @error('description')
        <p style="color:red">{{ $message }}</p>
    @enderror

    <textarea name="description">{{ old('description') }}</textarea>
</div>

    <br>

    <button type="submit">Save Category</button>
</form>