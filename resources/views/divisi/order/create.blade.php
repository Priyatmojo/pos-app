@extends('layouts.app')

@section('title', 'Buat Pesanan Baru')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Buat Pesanan Baru</h1>
    </div>
    <form action="{{ route('divisi.storeOrder') }}" method="POST">
        @csrf
        <div class="card-body">
            {{-- Menggunakan layout grid untuk kartu produk --}}
            <div class="product-grid">
                @forelse($products as $product)
                    <div class="product-card">
                        <div class="product-card-image">
                            <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/600x400/e2e8f0/e2e8f0?text= ' }}" alt="{{ $product->name }}">
                        </div>
                        <div class="product-card-body">
                            <h3>{{ $product->name }}</h3>
                            <p class="outlet-name">{{ $product->description }}</p>
                            <p class="outlet-name">{{ $product->outlet->name }}</p>
                            <p class="stock-info">Stok: {{ $product->stock }}</p>
                        </div>
                        <div class="product-card-footer">
                            {{-- Input tersembunyi untuk ID produk --}}
                            <input type="hidden" name="products[{{ $loop->index }}][id]" value="{{ $product->id }}">
                            
                            {{-- Pemilih Kuantitas (Quantity Selector) --}}
                            <div class="quantity-selector">
                                <button type="button" class="quantity-btn" data-action="decrement">-</button>
                                <input type="number" name="products[{{ $loop->index }}][quantity]" class="quantity-input" value="0" min="0" max="{{ $product->stock }}" readonly>
                                <button type="button" class="quantity-btn" data-action="increment">+</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center" style="grid-column: 1 / -1; padding: 2rem;">
                        Saat ini tidak ada produk yang tersedia di semua outlet.
                    </p>
                @endforelse
            </div>
        </div>
        
        @if($products->isNotEmpty())
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
        </div>
        @endif
    </form>
</div>

{{-- Script untuk membuat tombol +/- berfungsi --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const quantitySelectors = document.querySelectorAll('.quantity-selector');

    quantitySelectors.forEach(selector => {
        const decrementBtn = selector.querySelector('[data-action="decrement"]');
        const incrementBtn = selector.querySelector('[data-action="increment"]');
        const input = selector.querySelector('.quantity-input');
        const maxStock = parseInt(input.getAttribute('max'), 10);

        decrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(input.value, 10);
            if (currentValue > 0) {
                input.value = currentValue - 1;
            }
        });

        incrementBtn.addEventListener('click', () => {
            let currentValue = parseInt(input.value, 10);
            if (currentValue < maxStock) {
                input.value = currentValue + 1;
            }
        });
    });
});
</script>
@endpush
@endsection
