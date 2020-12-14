<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \Carbon\Carbon;

class UserCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // parse dates
        $created_at_date_1 = 
        Carbon::parse( $this['created_at'] )->formatLocalized('%d %b %Y');

        return [
            'id' => $this['id'],
            'name' => $this['name'],
            'email' => $this['email'],
            'created_at' => $created_at_date_1
        ];
    }
}
