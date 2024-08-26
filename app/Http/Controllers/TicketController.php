<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function index()
    {
        if (!session()->has('ticket_number')) {
            // Jika tidak ada, redirect ke halaman lain, misalnya halaman beranda
            return redirect()->route('layouts.index')->with('error', 'Akses ditolak: Anda harus mengisi Form untuk mengakses halaman ini.');
        }



        $ticket_number = session('ticket_number');
        return view('pages.landing.tickets', compact('ticket_number'));
    }


    public function show(Request $request)
    {
        $ticket =  $request->input("check_tickets");
        if ($ticket) {
            DB::beginTransaction();
            try {
                $validateData = $request->validate([
                    'check_tickets' => 'required|digits:16',
                ]);
                $participant = Participant::where('ktp_id', $validateData['check_tickets'])->first();
                DB::commit();
            } catch (\Throwable $e) {
                DB::rollBack();
                return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
            }
        } else {
            $participant = null;
        }
        return view("pages.landing.showTickets", compact('participant'));
    }
}
