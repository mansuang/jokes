<?php

namespace Mansuang\Jokes;

use Illuminate\Support\Facades\Facade;

class ChuckNorris extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'chuck-norrs';
    }
}
