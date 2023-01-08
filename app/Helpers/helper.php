<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function upladeImage($model, $array, $collection) {
    global $request;
    for ($i=0; $i < COUNT($array); $i++) {
        if ($request->file($array[$i])) {
            $model
            ->clearMediaCollection($collection[$i])
            ->addMediaFromRequest($array[$i])
            ->usingFileName(time() . $request->file($array[$i])->getClientOriginalName())
            ->toMediaCollection($collection[$i]);
        }
    }
}

