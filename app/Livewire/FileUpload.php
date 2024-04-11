<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\FilesUpload;
use Livewire\WithFileUploads;

class FileUpload extends Component
{

    public $name;
    public $file;
    use WithFileUploads;



    public function render()
    {
        return view('livewire.file-upload');
    }

    public function FileUpload()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'file' => 'required'
        ]);

        $filename = $this->file->store('file', 'public');
        $validatedData['file'] = $filename;
        FilesUpload::create($validatedData);
        session()->flash('success', 'File Uploaded');


    }
}
