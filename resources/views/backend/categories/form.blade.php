@csrf
<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="form-control">
</div>
<button type="submit" class="btn btn-primary">Save</button>
