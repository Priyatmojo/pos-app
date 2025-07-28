<div class="form-group">
    <label for="name">Nama Menu</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="price">Harga</label>
    <input type="number" id="price" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>

<div class="form-group">
    <label for="stock">Stok</label>
    <input type="number" id="stock" name="stock" class="form-control" value="{{ old('stock', $product->stock ?? '') }}" required>
</div>

<div class="form-group">
    <label for="description">Deskripsi (Opsional)</label>
    <textarea id="description" name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="image">Gambar Menu (Opsional)</label>
    <input type="file" id="image" name="image" class="form-control">
    @if(isset($product) && $product->image)
        <div class="mt-2">
            <small>Gambar Saat Ini:</small><br>
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150">
        </div>
    @endif
</div>
