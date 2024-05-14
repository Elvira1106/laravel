<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class ContactController1 extends Controller
{
    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idc =  Contact::paginate();
        return view('messages', ['data' =>  $idc]); //выводим все записи 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $req)
    {
        Contact::create($req->validated());
        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('one-message', ['data' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $contact =  Contact::findOrFail($id);
        return view('update-message', ['data' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $req, string $id)
    {
        Contact::findOrFail($id)->update($req->validated());
        return redirect()->route('contact.show', $id)->with('success', 'Сообщение было обновлено');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('contact.create')->with('success', 'Сообщение было удалено');
    }
}
