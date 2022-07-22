<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::paginate(50);

        $data = array(
            'title' => 'Data Tiket Pengunjung',
            'active' => 'ticket',
            'tableName' => 'Tabel Tiket Pengunjung',
            'tickets' => $tickets,
        );
        return view('admin.ticket.index', $data);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        if (!$id) {
            return response()->json([
                'status' => false,
                'message' => 'Provide an id'
            ], 400);
        }

        $delete = Ticket::where('id', $id)->forceDelete();
        if ($delete) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully deleted',
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed',
            ], 404);
        }
    }
}
