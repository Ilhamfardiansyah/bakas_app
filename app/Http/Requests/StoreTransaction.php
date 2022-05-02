<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransaction extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'suplaier_id' => 'required',
            'no_po' => 'required',
            'plu' => 'required|unique:posts', 
            'nama_barang' => 'required',
            'barcode' => 'required|unique:posts',
            'rak_id' => 'required',
            'stok' => 'required',
            'harga_satuan' => 'required',
            'detail_id' => 'required',
            'sub_total' => 'max:255'
        ];
    }
}
