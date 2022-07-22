<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class GuestController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Pembelian Tiket Konser',
        );
        return view('guest.registration', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:155',
            'email' => 'required|email',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        $ticket = new Ticket();
        $ticket->name = $name;
        $ticket->email = $email;
        $ticket->hash = md5(rand(0, 100));
        $saving = $ticket->save();

        if ($saving) {
            return redirect()
                ->route('guest.registered')
                ->withSuccess('Pembelian tiket berhasil');
        } else {
            return redirect()
                ->back()
                ->withError('Pembelian tiket gagal, coba lagi nanti');
        }
    }

    public function registered()
    {
        $data = array(
            'title' => 'Pembelian Tiket Berhasil',
        );
        return view('guest.blank', $data);
    }
}
