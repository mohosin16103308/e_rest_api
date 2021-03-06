<?php

namespace App\Http\Resources\Product;
use Illuminate\Http\Resources\Json\Resource;
use App\Model\Review;
class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'name' => $this->name,
            'details' => $this->details,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' =>$this->discount,
            'totalPrice' => round(( 1 - ($this->discount/100)) * $this->price,2),
            'rating' => $this->reviews->count(),

            'href' => [
                'reviews' => route('reviews.index',$this->id)
            ]

        ];
    }
}