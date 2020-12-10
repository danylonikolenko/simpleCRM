<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use App\Models\Company;

class Companies extends Component
{
    public $companies, $title, $description, $company_id;
    public $isOpen = 0;
    public $limit = 50;



    public function render()
    {
        if($this->limit != 0)
            $this->companies = Company::all()->sortByDesc('id')->take($this->limit);
        else
            $this->companies = Company::all()->sortByDesc('id');
        return view('livewire.companies');
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


    private function resetInputFields(){
        $this->title = '';
        $this->description = '';
        $this->company_id = '';
    }


    public function store()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Company::updateOrCreate(['id' => $this->company_id], [
            'title' => $this->title,
            'description' => $this->description
        ]);

        session()->flash('message',
            $this->company_id ? 'Company Updated Successfully.' : 'Company Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $Company = Company::findOrFail($id);
        $this->company_id = $id;
        $this->title = $Company->title;
        $this->description = $Company->description;

        $this->openModal();
    }


    public function delete($id)
    {
        Company::find($id)->delete();
        session()->flash('message', 'Company Deleted Successfully.');
    }
}
