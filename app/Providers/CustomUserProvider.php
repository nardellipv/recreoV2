<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class CustomUserProvider extends EloquentUserProvider
{
    /**
     * Retrieve a user by the given credentials, mapeando 'email' → 'email_school'
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials)) {
            return;
        }

        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }

            if ($key === 'email') {
                $query->where('email_school', $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }
}
