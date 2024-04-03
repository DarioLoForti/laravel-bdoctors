<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use App\Models\Doctor;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $doctor = $user->doctor;
        $messages = $doctor->messages;
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor = Doctor::where('id', '=', $_REQUEST['doctor_id'])->first();
        return view('admin.messages.create', compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessageRequest $request)
    {
        $form_data = $request->all();

        $message = new Message();
        $message->fill($form_data);

        $message->save();

        Session::flash('success_message', 'Messaggio inviato correttamente');

        return redirect()->back();

        // return redirect("http://localhost:5174/doctor/" . Doctor::where("id", "=", $message->doctor_id)->first()->slug)->with('success_message');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessageRequest  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $selectedMessages = $request->input('selectedMessages', []);


        Message::whereIn('id', $selectedMessages)->delete();


        return redirect()->route('messages.index')->with('success', 'Messaggi eliminati con successo.');
    }
}
