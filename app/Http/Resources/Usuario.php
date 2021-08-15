<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Usuario extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'cpf'=>$this->cpf,
            'name'=>$this->name,
            'senha'=>$this->senha,
            'data_nascimento'=>$this->data_nascimento
        ];
        //return parent::toArray($request);
    }
}
