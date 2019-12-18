<?php

namespace Modules\PriceList\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PriceListProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $product_id = $this->product_id;
        $price_list_id = $this->price_list_id;
        return [
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'product_list_id' => [Rule::unique('price_list_product')->where(function ($query) use($product_id, $price_list_id) {
                return $query->where('product_id', $product_id)
                ->where('price_list_id', $price_list_id);
            })],
//            'product_list_id' => ['unique:price_list_product,price_list_id,'.$this->id.','.$request->input('id').',id,hostname,'.$request->input('hostname')],
//            'product_list_id' => ['unique:price_list_product,price_list_id,'.$this->id.',NULL,id,hostname,'.$request->input('hostname')]
        ];
    }




    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
