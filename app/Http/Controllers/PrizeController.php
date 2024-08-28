<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Undian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrizeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $prizes = Prize::where('name', 'like', '%' . $search . "%")
                ->orderBy('name', 'asc')
                ->paginate(4)
                ->appends(['search' => $search]); // Tambahkan ini untuk mempertahankan search query
        } else {
            $prizes = Prize::orderBy('name', 'asc')
                ->paginate(4);
        }

        return view('pages.prize.index', compact('prizes'));
    }
    public function create()
    {
        return view("pages.prize.create");
    }

    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255|unique:prizes',
            ]);
            Prize::create([
                'name' => ucfirst($validatedData['name']),
            ]);
            DB::commit();
            return redirect()->back()->with('success', 'Data Hadia Berhasil DI tambahkan');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy(Prize $prize)
    {
        DB::beginTransaction();
        try {
            // Ambil data undian berdasarkan prize_id
            $undian = Undian::where('prize_id', $prize->id)->get();

            // Periksa apakah koleksi undian kosong atau tidak
            if ($undian->isEmpty()) {
                // Jika kosong, hapus data hadiah
                $prize->delete();

                // Commit transaksi jika operasi berhasil
                DB::commit();
                return redirect()->back()->with('success', 'Data Hadiah Berhasil Dihapus');
            } else {
                // Jika tidak kosong, rollback transaksi dan tampilkan pesan error
                DB::rollback();
                return redirect()->back()->withInput()->withErrors(['error' => "Data Masih Digunakan"]);
            }
        } catch (\Throwable $e) {
            // Rollback transaksi jika terjadi exception
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
