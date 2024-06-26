<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement {

    // add item to cart
    static public function addItemsToCart($product_id) {
        $cart_items = self::getCartItemsFromCookie();
        
        $existing_items = null;
        
        foreach ($cart_items as $key => $item) {
            if ($item["product_id"] == $product_id) {
                $existing_items = $key;
                break;
            }
        }
        
        if ($existing_items !== null) {
            $cart_items[$existing_items]["quantity"]++;
            $cart_items[$existing_items]["total_amount"] = $cart_items[$existing_items]["quantity"] * $cart_items[$existing_items]["unit_amount"];
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            // dd($product);
            if($product){
                $cart_items[] = [
                    'product_id'=> $product->id,
                    'name'=> $product->name,
                    'unit_amount'=> $product->price,
                    'total_amount'=> $product->price,
                    'image'=> $product->images[0],
                    'quantity'=> 1,
                ];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return count($cart_items);
    }

    // remove items from cart
    static public function removeCartItems($product_id){
        $cart_items = self::getCartItemsFromCookie();
        
        foreach ($cart_items as $key => $item) {
            if($item['product_id'] == $product_id){
                unset($cart_items[$key]);
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // add cart items to cookie
    static public function addCartItemsToCookie($cart_items) {
        Cookie::queue('cart_items', json_encode($cart_items, 60 * 24 * 30));
    }
    
    // clear cart items from cookie
    static public function clearCartItems($cart_items) {
        Cookie::queue(Cookie::forget('cart_items'));
    }
    
    // get all cart items from cookie
    static public function getCartItemsFromCookie() {
       $cart_items = json_decode(Cookie::get('cart_items'), true);
    //    $cart_items = Cookie::get();

    //    dd($cart_items);
       if(!$cart_items){
            $cart_items = [];
       }
       
       return $cart_items;
    }
    
    // increment item quantity
    static public function  incrementQuantityToCartItems($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if($item['product_id'] == $product_id){
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }

        self::addCartItemsToCookie($cart_items);
        return $cart_items;
    }

    // decrement item quantity
    static public function  decrementQuantityToCartItems($product_id){
        $cart_items = self::getCartItemsFromCookie();

        foreach ($cart_items as $key => $item) {
            if($item['product_id'] == $product_id && $cart_items[$key]['quantity'] > 1){
                $cart_items[$key]['quantity']--;
                $cart_items[$key]['total_amount'] = $cart_items[$key]['quantity'] * $cart_items[$key]['unit_amount'];
            }
        }
        self::addCartItemsToCookie($cart_items);
        return $cart_items;

    }
    
    // calculate gand total
    static public function calculateGrandTotal($items){
        return array_sum(array_column($items, 'total_amount'));
    }

}