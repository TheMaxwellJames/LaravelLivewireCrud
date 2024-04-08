<div>

    <form wire:submit.prevent="submit">

        @if (session()->has('success'))
            <div style="color: green">{{ session('success') }}</div>
        @endif

        <input type="hidden" wire:model="hiddenId" value="{{$hiddenId}}">
        Name: <br> <input type="text" wire:model="name"> <br>
        @error('name')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <br>
        Email: <br> <input type="email" wire:model="email"> <br>
        @error('email')
            <span style="color: red">{{ $message }}</span>
        @enderror
        <br>

        <button type="submit">Save</button>


    </form>


    <h3>Lists</h3>
    <a href="javascript:void(0)" wire:click="addForm">Add</a>

    <table>

        <tr>
            <th>S/N</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        @php

            $i = 1;

        @endphp

        @foreach ($allData as $ad)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $ad->name }}</td>
                <td>{{ $ad->email }}</td>
                <td>
                    <a href="javascript:void(0)" wire:click="editForm({{$ad->id}})">Edit</a>
                    <a href="javascript:void(0)" wire:click="deleteForm({{$ad->id}})" onclick="return confirm('Sure to delete?')">Delete</a>
                </td>
            </tr>
            @php

                $i++;

            @endphp
        @endforeach

    </table>

    {{$allData->links()}}


</div>
