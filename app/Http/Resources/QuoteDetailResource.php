<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuoteDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'carrierId' => $this->carrier->id,
            'carrierName' => $this->carrier->name,
            'tariffId' => $this->tariff->id,
            'tariffDescription' =>$this->tariff->description,
            'tariffOwner' => $this->tariff->owner,
            'accountNumber' => $this->tariff->account_number,
            'baseCharge' => $this->base_charge,
            'netCharge' => $this->net_charge,
            'quoteNumber' => $this->quote_number,
            'transitTime' => $this->transit_time,
        ];
    }
}
