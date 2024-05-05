<?php

namespace App;

class Weather
{

    function __construct(
        public readonly string $apiKey
    )
    {
    }

    function isSunnyTomorrow() : bool|String
    {
        return $this->apiKey;
    }
}
