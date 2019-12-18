<?php

# Retrieving Items From The Cache
# Checking For Item Existence
# Incrementing / Decrementing Values
# Retrieve & Store
# Retrieve & Delete
# Storing Items In The Cache
# Store If Not Present
# Storing Items Forever

if (!function_exists('CacheGet') || !function_exists('CacheGetWithDatabaseFallback')) {
    function CacheGet($key, $default = 'empty')
    {
        return \Cache::get($key, $default);
    }
	
    function CacheGetWithDatabaseFallback($key)
    {
        return \Cache::get('key', function () {
        });
    }
}

if (!function_exists('CacheHas')) {
    function CacheHas($key)
    {
        if (\Cache::has('key')) {
        } else {
            return 'empty';
        }
    }
}

if (!function_exists('CacheIncrement') || !function_exists('CacheDecrement')) {
    function CacheIncrement($key, $amount = 1)
    {
        \Cache::increment($key, $amount);
    }
	
    function CacheDecrement($key, $amount = 1)
    {
        \Cache::decrement($key, $amount);
    }
}

if (!function_exists('CacheRemember') || !function_exists('CacheRememberForever')) {
    function CacheRemember($key, $minutes = 1)
    {
        return \Cache::remember($key, $minutes, function () {
        });
    }
	
    function CacheRememberForever($key)
    {
        return \Cache::rememberForever($key, function () {
            return \DB::table('users')->get();
        });
    }
}

if (!function_exists('CachePull')) {
    function CachePull($key)
    {
        return \Cache::pull($key);
    }
}

if (!function_exists('CachePut')) {
    function CachePut($key, $value, $minutes = 10)
    {
        $expiresAt = now()->addMinutes($minutes);

        return \Cache::put($key, $value, $expiresAt);
    }
}

if (!function_exists('CacheAdd')) {
    function CacheAdd($key, $value, $minutes = 10)
    {
        $expiresAt = now()->addMinutes($minutes);

        return \Cache::add($key, $value, $expiresAt);
    }
}

if (!function_exists('CacheAdd')) {
    function CacheForever($key, $value)
    {
        return \Cache::forever($key, $value);
    }
}
