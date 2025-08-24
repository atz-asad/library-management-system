<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /*
    * Unique name genaratetor
    */
    
    protected function uniqueFileName($file = null){
        
        if( $file){

            $uniqueName =  md5(rand(1000, 100000) . '_' . time() . '_' . str_shuffle("aidadadaadb")). "." . $file -> getClientOriginalExtension();
        }else{
            $uniqueName =  md5(rand(1000, 100000) . '_' . time() . '_' . str_shuffle("aidadadaadb"));
        }

        return $uniqueName;
    
    }

    /*
    * File Uplaod method
    */

    protected function fileUpload( $file = null, $path = 'media' ){
        if($file){
            // Genarate a Unique filename
            $fileName = $this->uniqueFileName($file);
    
            // Uplaod file to path
            $file->move(public_path($path), $fileName);
    
            return $fileName;
        }
    }


}
