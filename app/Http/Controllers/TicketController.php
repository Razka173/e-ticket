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

    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);

        $data = array(
            'title' => 'Edit User',
            'ticket' => $ticket,
            'active' => 'ticket',
        );
        return view('admin.ticket.edit', $data);
    }

    // admin.user.update
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|email',
        ]);

        $ticket->name = $request->name;
        $ticket->email = $request->email;

        $saved = $ticket->save();


        if ($saved) {
            return redirect()
                ->route('admin.ticket.index')
                ->with([
                    'success' => 'Tiket pengunjung berhasil di update'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Tiket gagal di update, coba lagi nanti'
                ]);
        }
    }
}
