<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



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
        $validatedData = $request->validate([
            'nik' =>['required','min:16','max:16'],
            'name' =>['required','max:100'],
            'gender' =>['required', Rule::in(['male', 'female'])],
            'birth_date' =>['required','string'],
            'birth_place' =>['required', 'max:100'],
            'addres' =>['required', 'max:600'],
            'religion' =>['nullable', 'max:50'],
            'marital_status' =>['required', Rule::in('single', 'merried', 'divorced', 'widowed')],
            'occupation' =>['nullable','max:100'],
            'phone' =>['nullable', 'max:20'],
        ]);

        Resident::create($validatedData);

        return redirect('/resident')->with('succes', 'berhasil menambahka data');
    }

     public function edit($id)
    {
    $resident = Resident::findOrfail($id);

        return view('pages.resident.edit', ['resident' => $resident ]);
    }
            
            public function update(Request $request, $id)
            {
                 $validated = $request->validate([
                    'nik' =>['required','min:16','max:16'],
                    'name' =>['required','max:100'],
                    'gender' =>['required', Rule::in(['male', 'female'])],
                    'birth_date' =>['required','string'],
                    'birth_place' =>['required', 'max:100'],
                    'addres' =>['required', 'max:600'],
                    'religion' =>['nullable', 'max:50'],
                    'marital_status' =>['required', Rule::in('single', 'merried', 'divorced', 'widowed')],
                    'occupation' =>['nullable','max:100'],
                    'phone' =>['nullable', 'max:20'],
                ]);

        resident::findorfail($id)->update($validated);

        return redirect('/resident')->with('succes', 'berhasil update data');
            }

            public function destroy($id)
            {
                $residents = Resident::findOrfail($id);
                $residents->delete();
        
                return redirect('/resident')->with('succes', 'berhasil menghapus data'); 
                
           }
}
                