<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Polyclinic;
use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use PDF;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->get();
        return view('backend.pages.patient.index', compact('patients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $polyclinics = Polyclinic::all();
        $patients = Patient::where('category_patient','Lama')->distinct()->get();
        // dd($patients);
        return view('backend.pages.patient.create', compact('polyclinics','patients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::today();
        // dd($counter);
        $max = Queue::max('queue');
        $max += 1;

        if ($request->category_patient == 'Baru') {
            $request->validate([
                'polyclinic_id' => 'required',
                'name' => 'required|unique:patients,name|string',
                'address' => 'required',
                'phone_number' => 'required|numeric|min:11',
                'category_patient' => 'required',
            ]);

            $patient = Patient::create([
                'polyclinic_id' => $request->polyclinic_id,
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'category_patient' => $request->category_patient,
                'date' => $now,
            ]);
       
            Queue::create([
                'patient_id' => $patient->id,
                'queue' => $max,
            ]);
        } else {
            $id =  $request->id;
            $data = Patient::find($id);
            $patient = Patient::create([
                'polyclinic_id' => $data->polyclinic_id,
                'name' => $data->name,
                'address' => $data->address,
                'phone_number' => $data->phone_number,
                'category_patient' => $data->category_patient,
                'date' => $now,
            ]);     
            Queue::create([
                'patient_id' => $patient->id,
                'queue' => $max,
            ]);  
        }
        if($patient){
            return redirect()->route('pasien.index')->with('success', 'Berhasil menambahkan data Pasien');
        } else {
            return redirect()->route('pasien.index')->with('errors', 'Gagal menambahkan data Pasien!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $patient = Patient::findorfail($id);
        $polyclinics = Polyclinic::all();
        return view('backend.pages.patient.edit', compact('polyclinics','patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'polyclinic_id' => 'required',
            'name' => 'requireD|string',
            'address' => 'required',
            'phone_number' => 'required|numeric|min:11',
        ]);

        $patient = Patient::findOrFail($id);
        $data = [
            'polyclinic_id' => $request->polyclinic_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ];
        $patient->update($data);
    
        if($patient){
            return redirect()->route('pasien.index')->with('warning', 'Berhasil merubah data pasien!');
        } else {
            return redirect()->route('pasien.index')->with('errors', 'Gagal merubah data pasien!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $patient = Patient::findorfail($id);
        if(!$patient){
            return redirect()->route('pasien.index')->with('errors', 'Data pasien tidak ditemukan!');
        } else {
            $patient->delete();
            return redirect()->route('pasien.index')->with('warning', 'Berhasil mnghapus data pasien!');
        }
    }

    public function registration()
    {
        $doctor = Doctor::where('email', Auth::user()->email)->first();
        if($doctor){
            $patients = Patient::with(['queue'])->where('is_active',1)->where('polyclinic_id', $doctor->polyclinic_id)->orderBy('id', 'asc')->get();
        } else {
            $patients = Patient::with(['queue','polyclinic'])->where('is_active',1)->orderBy('id', 'asc')->get();
        }
        // dd($doctor);
        return view('backend.pages.patient.registration', compact('patients'));
    }

    public function today()
    {
        $now = Carbon::today();
        
        $patients = Patient::with(['queue','polyclinic'])->where('date',$now)->where('is_diagnose', 1)->orderBy('id', 'asc')->get();
        return view('backend.pages.patient.today', compact('patients'));
    }

    public function dipoli(Request $request, $id)
    {
        $request->validate([
            'diagnose' => 'required',
        ]);
        $patient = Patient::where('id', $id)
            ->update([
                'category_patient' => 'Lama',
                'diagnose' => $request->diagnose,
                'is_diagnose' => 1,
                'is_active' => 0,
            ]);

        if($patient){
            return redirect()->route('registration')->with('success', 'Berhasil merubah data pasien!');
        } else {
            return redirect()->route('registration')->with('errors', 'Gagal merubah data pasien!');
        }
    }

    public function print()
    {
        Carbon::now()->setLocale('ID');
        $now = Carbon::now()->translatedFormat('l, d F Y');
        // dd($now);
        $patients = Patient::with(['queue','polyclinic'])->where('date',$now)->where('is_diagnose', 1)->orderBy('id', 'asc')->get();


    	$pdf = PDF::loadview('backend.pages.patient.print',[
            'patients'=>$patients,
            'now' => $now,
            ]);            
    	return $pdf->download('laporan-pasien-pdf');
    }
}
