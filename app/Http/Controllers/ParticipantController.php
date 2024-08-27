<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantExport;
use App\Http\Requests\ParticipantStoreRequest;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use ReCaptcha\ReCaptcha;

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
                ->paginate(4);
        } else {
            $participants = Participant::orderBy('name', 'asc') // Tambahkan ini untuk mengurutkan berdasarkan nama
                ->paginate(4);
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
            // Validasi input termasuk reCAPTCHA
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'ktp_id' => 'required|digits:16|unique:participants',  // Pastikan 'participants' adalah nama tabel yang benar
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'ktp_image' => 'required|mimes:jpg,jpeg,png|max:500',  // Maksimal 500KB, sesuaikan jika perlu
                // 'g-recaptcha-response' => 'required',  // Validasi CAPTCHA
            ]);

            // Verifikasi reCAPTCHA
            // $recaptcha = new ReCaptcha(config('services.google.recaptcha.secret_key'));
            // $response = $recaptcha->verify($request->input('g-recaptcha-response'), $request->ip());

            // if (!$response->isSuccess()) {
            //     throw new \Exception('ReCAPTCHA verification failed.');
            // }

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
        DB::beginTransaction();
        try {
            // Validasi input
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                // 'ktp_id' => 'required|digits:16|unique:participants,ktp_id,' . $participant->id,  // Memperbolehkan nilai yang sama untuk peserta yang sama
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'ktp_image' => 'nullable|mimes:jpg,jpeg,png|max:2048',  // Gambar bersifat opsional saat update
            ]);

            // Proses upload gambar
            if ($request->hasFile('ktp_image')) {
                // Hapus gambar lama jika ada
                if ($participant->ktp_image && file_exists(public_path($participant->ktp_image))) {
                    unlink(public_path($participant->ktp_image));
                }

                // Upload gambar baru
                $file = $request->file('ktp_image');
                $fileName = time() . '.' . $file->getClientOriginalExtension();  // Buat nama file unik
                $file->move(public_path('assets'), $fileName);  // Pindahkan file ke public/assets
                $validatedData['ktp_image'] = 'assets/' . $fileName;  // Simpan path file ke database
            } else {
                // Jika tidak ada gambar baru, pertahankan gambar lama
                $validatedData['ktp_image'] = $participant->ktp_image;
            }

            // Update data peserta di database
            $participant->update($validatedData);

            DB::commit();
            return redirect()->back()->with('success', 'Data Participant Berhasil Diupdate');
        } catch (\Throwable $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
            // Path ke file gambar yang ingin dihapus
            $imagePath = public_path($participant->ktp_image);

            // Cek jika file ada, kemudian hapus file tersebut
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            // Hapus data participant dari database
            $participant->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Participant Berhasil Dihapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
