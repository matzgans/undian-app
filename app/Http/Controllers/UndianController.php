<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Prize;
use App\Models\Undian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\get;

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
            $already_won = Undian::all("participant_id");
            $winners = Participant::inRandomOrder()
                ->limit($total_winner)
                ->whereNotIn("id", $already_won)
                ->get(["ticket_number", "id"]);


            if (count($winners) < 1) {
                return redirect()->back()->withInput()->withErrors(['error' => "tidak ada pemenang karena semua sudah menang"]);
            }

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
            $prize_name = Prize::where("id", "=", $prize)->get("name");


            DB::commit();
            return redirect()->route('undian.index')
                ->with('success', 'Berhasil mendapatkan pemenang')
                ->with('participants', $participants)
                ->with('prize_name', $prize_name);
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Request $request)
    {
        $search = $request->input('search');
        $query = Undian::join('participants', 'undians.participant_id', '=', 'participants.id')
            ->join('prizes', 'undians.prize_id', '=', 'prizes.id')
            ->select(
                'undians.participant_id',
                'participants.ktp_id',
                'participants.name',
                'participants.address',
                'participants.ktp_image',
                'participants.ticket_number',
                'participants.phone',
                'prizes.name as prize_name',
                "undians.id"
            );

        if ($search) {
            $query->where('participants.name', 'like', '%' . $search . '%')
                ->orderBy('participants.name', 'asc'); // Order by participant name
        } else {
            $query->orderBy('participants.name', 'asc'); // Order by participant name
        }
        $winners = $query->paginate(4)->appends(['search' => $search]);


        return view('pages.undian.winner', compact('winners'));
    }

    public function destroy($undian)
    {


        DB::beginTransaction();

        try {
            Undian::where("id", "=", $undian)->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Data Pemenang Undian Berhasil Dihapus');
        } catch (\Throwable $e) {
            DB::rollback();
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
