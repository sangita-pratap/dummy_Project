<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){

    }
   
    public function getAssetDetails(){
        $id='2142';
        $alt_id='11';
        $scheme_id='SCH000000401';
        $url='http://192.168.203.199:7001/Demo_PAMS/api/assetdata/'.$id.'/'.$alt_id.'/'.$scheme_id;        

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
           // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
         //   CURLOPT_POSTFIELDS => $postArray,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
               // "authorization: Basic ".BASE_AUTH_TOKEN
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
      
        if($response){          
            $response = json_decode($response,true);
           // print_r($response[0]);exit;
            $this->fetchData['details']=$response[0];             
              return view('application',$this->fetchData);
          }      

    }

    public function getAssetDetailsPost(){
        $id='2142';
        $alt_id='11';
        $scheme_id='SCH000000401';
        $url='http://192.168.203.199:7001/Demo_PAMS/api/assetdatapost';
     
        $postArray = array('id' => $id,'alt_id'=> $alt_id,'scheme_id'=>$scheme_id);
        $postArray = json_encode($postArray);       
//print_r($postArray); exit;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
           // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postArray,
             CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "postman-token: c320c193-f27e-e1bb-dc03-59de83a5610c"
            //     "authorization: Basic ".BASE_AUTH_TOKEN
             ),
        ));
    //print_r($curl); exit;
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
      
     //$servicesListingResult  =  callRestServiceAPI($postArray, ICICIPAYMENT_URL);
        //dd($servicesListingResult);
        if($response){
            print_r(json_encode(json_decode($response)), true); exit;
            $response = json_decode($response);
            $this->fetchData['details']=$response[0];  
            return view('application',$this->fetchData);           
          }   
         
    }
}
