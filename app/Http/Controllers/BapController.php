<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\BapModel;

class BapController extends Controller
{

    public function __construct()
    {
        // Le middleware de l'admin est actif sur toutes les actions
        $this->middleware('admin', ['except'=>['create', 'edit']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baps = Bapmodel::all();
        return view('admin.index')->with(compact('baps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bap.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bap = new Bapmodel;
        $bap->name          = $request->name;
        $bap->username      = $request->username;
        $bap->type          = $request->type;
        $bap->typeother      = $request->typeother;
        $bap->descriptif      = $request->descriptif;
        $bap->context      = $request->context;
        $bap->objectif      = $request->objectif;
        $bap->contrainte      = $request->contrainte;
        $bap->description   = $request->description;
        $bap->save();
        return redirect()
            ->route('bap.show', $bap->id)
            ->with(compact('bao'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bap = Bapmodel::find($id);
        return view('bap.show')->with(compact('bap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bap   = BapModel::find($id);
        $users  = User::all()->lists('name', 'id')  ;
        return view('bap.edit')->with(compact('bap', 'users'));
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
        $bap = BapModel::find($id);
        $bap->name   = $request->name;
        $bap->username   = $request->username;
        $bap->validate = $request->validate;
        $bap->descriptif = $request->descriptif;
        $bap->context = $request->context;
//        $bap->user_id = $request->user_id;
        $bap->save();
        return redirect()->route('bap.show', $bap->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
