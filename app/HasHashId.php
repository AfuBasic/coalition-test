<?php

namespace App;

use Hashids\Hashids;

trait HasHashId
{
    protected $appends = ['hashid'];
    public function hashids(): Hashids {
        return new Hashids(config('hashids.connections.main.salt'), config('hashids.connections.main.length'), config('hashids.connections.main.alphabet'));
    }

    public function getRawId(): int
    {
        return $this->attributes['id'];
    }

    public function getHashidAttribute()
    {
        return $this->hashids()->encode($this->attributes['id']);
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
