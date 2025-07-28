<div class="form-group">
    <label for="name">Nama Lengkap Pengguna</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $outletUser->name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="username">Username (untuk login)</label>
    <input type="text" id="username" name="username" class="form-control" value="{{ old('username', $outletUser->username ?? '') }}" required>
</div>

<div class="form-group">
    <label for="email">Alamat Email (Opsional)</label>
    <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $outletUser->email ?? '') }}">
</div>

<div class="form-group">
    <label for="outlet_id">Ditugaskan di Outlet</label>
    <select name="outlet_id" id="outlet_id" class="form-control" required>
        <option value="">-- Pilih Outlet --</option>
        @foreach($outlets as $outlet)
            <option value="{{ $outlet->id }}" {{ (old('outlet_id', $outletUser->outlet_id ?? '') == $outlet->id) ? 'selected' : '' }}>
                {{ $outlet->name }}
            </option>
        @endforeach
    </select>
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
