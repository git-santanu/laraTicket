<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ticketController extends Controller
{
    // public $roles;
    // public function __construct()
    // {
    //     $this->roles = Role::all();
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tickets = Ticket::with('users')
        // ->when($request->has('status'),
        // function(Builder $query) use ($request)
        // {
        //     return $query->where('status', $request->input('status'));
        // })
        // ->when(auth()->user(), function (Builder $query){
        //     $query->where('user_id',auth()->user()->id);
        // })->get();
        $tickets = Ticket::orderBy('id','desc')->get();
        return view('index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = [
            [
                'label' => 'Open',
                'value' => 'Open'
            ],
            [
                'label' => 'In progress',
                'value' => 'In progress'
            ],
            [
                'label' => 'In Testing',
                'value' => 'In Testing'
            ],
            [
                'label' => 'Close',
                'value' => 'Close'
            ]
        ];
        $roles = [
            [
                'label' => 'Admin',
                'value' => 'Admin'
            ],
            [
                'label' => 'Agent',
                'value' => 'Agent'
            ],
            [
                'label' => 'Developer',
                'value' => 'Developer'
            ],
            [
                'label' => 'Client',
                'value' => 'Client'
            ]
        ];
        $types = [
            [
                'label' => 'Bug',
                'value' => 'Bug'
            ],
            [
                'label' => 'Epic',
                'value' => 'Epic'
            ],
            [
                'label' => 'User stories',
                'value' => 'User stories'
            ],
        ];
        return view('create', compact('statuses','roles','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->types = $request->types;
        $ticket->roles = $request->roles;
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->route('ticket.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ticket = Ticket::findOrFail($id);
        $statuses = [
            [
                'label' => 'Open',
                'value' => 'Open'
            ],
            [
                'label' => 'In progress',
                'value' => 'In progress'
            ],
            [
                'label' => 'In Testing',
                'value' => 'In Testing'
            ],
            [
                'label' => 'Close',
                'value' => 'Close'
            ]
        ];
        return view('edit', compact('statuses','ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);
        $ticket->title = $request->title;
        $ticket->description = $request->description;
        $ticket->status = $request->status;
        $ticket->save();
        return redirect()->route('ticket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('ticket.index');
    }
}
