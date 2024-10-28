<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-semibold mb-4">Shopping Cart</h1>
        <div class="flex flex-col md:flex-row gap-4">
            <div class="md:w-3/4">
                <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="text-left font-semibold">Product</th>
                                <th class="text-left font-semibold">Price</th>
                                <th class="text-left font-semibold">Quantity</th>
                                <th class="text-left font-semibold">Total</th>
                                <th class="text-left font-semibold">Remove</th>
                            </tr>
                        </thead>
                        @forelse ($cart_items as $item)
                           
                            <tbody>
                                <tr wire:key='{{ $item['product_id'] }}'>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <img class="h-16 w-16 mr-4" src=" {{ url('storage', $item['images']) }}"
                                                alt="Product image">
                                            <span class="font-semibold">{{ $item['name'] }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4"> {{ Number::currency($item['unit_amount'], 'PEN') }}</td>
                                    <td class="py-4">
                                        <div class="flex items-center">
                                            <button wire:click='decreaseQty({{ $item['product_id'] }})' class="border rounded-md py-2 px-4 mr-2">-</button>
                                            <span class="text-center w-8"> {{ $item['quantity'] }}</span>
                                            <button wire:click='increaseQty({{ $item['product_id'] }})' class="border rounded-md py-2 px-4 ml-2">+</button>
                                        </div>
                                    </td>
                                    <td class="py-4">{{ Number::currency($item['total_amount'], 'PEN') }}</td>
                                    <td>
                                        <button wire:click='remove_item({{ $item['product_id'] }})'
                                            class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">
                                            <span wire:loading.remove
                                                wire:target='remove_item({{ $item['product_id'] }})'>
                                                Remove
                                            </span>
                                            <span wire:loading   wire:target='remove_item({{ $item['product_id'] }})'>
                                                Removing...
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                <!-- More product rows -->
                            </tbody>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="rounded-full bg-slate-100 p-6">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-slate-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <h3 class="text-2xl font-semibold text-slate-700">Tu carrito está vacío</h3>
                                        <p class="text-center text-slate-500 max-w-sm">
                                            Parece que aún no has añadido ningún artículo a tu carrito. ¡Explora
                                            nuestros productos y empieza a comprar!
                                        </p>
                                        <a wire:navigate href="/products"
                                            class="mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors duration-300">
                                            Continuar comprando
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse


                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>{{ Number::currency($grand_total, 'PEN') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>{{ Number::currency(0, 'PEN') }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>$0.00</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Grand Total</span>
                        <span class="font-semibold">{{ Number::currency($grand_total, 'PEN') }}</span>
                    </div>
                    @if ($cart_items)
                        <a href="/checkout" class="bg-blue-500 block text-center text-white py-2 px-4 rounded-lg mt-4 w-full">Checkout</a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
