<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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
Route::view('/application','application');

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcomee');
});
//Route::get('/user', array('before' => 'old', 'uses' => 'applicationController@index'));
//Route::match(['get', 'post'], '/index', 'applicationController@index');
//Route::get('/index', 'applicationController@index');
Route::get('/abc', 'ApplicationController@index');

Route::get('/home', 'App\Http\Controllers\ApplicationController@index');

Route::get('/assetDetails', 'App\Http\Controllers\ApplicationController@getAssetDetails');

Route::post('/getAssetDetailsPost', 'App\Http\Controllers\ApplicationController@getAssetDetailsPost');

Route::post('getAssetDetailsPost', function(){
    $data = json_decode(file_get_contents('php://input'));
    $methodCase = $data->{'method'};
    switch ($methodCase) {
        case 'WtrrefundInitiate':
            // $ArgServiceID = $data->{'ArgServiceID'};
            $ArgRegID = $data->{'ArgRegID'};
            $ArgTripNo = $data->{'ArgTripNo'};
            $ArgRemarks = $data->{'ArgRemarks'};
            $ArgActionBy = $data->{'ArgActionBy'};
            $refundData = array(
                "vchRegistrationNo" => $ArgRegID,
                "intRefundRequestfor" => $ArgTripNo,
                "vchRemarks" => $ArgRemarks,
                "intActionBy" => $ArgActionBy
            );
            $refundObj = new WtrRefundRequestModel();
            $refundData = $refundObj->insrt($refundData);
            echo "<pre>";
            print_r($refundData);
            break;
        default:
            # code...
            break;
    }
});