<?php

namespace App;

use Hashids\Hashids;

trait HasHashId
{
    public function hashids(): Hashids {
        return new Hashids(config('hashids.main.salt'), config('hashids.main.length'), config('hashids.main.alphabet'));
    }

    public function getIdAttribute($value): string {
        return $this->hashids()->encode($value);
    }

    public function getRawId(): int
    {
        return $this->attributes['id'];
    }

    public function resolveRouteBinding($value, $field = null)
    {
        $decoded = $this->hashids()->decode($value);

        if (empty($decoded)) {
            return null;
        }

        return $this->where($field ?? 'id', $decoded[0])->first();
    }
}
