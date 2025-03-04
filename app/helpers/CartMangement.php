<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartMangement
{

    // Añadir artículo a la cesta
    static public function añadirArticuloCesta($producto_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        // Definir si el articulo existe
        $articulo_existe =  null;
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $producto_id) {
                $articulo_existe = $key;
                break;
            }
        }
        if ($articulo_existe !== null) {
            $cart_items[$articulo_existe]['quantity']++;
            $cart_items[$articulo_existe]['total_amount'] = $cart_items[$articulo_existe]['quantity'] * $cart_items[$articulo_existe]['unit_amount'];
        } else {
            $product = Product::where('id', $producto_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $producto_id,
                    'name' => $product->name,
                    'images' => $product->images[0],
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,

                ];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }
        // Añadir artículo a la cesta por cantidad 
        static public function añadirArticuloCestaWithQty($producto_id, $qty=1)
        {
            $cart_items = self::getCartItemsFromCookie();
            // Definir si el articulo existe
            $articulo_existe =  null;
            foreach ($cart_items as $key => $item) {
                if ($item['product_id'] == $producto_id) {
                    $articulo_existe = $key;
                    break;
                }
            }
            if ($articulo_existe !== null) {
                $cart_items[$articulo_existe]['quantity']=$qty;
                $cart_items[$articulo_existe]['total_amount'] = $cart_items[$articulo_existe]['quantity'] * $cart_items[$articulo_existe]['unit_amount'];
            } else {
                $product = Product::where('id', $producto_id)->first(['id', 'name', 'price', 'images']);
                if ($product) {
                    $cart_items[] = [
                        'product_id' => $producto_id,
                        'name' => $product->name,
                        'images' => $product->images[0],
                        'quantity' => $qty,
                        'unit_amount' => $product->price,
                        'total_amount' => $product->price,
    
                    ];
                }
            }
            self::addCartItemsToCookie($cart_items);
            return count($cart_items);
        }
    // Eliminar artículos del carrito
    static public function removeCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {

            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }


    // Agregar artículos del carrito a la cookie
    static public function addCartItemsToCookie($cart_item)
    {

        Cookie::queue('cart_items', json_encode($cart_item), 60 * 24 * 30);
    }

    static public function clearCartItems()
    {

        Cookie::queue(Cookie::forget('cart_items'));
    }

    //  Obtener todos los artículos del carrito de Cookie
    static public function getCartItemsFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        if (!$cart_items) {
            $cart_items = [];
        }
        return $cart_items;
    }
    // incrementar la cantidades articulos 
    static public function incrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }
    // decrement item quantity
    static public function decrementQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemsFromCookie();
        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($item['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
                }
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }
    //  calculate   grand total 
    static public function calculateGrandTotal($items)
    {
        return array_sum(array_column($items, 'total_amount'));
    }
}