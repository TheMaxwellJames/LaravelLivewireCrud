<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Register;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Forms extends Component
{

    use WithPagination;
    public $name;
    public $email;
    public $hiddenId;



   // public $allData = [];
    protected $rules = [
        'name' => 'required|min:3|max:15',
        'email' => 'required|email'
    ];
    public function submit()
    {
        $validateData = $this->validate();
        $updateId = $this->hiddenId;
        if($updateId>0)
        {
            $updateArray = array(
                'name' => $validateData['name'],
                'email' => $validateData['email']
            );
            DB::table('registers')->where('id', $updateId)->update($updateArray);

        }else {
            Register::create($validateData);
        }

        session()->flash('success', "Form Is Submitted");

    }

    public function editForm($id)
    {
        $singleData = Register::find($id);
        $this->name = $singleData->name;
        $this->email = $singleData->email;
        $this->hiddenId = $singleData->id;
    }


    public function addForm()
    {
        $this->name = '';
        $this->email = '';
        $this->hiddenId = '';
    }


    public function deleteForm($id)
    {
        DB::table('registers')->where('id', $id)->delete();
        session()->flash('success', "Records Deleted");
    }

    public function render()
    {
        $allData = Register::paginate(4);
        return view('livewire.forms', ['allData'=>$allData]);
    }



}
