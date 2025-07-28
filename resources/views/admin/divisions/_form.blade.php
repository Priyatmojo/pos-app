<div class="form-group">
    <label for="name">Nama Lengkap</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $division->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="username">Username (untuk login)</label>
    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $division->username ?? '') }}" required>
</div>

<div class="form-group">
    <label for="email">Alamat Email (Opsional)</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $division->email ?? '') }}">
</div>

<div class="form-group">
    <label for="division_name">Nama Divisi (Contoh: Marketing, IT)</label>
    <input type="text" id="division_name" name="division_name" class="form-control" value="{{ old('division_name', $division->division_name ?? '') }}" required>
</div>

<hr style="margin: 2rem 0;">

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" class="form-control" {{ empty($isEdit) ? 'required' : '' }}>
    @if(!empty($isEdit))
        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
    @endif
</div>

<div class="form-group">
    <label for="password_confirmation">Konfirmasi Password</label>
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" {{ empty($isEdit) ? 'required' : '' }}>
</div>
