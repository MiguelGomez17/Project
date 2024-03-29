<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Helper;

class ImportController extends Controller
{
    public function viewCatImport()
    {
        if(Helper::admin())
        {
            array_map('unlink', glob(resource_path('pending-files/*csv')));
            return view('catImport');
        }else{
            return redirect()->route('home');
        }
    }
    
    public function viewImport()
    {
        if(Helper::admin())
        {
            array_map('unlink', glob(resource_path('pending-files/*csv')));
            return view('Import');
        }else{
            return redirect()->route('home');
        }
    }

    public function Import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = file($request->file->getRealPath());
        $data = array_slice($file,1);
        $parts = array_chunk($data,2000);
        foreach($parts as $index=>$part){
            $fileName=resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv');
            file_put_contents($fileName,$part);
        }
        session()->flash('status','Importando archivo');
        return redirect("import/done");
        // https://youtu.be/ap7A1uav-tc?t=810
    }

    public function catImport(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = file($request->file->getRealPath());
        $data = array_slice($file,0);
        $parts = array_chunk($data,2000);
        foreach($parts as $index=>$part){
            $fileName=resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv');
            file_put_contents($fileName,$part);
        }
        session()->flash('status','Importando archivo');
        return redirect("/catImport/done");
        // https://youtu.be/ap7A1uav-tc?t=810
    }
}
