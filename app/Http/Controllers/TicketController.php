<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Package;
use App\Models\Ticket;


use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index()
    {   
        return view('Ticket.ticket');
    }

    public function add_show()
    {
        return view('Ticket.add');
    }

    public function add()
    {
        $data = request()->validate([
            'ticket_code' => ['required','string', 'max:255'],
            'discount' => ['required', 'integer'],
        ]);

        Ticket::create([
            'ticket_code' => $data['ticket_code'],
            'discount' => $data['discount'],
        ]);
        
        return redirect('/ticket?success');
    }

    public function list()
    {
        $ticket = ticket::get();

        foreach ($ticket as $t) {
            $t->count = Package::where('id_ticket',$t->id)->count();
        }

        return Datatables::of($ticket)
            ->make(true);
    }

    public function edit(ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    public function update(ticket $ticket, Request $request)
    {
        $data = request()->validate([
            'ticket_code' => ['string', 'max:255'],
            'discount' => ['required', 'integer'],
        ]);

        $ticket->update(
            array(
                'ticket_code' => $data['ticket_code'],
                'discount' => $data['discount'],
            )
        );

        return redirect('/ticket/?success');
    }

    public function destroy(ticket $ticket)
    {
        $ticket->delete();
        return redirect('/ticket/?success');
    }
}
