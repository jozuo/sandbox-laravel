<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class Connection
{
    public function transaction(callable $fn)
    {
        return DB::transaction($fn);
    }
}
