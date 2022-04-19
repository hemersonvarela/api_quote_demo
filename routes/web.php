<?php


use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $response = Http::get('https://run.mocky.io/v3/bf69042f-9261-4313-8e4a-5a00d05f2e7b');
    $response = strtr(
        $response->getBody()->getContents(),
        ['</s:' => '</', '<s:' => '<', '</a:' => '</', '<a:' => '<']
    );
    $output = json_decode(json_encode(simplexml_load_string($response)));
//    var_dump($output->Body->GetQuotesResponse->GetQuotesResult);


    dd($output->Body->GetQuotesResponse->GetQuotesResult->Quotes);

    $xml = simplexml_load_string($clean_xml);

    dd($xml);


//    dd($response->getBody());
//
//    dd(
//        json_decode(
//            json_encode(
//                (array)simplexml_load_string($response->getBody()->getContents())
//        ),true)
//    );


    return view('welcome');
});
