<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function viewImport()
    {
        return view('Import');
    }
    
    public function Import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);
        $file = file($request->file->getRealPath());
        $data = array_slice($file,1);
        $parts = array_chunk($data,1000);

        foreach($parts as $index=>$part){
            $fileName=resource_path('pending-files/'.date('y-m-d-H-i-s').$index. '.csv');
            file_put_contents($fileName,$part);
        }
        session()->flash('status','Importando archivo');
        return redirect("import/done");
        // https://youtu.be/ap7A1uav-tc?t=810
    }
}
