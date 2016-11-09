<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMovieRequest extends FormRequest
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
            'title' => 'required',
            'rating' => 'required|numeric|between:0,10',
            'awards' => 'required|numeric|between:1,20',
            'length' => 'required|numeric|between:10,400',
            'release_date' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'El Titulo es Requerido',
            'rating.required' => 'El Reiting es Requerido',
            'rating.between' => 'El Reiting tiene que estar entre 0 y 10',
            'awards.required' => 'El Award es Requerido',
            'awards.between' => 'El Award tiene que estar entre 1 y 20',
            'length.required' => 'La Duracion es Requerida',
            'length.between' => 'La Duracion tiene que estar entre 50 y 400',
            'release_date.required' => 'La Fecha es Requerida',
        ];
    }
}
