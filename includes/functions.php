<?php

/**
 * call API
 */
function callAPI( $url = '' , $method = 'GET', $data = [], $headers = [] )
{
    $curl = curl_init();

    curl_setopt_array( $curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FAILONERROR => true,
        CURLOPT_CUSTOMREQUEST => $method,
    ));

    if ( !empty( $headers ) ) {
        curl_setopt( $curl, CURLOPT_HTTPHEADER, $headers );
    }

    // check if content type is json
    $isJson = false;
    foreach ( $headers as $header ) {
        if ( strpos( $header, 'application/json' ) !== false ) {
            $isJson = true;
            break;
        }
    }

    if ( !empty( $data ) ) {
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $isJson ? json_encode( $data ) : $data );
    }

    $response = curl_exec( $curl );

    $err = curl_error( $curl );

    curl_close($curl);

    if ($err) {
        return [
            "status" => "error",
            "message" => $err
        ];
    } 
    
    return [
        "status" => "success",
        "data" => $isJson ? json_decode( $response, true ) : $response
    ];
}