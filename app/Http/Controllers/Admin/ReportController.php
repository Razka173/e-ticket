<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('is_valid', 0)->paginate(50);
        $checkedTickets = Ticket::where('is_valid', 1)->paginate(50);

        $data = array(
            'title' => 'Laporan Tiket Pengunjung',
            'active' => 'report',
            'firstTableName' => 'Tabel Tiket Pengunjung Belum Check-in',
            'secondTableName' => 'Tabel Tiket Pengunjung Sudah Check-in',
            'tickets' => $tickets,
            'checkedTickets' => $checkedTickets,
        );
        return view('admin.report.index', $data);
    }
}
