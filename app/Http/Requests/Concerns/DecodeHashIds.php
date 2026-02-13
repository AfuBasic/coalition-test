<?php

namespace App\Http\Requests\Concerns;

use Hashids\Hashids;

trait DecodeHashIds
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    protected function decodeHashIds(): void
    {
        if(empty($this->hashIds)){
            return;
        }

        $hashids = app(Hashids::class);

        foreach($this->hashIds as $field){
            $value = $this->input($field);
            if(!$value) continue;

            $decoded = $hashids->decode($value);
            $this->merge([
                $field => $decoded[0] ?? null
            ]);
        }
    }
}
