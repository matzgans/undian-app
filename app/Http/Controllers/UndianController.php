<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Prize;
use App\Models\Undian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UndianController extends Controller
{
    public function index()
    {
        $prizes = Prize::all("id", "name");

        return view('pages.undian.index', compact('prizes'));
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            // Select random winner
            $total_winner = $request->get("total_winner");
            $prize = $request->get("prize");
            $winners = Participant::inRandomOrder()
                ->limit($total_winner)
                ->get(["ticket_number", "id"]);

            // Insert ke table Undian
            $insertData = [];
            foreach ($winners as $winner) {
                $insertData[] = [
                    'participant_id' => $winner->id,
                    'prize_id' => $prize,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            Undian::insert($insertData);

            // Mengambil semua peserta berdasarkan ticket_number dari pemenang yang dipilih
            $participants = Participant::whereIn("ticket_number", $winners->pluck('ticket_number'))->get();


            DB::commit();
            return redirect()->route('undian.index')->with('success', 'Berhasil mendapatkan pemenang')->with('participants', $participants);
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
