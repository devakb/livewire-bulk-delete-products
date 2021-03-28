<div>
    <div class="alert alert-info" role="alert">
        Choose at least one product, and click "Delete selected".
    </div>
    <button wire:click.prevent="deleteSelected" onclick="confirm('Are you sure?') || event.stopImmediatePropagation()" class="btn btn-danger" @if(count($this->selected_products) <= 0) disabled title="Choose at least one product" @endif>
        Delete Selected
    </button>

    <table class="table table-borderless mt-3">
        <thead class="bg-dark  text-light">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr @if(in_array($product->id ,$this->selected_products)) class="bg-warning" @endif>
                    <td><input type="checkbox" wire:model="selected_products"  value="{{ $product->id }}"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>₹ {{ $product->product_price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->category_name ?? "--" }}</td>
                </tr>
            @empty
              <tr>
                  <td class="text-center text-muted small" colspan="100%">
                      No Products Found
                  </td>
              </tr>
            @endforelse
        </tbody>
    </table>
</div>
