<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfigsController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configs=Config::all();
       
        $data= $configs->each(function($config){
        return $config->sale->user;
    });
     return view('configs.index',['data'=>$data]);

       
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Config $config)
    {
       
        return view('configs.edit',['configs'=>$config]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Config $config)
    {
        
        $data=Validator::make($request->all(),[
            'sales_target'=> 'required|required|digits_between:1,100'
        ])->validated();
        
       
        $config->update(['sales_target'=>$data['sales_target']]);
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
