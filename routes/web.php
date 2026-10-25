<?php

use App\Models\Comment;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    // Cache::put('key' , 'aMohamed Tam/er' , now()->addSecond(10) );

    //    Cache::store('database')->put('email' , 'mohamed9887@gmail.com' , 20);

    //    $st =  Cache::store('database')->get('email');

    // $val = Cache::get('key' , "default");/
    //    $val1 = Cache::pull('key');

    // return  (Cache::has('key') ? $val : 'default')  . " Retrieved";

    // Cache::put('username' , 'mohmmed', now()->addSeconds(2));
    // Cache::add('key' , 'mohmmed', now()->addSeconds(10));
    // Cache::forever('kay' , "Ali");
    // Cache::put('number' ,10);
    // Cache::put('numbers' ,[10,20,30,40,50,60]);
    // Cache::put('flag' ,true);
    // Cache::put('price' , 10.5);
    // return Cache::has('username')? "Yes" : "NO";

    // $val = Cache::pull('price', 'Not found');

    // $vals = Cache::get('numbers');
    // $collection = collect($vals)->reduce(function ($carry, $item) {
    //     return $item > 50 ? $carry + 1 : $carry;
    // }, 0);

    // return $collection;

    // Cache::increment('views', 1);

    // Cache::put('result'  ,'man', 5);
    // Cache::touch('result' , 10);

    // Hit => Found in cache
    // if (Cache::has('key')) {
    //    return  Cache::get('key', 'Not Found');
    // } else {
    //     // Miss => found in DB
    //     Cache::put('key' , 'Item add In Cache');
    //     return Cache::get('key' , 'Not Found');
    // }

    // Hit & Miss By use builtin

    // $value = Cache::remember('comments', 60, function () {
    //     return Comment::find(1);
    // });

    // return [$value];

    // [$value , $warm] = Cache::rememberWithWarmth('comments', 60, function () {
    //     return DB::table('comments')->get();
    // });

    // Cache::put('hits' , 0 , 60);
    // Cache::put('misses' , 0 , 60);

    // if ($warm) {
    //     Cache::increment('hits' , 1);
    // } else {
    //     Cache::increment('misses' , 1);
    // }

    // Cache::forget('hits');
    // Cache::put('misses' , 'asd' ,   0);
    // Cache::flush();

    Cache::forever('memo', 'Memoizations');

    // echo Cache::get('memo');
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';
    echo Cache::memo()->get('memo').'<br>';

    cache(['GOAT' => 'Messi'] , 10);
    echo cache('GOAT');


    /*
    With memo
    1 x written memo (23.65%) 31.15ms/160B
    1 x hit memo (2.51%) 3.30ms/160B


    -----      14   -----     1    -----    1      -----
    | S  |   <===>  |memo| <====>  |Cch | <===>    |DB  |
    |    |          |    |         |    |          |    |
    ------          ------          ------         ------
    */

    /*
     Without memo
        14 x hit memo (26.67%) 49.78ms/2.19KB
        1 x written memo (12.08%) 22.56ms/160B
     */

});
