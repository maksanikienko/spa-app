<!DOCTYPE html>
<html lang="en">
    @extends('layouts.base')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <title>MainPage</title>
</head>
<body>

    @section('main_page')
 
    @include('sortByForm')

    @foreach ($mainComments as $mainComment)
    @include('comment', ['comment' => $mainComment])        
    @endforeach
    
            <!-- Pagination   -->
       {{ $mainComments->links()}}
            
            <!-- Подключение Основной формы -->
        <div class="main-form">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Добавить основной комментарий</div>
                            <div class="card-body">
                                
                                <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store') }}">
                                    @csrf
                                    @include('commentForm')
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <script src="{{ asset('js/clickReply.js') }}" defer></script>
            <script src="{{ asset('js/reloadCaptcha.js') }}" defer></script>

    @endsection
    
</body>
</html>