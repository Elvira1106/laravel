<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
class ContactController extends Controller
{
    public function submit(ContactRequest $req){
        $contact = new Contact();
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();
        return redirect()->route('home')->with('success', 'Сообщение было добавлено');
    }
    public function updateMessageSubmit($id,ContactRequest $req){
        $contact = Contact::find($id);
        $contact->name = $req->input('name');
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->message = $req->input('message');

        $contact->save();
        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение было обновлено');
    }

    public function allData(){
        $contact = new Contact;
      // $contact = Contact::all();
      //  dd($contact); //все записи в контактах
     // return view('messages', ['data' => $contact->inRandomOrder()->get()]); //выводим записи в случайном порядке
    //  return view('messages', ['data' => $contact->orderBy('id', 'asc')->take(3)->get()]); //выводим записи по возрастанию id первые три записи
    //   return view('messages', ['data' => $contact->where('subject','=', 'tbhtbhtrbht')->get()]); //выводим записи где Нello
      return view('messages', ['data' => $contact->all()]); //выводим все записи 
    }
    public function showOneMessage($id){
        $contact = new Contact;
        return view('one-message', ['data' => $contact->find($id)]); 
    }

    public function updateMessage($id){
        $contact = new Contact;
        return view('update-message', ['data' => $contact->find($id)]); 
    }

    public function deleteMessage($id){
       Contact::find($id)->delete();
       return redirect()->route('contact-data')->with('success', 'Сообщение было удалено');
    }
}
