<?php
use Carbon\Carbon;
return [

    'closing_month' => Carbon::now()->subMonth(1)->format('m'),  
    'closing_year' => Carbon::now()->subMonth(1)->format('Y'),  
]

?>
