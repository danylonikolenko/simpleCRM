<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Clients extends Component
{
    public $clients, $name, $contacts, $client_id, $clientCompany;
    public $isOpen = 0;
    public $limit = 50;


    public function render()
    {

        if($this->limit != 0){
            $this->clients = DB::table('clients')
                ->select('clients.id','clients.name','clients.contacts','companies.title')
                ->join('companies','clients.company','=','companies.id')
                ->orderBy('company','ASC')
                ->limit($this->limit)
                ->get();
        }else{
            $this->clients = DB::table('clients')
                ->select('clients.id','clients.name','clients.contacts','companies.title')
                ->join('companies','clients.company','=','companies.id')
                ->orderBy('company','ASC')
                ->get();
        }


        return view('livewire.clients');
    }


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }


    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
    }


    private function resetInputFields()
    {
        $this->name = '';
        $this->contacts = '';
        $this->clientCompany = '';
        $this->client_id = '';
    }


    public function store()
    {
        $this->validate([
            'name' => 'required',
            'contacts' => 'required',
        ]);

        if(!is_numeric($this->clientCompany)){
            $result = DB::table('companies')->where('title', $this->clientCompany)->first();
            $this->clientCompany = $result->id;
        }

        Client::updateOrCreate(['id' => $this->client_id], [
            'name' => $this->name,
            'contacts' => $this->contacts,
            'company' => $this->clientCompany
        ]);

        session()->flash('message',
            $this->client_id ? 'Client Updated Successfully.' : 'Client Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        $this->client_id = $id;
        $this->name = $client->name;
        $this->contacts = $client->contacts;
        $this->clientCompany = $client->company;

        $this->openModal();
    }


    public function delete($id)
    {
        Client::find($id)->delete();
        session()->flash('message', 'Client Deleted Successfully.');
    }
}
