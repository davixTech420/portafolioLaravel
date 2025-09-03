<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate();

        return view('message.index', compact('messages'))
            ->with('i', (request()->input('page', 1) - 1) * $messages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $message = new Message();
        return view('message.create', compact('message'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Message::$rules);

        $message = Message::create($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Message created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::find($id);

        return view('message.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = Message::find($id);

        return view('message.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        request()->validate(Message::$rules);

        $message->update($request->all());

        return redirect()->route('messages.index')
            ->with('success', 'Message updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $message = Message::find($id)->delete();

        return redirect()->route('messages.index')
            ->with('success', 'Message deleted successfully');
    }

    public function send(Request $request)
    {

        if (Message::where('name_sender', $request->name)->exists())
        {
          return redirect()->route('contact')->with('error','Ya Existe Un Mensaje Con el nombre');
        }
        elseif(Message::where('mail_sender', $request->email)->exists()){
        return redirect()->route('contact')->with('error','El Correo Ya Esta Registrado');
        }
        elseif(Message::where('phone',$request->phone)->exists()){
return redirect()->route('contact')->with('error','El Telefono Ya Esta Regitrado');
        }
        else{

        $message = new Message();
        $message->name_sender = $request->input('name');
        $message->mail_sender = $request->input('email');
        $message->phone = $request->input('phone');
        $message->body_sender  = $request->input('message');
        $message->save();
        return redirect()->route('contact')
            ->with('success', 'Message sent successfully');
        }

    }
}
