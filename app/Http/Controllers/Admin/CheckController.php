<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        $ticket = Ticket::filter(request(['slug']))->get();

        $data = array(
            'title' => 'Halaman Check-in Pengunjung',
            'active' => 'check-in',
            'ticket' => $ticket,
        );
        return view('admin.check', $data);
    }

    public function checkIn(Request $request)
    {
        $this->validate($request, [
            'slug' => 'required',
        ]);

        $slug = $request->input('slug');
        $ticket = Ticket::where('hash', '=', $slug)
            ->first();

        if ($ticket && $ticket->is_valid == 1) {
            return redirect()
                ->back()
                ->withError('Check-in gagal, pengunjung sudah pernah check-in');
        }

        if ($ticket) {
            return redirect()
                ->back()
                ->withSuccess('Check-in berhasil');
        } else {
            return redirect()
                ->back()
                ->withError('Check-in gagal, tiket tidak ditemukan');
        }
    }

    public function search(Request $request)
    {
        $slug = $request->input('slug');

        if (!$slug) {
            return response()->json([
                'status' => false,
                'message' => 'Provide an query'
            ], 400);
        }

        $ticket = Ticket::where('hash', $slug)->get();
        if ($ticket->count() > 0) {
            return response()->json([
                'status' => true,
                'ticket' => $ticket,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not found',
            ], 404);
        }
    }
}
