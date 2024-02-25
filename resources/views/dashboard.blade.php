
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                @endif
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   <form method="post" action="{{route('dashboard')}}">
                    @csrf
                    <div class="p-6 text-gray-900">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="example@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" name="link">
                            <button class="btn btn-success" name="shorturl">Generate Shorten Link</button>
                        </div>  
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Original URL</th>
                                <th scope="col">Shorter URL</th>
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($shortLinks as $link)
                             <tr>
                                <td>{{$link->id}}</td>
                                <td>{{$link->link}}</td>
                                <td><a href="{{route('shortLink',$link->code)}}">{{$link->code}}</a></td>
                             </tr>
                                 
                             @endforeach
                            </tbody>
                          </table>                        
                          
                    </div>
                   </form>
                    
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>

