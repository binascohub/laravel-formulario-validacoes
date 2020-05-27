<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = \App\Client::all();

        return view(
            'admin.clients.index',
            compact('clients')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientType = Client::getClientType($request->get('client_type'));

        return view(
            'admin.clients.create',
            [
                'client' => new Client(),
                'clientType' => $clientType
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {

        // validações
        $data = $request->only($request->rules());

        // modelo de mass assignment
        $data['defaulter'] = $request->has('defaulter');
        $data['client_type'] = Client::getClientType($request->get('client_type'));

        Client::create($data);

        // flash message
        \Session::flash('message','Cliente cadastrado com sucesso.');

        return redirect()->route('clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        // removido devido parametro ter mesmo nome da ação
        #$client = Client::findOrFail($client);

        $clientType = $client->client_type;

        return View(
            'admin.clients.edit',
            compact('client', 'clientType')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        $data = $request->only($request->rules());

        $data['defaulter'] = $request->has('defaulter');

        $client->fill($data);
        $client->save();

        // flash message
        \Session::flash('message','Cliente alterado com sucesso.');

        return redirect()->route('clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }

}
