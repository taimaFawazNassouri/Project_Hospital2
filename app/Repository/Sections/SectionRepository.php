<?php
namespace App\Repository\Sections;
use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use App\Models\Doctor;
use Illuminate\Http\Request;


class SectionRepository implements SectionRepositoryInterface{
   
    public function index(){
        $sections = Section::all();
        return view('Dashboard.Sections.index',compact('sections'));
    }



    public function store(Request $request){
        Section::create([
           'name'=>$request->input('name'),
           'description'=>$request->input('description'),
        ]);
        session()->flash('add');
        return redirect()->route('Sections.index');
    }



    public function show(String $id)
    {
        $doctors = Section::findOrFail($id)->doctors; //relationship onetomany 
        $section = Section::findOrFail($id);
       
        return view('Dashboard.Sections.show_doctors',compact('section','doctors'));
       
    }


    public function update(Request $request){
        $sections = Section::findOrFail($request->id);
        $sections->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),

        ]);
          session()->flash('edit');
        return redirect()->route('Sections.index');
    }

    
    public function destroy(Request $request){
        $sections = Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('Sections.index');
    }











}