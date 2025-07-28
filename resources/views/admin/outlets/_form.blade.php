<div class="form-group">
    <label for="name">Nama Outlet</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $outlet->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="address">Alamat</label>
    <textarea id="address" name="address" class="form-control" required>{{ old('address', $outlet->address ?? '') }}</textarea>
</div>