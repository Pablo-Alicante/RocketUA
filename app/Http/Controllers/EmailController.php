<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {
        $emails = Email::all();

        return view('emails.index', ['emails' => $emails]);
    }

    public function create()
    {
        return view('emails.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'from' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $emails = new Email;
        $emails->to = $request->to;
        $emails->from = $request->from;
        $emails->subject = $request->subject;
        $emails->body = $request->body;
        $emails->save();

        return redirect()->route('emails.index');
    }

    public function show($id)
    {
        $emails = Email::find($id);

        return view('emails.show', ['emails' => $emails]);
    }

    public function edit($id)
    {
        $emails = Email::find($id);

        return view('emails.edit', ['emails' => $emails]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'to' => 'required|email',
            'from' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $emails = Email::find($id);
        $emails->to = $request->to;
        $emails->from = $request->from;
        $emails->subject = $request->subject;
        $emails->body = $request->body;
        $emails->save();

        return redirect()->route('emails.index');
    }

    public function destroy($id)
    {
        $emails = Email::find($id);
        $emails->delete();

        return redirect()->route('emails.index')->with('success', 'Email borrado ');
    }
}
