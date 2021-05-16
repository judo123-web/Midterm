<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class ApplicantController extends Controller
{
    public function index() {
//        $game = Applicant::paginate(10);
//        $applicants = Applicant::orderBy('experience_years')::paginate(10)->get();
//        $applicants = $applicants->paginate(10);

        if(Applicant::all()->count() == 0) {
          return 'applicants not found';
        }
        else {
            $applicants = Applicant::orderBy('experience_years')->paginate(15);
            return view('applicants.index', compact('applicants'));
        }
     }

    public function edit($id) {
        $applicants = Applicant::findorfail($id);
        return view('Applicants.edit',compact('applicants'));
//        return $applicant;
    }

    public function update(Request $request,$id){
        $applicant = Applicant::findorfail($id);
        $applicant->update($request->all());

        return redirect()->back();
    }

    public function hire($id,$is_hired){
        $applicant = Applicant::findorfail($id);
        if ($applicant->is_hired){
            $applicant->is_hired = false;
            $applicant->save();
            return redirect()->back();

        }
        else{
            $applicant->is_hired = True;
            $applicant->save();
            return redirect()->back();
        }
    }

    public function delete($id){
        $applicant = Applicant::findorfail($id);
        $applicant->delete();
        return redirect()->back();
    }
}
