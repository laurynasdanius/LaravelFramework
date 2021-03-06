<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function create()
    {
        return view('create');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'originalus_pavadinimas',
                'koduotas_pavadinimas',
                'rodomas_pavadinimas',
                'path'
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                //suformuojamas naujas atsitiktinis pavadinimas 
                    $name = time().rand(1,100).'.'.$file->extension();

                //perkeliamas failas į norimą vietą
                $file->move(public_path('files'), $name);  

                //išsaugojamas senasis pavadinimas
                $file_old=$file->getClientOriginalName();
                $files = $name;  

                //įrašas į db abie bylą
                $file= new File();
                $file->filenames = $files;

                //koduotas pavadinimas
                $file->koduotas_pavadinimas;

                //originalus pavadinimas
                $file->originalus_pavadinimas = $file_old;
                
                //rodomas pavadinimas

                $file->rodomas_pavadinimas=$request->rodomas_pavadinimas;

                //kelias
                $path = 'files/'.$name;
                $file->path = $path;
                //save
                $file->save();
            }
         }
         
        //  Tasks::create($request->all());
        return back()->with('success', 'Duomenys įkelti');
    }
}