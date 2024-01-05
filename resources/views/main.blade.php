@extends ('layouts.base')

@section('main')
    <title>PostMaker</title>
        <!-- Header -->
        @include('layouts.header')

        <!-- Sort Form -->
        @include('layouts.sort-by-form')

        <!-- Main Page -->
        <div id="app" class="container">
            <div class="narrow-container">

                <!-- Main Form -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-header text-center"><h3>New Message</h3></div>
                        <div class="reply-button">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store') }}">
                                @csrf
                                <post-component
                                    @if (Auth::check())
                                        :auth-username="{{ json_encode(Auth::user()->name) }}"
                                    :auth-email="{{ json_encode(Auth::user()->email) }}"
                                    @endif
                                    :avatar="{{ json_encode($avatar) }}"
                                    :button-name="{{ json_encode('Add Post') }}">
                                </post-component>
                            </form>
                        </div>
                    </div>
                </div>


                <!--  Comment Cards Show-->
                @foreach ($mainComments as $mainComment)
                    @include('comment', ['comment' => $mainComment])
                @endforeach

                <!-- Pagination   -->
                {{ $mainComments->links()}}



            </div>
        </div>
@endsection

