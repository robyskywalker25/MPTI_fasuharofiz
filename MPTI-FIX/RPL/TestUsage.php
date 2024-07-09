$redis = new  Redis (); 
$redis -> connect ( '127.0.0.1' , 6379 ); 
$storage = new  RedisStorage ( $redis ); 

// Izinkan maksimal 10 permintaan dalam 60 detik. 
$rateLimitter = new  RateLimiter ([ 
    'refillPeriod' => 60 , 
    'maxCapacity' => 10 , 
    'prefix' => 'api'
 ], $storage ); 

$ip = $_SERVER [ 'REMOTE_ADDR' ]; 
if ( $rateLimitter -> check ( $ip )) { 
    echo  'OK' ; 
} else { 
    echo  'Batas Terlampaui' ; 
}