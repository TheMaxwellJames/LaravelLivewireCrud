<div>
    @if (session()->has('success'))

    <span style="color: green">
        {{session('success')}}
    </span>


    @endif
    <h3>Upload File</h3>
    <form id="uploads" enctype="multipart/form-data" wire:submit.prevent="FileUpload">

        Name: <br>
        <input type="text" wire:model="name"> <br>

        @error('name')
        <span style="color: red">{{ $message }}</span>
    @enderror

        File Uploads: <br>
        <input type="file" wire:model="file"> <br>

        @error('file')
        <span style="color: red">{{ $message }}</span>
    @enderror
        <button type="submit">Save</button>


    </form>
</div>
