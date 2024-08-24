<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantExport;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $participants = Participant::where('name', 'like', '%' . $search . "%")
                ->orderBy('name', 'asc') // Tambahkan ini untuk mengurutkan berdasarkan nama
                ->paginate(6);
        } else {
            $participants = Participant::orderBy('name', 'asc') // Tambahkan ini untuk mengurutkan berdasarkan nama
                ->paginate(6);
        }

        return view('pages.participant.index', compact('participants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }
    public function exportExcel()
    {
        return Excel::download(new ParticipantExport, 'users.xlsx');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        DB::beginTransaction();
        try {
            $participant->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Participant Berhasil Di hapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
