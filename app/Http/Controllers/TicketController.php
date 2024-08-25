<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        if (!session()->has('ticket_number')) {
            // Jika tidak ada, redirect ke halaman lain, misalnya halaman beranda
            return redirect()->route('layouts.index')->with('error', 'Akses ditolak: Anda harus mengisi Form untuk mengakses halaman ini.');
        }



        $ticket_number = session('ticket_number');
        return view('tickets', compact('ticket_number'));
    }
}
