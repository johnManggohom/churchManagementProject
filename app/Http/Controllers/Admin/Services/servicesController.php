<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Ocassion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class servicesController extends Controller
{
    public function index(){

      
        return view('admin.services.index');
    }

    public function store(Request $request){

        $this->validate($request,[  
            'name'=>'required'
        ]);



         if(Ocassion::where('name', $request->name)->first()){
                 return to_route('admin.services')->with('error', "Ocassion Existed");
             }else{

                      
          try{
        DB::transaction(function() use($request){



            
           

           
                Ocassion::updateOrcreate([
                'name'=>$request->name
            ]);
             
      

           
        }
    
    );

     return to_route('admin.services')->with('message', "Occasion Added");
        }catch(\Exception $exception){
            return view('admin.services.index')->with('message', "Occasion Denied");;
        }


               
             }


  

    }
    

/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function destroy($ocassion)
    {


             try{
        DB::transaction(function() use($ocassion){
             $data= Ocassion::find($ocassion);
         $data->delete();  
        }
    
    );

     return to_route('admin.services')->with('message', "Occasion Deleted");
        }catch(\Exception $exception){
            return view('admin.services.index')->with('message', "Deletion Failed");
        }

        
    }

}
