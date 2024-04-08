<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Livewire</title>
    @livewireStyles()
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,th {
            border: 1px solid;
            
        }
    </style>
</head>
<body>

{{ $slot }}

    @livewireScripts()
</body>
</html>
