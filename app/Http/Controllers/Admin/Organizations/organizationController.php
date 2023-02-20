<?php

namespace App\Http\Controllers\Admin\Organizations;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class organizationController extends Controller
{
      public function index(){

      
        return view('admin.organizations.index');
    }

    public function store(Request $request){
        

        $this->validate($request,[  
            'name'=>'required'
        ]);



         if(Organization::where('name', $request->name)->first()){
                 return to_route('admin.organizations')->with('error', "Organization Existed");
             }else{

                      
          try{
        DB::transaction(function() use($request){



            
           

           
                Organization::updateOrcreate([
                'name'=>$request->name
            ]);
             
      

           
        }
    
    );

     return to_route('admin.organizations')->with('message', "Organization Added");
        }catch(\Exception $exception){
            return to_route('admin.organizations')->with('message', $exception->getMessage());
        }


               
             }


  

    }
    

/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function destroy($organization)
    {


             try{
        DB::transaction(function() use($organization){
             $data= Organization::find($organization);
         $data->delete();  
        }
    
    );

     return to_route('admin.organizations')->with('message', "Organization Deleted");
        }catch(\Exception $exception){
            return view('admin.organizations.index')->with('message', "Deletion Failed");
        }

        
    }

}
