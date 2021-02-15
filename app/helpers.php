<?php

use \Carbon\Carbon;

function active($route_name) { 
    echo request()->routeIs($route_name) ? 'active' : '';
}

function fdatetime($string) {
    return Carbon::createFromFormat('Y-m-d\TH:i:sP', $string)->format('d-m-Y H:i'); 
}