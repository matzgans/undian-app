<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantExport;
use App\Http\Requests\ParticipantStoreRequest;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;

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
        DB::beginTransaction();
        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'ktp_id' => 'required|digits:16|unique:participants',  // Pastikan 'participants' adalah nama tabel yang benar
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'ktp_image' => 'required|mimes:jpg,jpeg,png|max:500',  // Maksimal 2MB, sesuaikan jika perlu
            ]);

            // Proses upload gambar
            if ($request->hasFile('ktp_image')) {
                $file = $request->file('ktp_image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();  // Buat nama file unik
                $file->move(public_path('assets'), $fileName);  // Pindahkan file ke public/assets
                $validatedData['ktp_image'] = 'assets/' . $fileName;  // Simpan path file ke database
            } else {
                $validatedData['ktp_image'] = null;
            }

            // Buat ticket_number unik
            do {
                $ticket_number = 'DIARY' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            } while (Participant::where('ticket_number', $ticket_number)->exists());

            // Simpan data ke database
            Participant::create(array_merge($validatedData, ['ticket_number' => $ticket_number]));

            DB::commit();
            // return redirect()->back()->with('success', 'Data Participant Berhasil Disimpan')->with('ticket_number', $ticket_number);

            return redirect()->route('tickets.index')->with('success', 'Data Participant Berhasil Disimpan')->with('ticket_number', $ticket_number);
        } catch (\Throwable $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
        return view("pages.participant.edit", compact('participant'));
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
