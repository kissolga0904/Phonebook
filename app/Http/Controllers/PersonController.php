<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(){
        return view('welcome',[
            'people' => Person::latest()->get()
        ]);
    }

    public function create(){
        return view('create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'phone_number'=> 'required|max:255',
            'address' => 'required|max:255',
            'mailing_address' => 'required|max:255',
        ]);

        $person = Person::create([
            'name'=>$attributes['name'],
            'address' => $attributes['address'],
            'mailing_address' => $attributes['mailing_address'],
        ]);
        $person->emails()->create([
            'email'=>$attributes['email'],
        ]);
        $person->phoneNumbers()->create([
            'phone_number'=>$attributes['phone_number'],
        ]);

        return redirect('/')->with('success', 'New connection added');

    }

    public function edit(Person $person){
        return view('edit',['person'=>$person]);
    }

    public function update(Person $person){
        $attributes = $this->validatePerson($person);

        $person->emails()->first()->update([
            'email' => $attributes['email']
        ]);

        return back()->with('success', 'Post updated!');
    }


    public function destroy(Person $person){
        $person->delete();
        return back()->with('success', 'Person deleted!');
    }


    protected function validatePerson(?Person $person=null):array{
        return request()->validate([
            'email' => 'max:255',
            'name' => 'max:255',
            'phone_number'=> 'max:255',
            'address' => 'max:255',
            'mailing_address' => 'max:255',
        ]);
    }
}
