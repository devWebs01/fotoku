<?php

namespace App\Template\Parser;

class Helpers
{
    /**
     * Returns an array with the same keys and
     * a default value
     *
     * @return array
     */
    public static function justKeys(array $ar, $fillWith = [])
    {
        return array_fill_keys(array_keys($ar), $fillWith);
    }

    /**
     * Makes an array lowercase
     *
     * @return array
     */
    public static function normalize(array $ar)
    {
        return array_map('strtolower', $ar);
    }
}
