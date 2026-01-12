<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\http\Request;
use Illuminate\validation\rule;



class Residentcontroller extends Controller
{
    public function index()
    {

    $residents = Resident::all();

    return view('pages.resident.index',[
        'residents' => $residents,
        ]);
    
    
    }

    public function create()
    {
        return view('pages.resident.create');
        
      }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' =>['required','min;15','max;15'],
            'nama' =>['required','max:100'],
            'gender' =>['required', rule::in(['male', 'female'])],
            'birth_date' =>['required','string'],
            'birth_place' =>['required', 'max:100'],
            'address' =>['required', 'max:600'],
            'religion' =>['nullable', 'max:50'],
            'martial_status' =>['required', rull::in('single', 'merried', 'divorced', 'widowed')],
            'occupation' =>['nullable','max:100'],
            'phone' =>['nullable', 'max:20'],
            'status' =>['required', rule::in(['active', 'moved', 'deceased'])]

        ]);

        resident::create($request->valiadet());

        return rediect('/resident')->with('succes', 'berhasil menambahka data');
    }

     public function edit($id)
        {
        $residents = Resident::findOrfail($id);

        return view('pages.resident.edit',[
            'resident' => $resident ]);
            }
            
            public function update()
            {
                 $validated = $request->validate([
            'nik' =>['required','min;15','max;15'],
            'nama' =>['required','max:100'],
            'gender' =>['required', rule::in(['male', 'female'])],
            'birth_date' =>['required','string'],
            'birth_place' =>['required', 'max:100'],
            'address' =>['required', 'max:600'],
            'religion' =>['nullable', 'max:50'],
            'martial_status' =>['required', rull::in('single', 'merried', 'divorced', 'widowed')],
            'occupation' =>['nullable','max:100'],
            'phone' =>['nullable', 'max:20'],
            'status' =>['required', rule::in(['active', 'moved', 'deceased'])]

        ]);

        resident::findorfail($id)->update($request->valiadet());

        return rediect('/resident')->with('succes', 'berhasil update data');
            }

            public function destroy($id)
            {
                $residents = Resident::findOrfail($id);
                $resident->delete();
        
                return redirect('/resident')->with('succes', 'berhasil menghapus data'); 
                
           }
}
                