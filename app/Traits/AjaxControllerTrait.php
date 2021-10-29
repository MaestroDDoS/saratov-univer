<?php

namespace App\Traits;

use Carbon\Carbon;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Database\Eloquent\Builder;

trait AjaxControllerTrait {

    protected function ajax_result(): array
    {
        return [];
    }

    protected function ajax($result=[])
    {
        return response()->json( array_merge( [ 'status' => true ], $result ) );
    }

    protected function CreateCustomParams(): array
    {
        return  [];
    }
}


