
@include ('layouts.base')

    <title>PostMaker</title>
        <!-- Header -->
        <nav class="fixed-header ">
            @include('layouts.header')
        </nav>

        <!-- Main Page -->
        <div class="container">
            <div class="narrow-container">

                <!-- Sort Form -->
                @include('layouts.sort-by-form')

                @foreach ($mainComments as $mainComment)
                    @include('comment', ['comment' => $mainComment])
                @endforeach

                <!-- Pagination   -->
                {{ $mainComments->links()}}

                <!-- Main Form -->
                <div class="main-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header text-center"><h3>Share a Post</h3></div>
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('comments.store') }}">
                                            @csrf
                                            @include('comment-form')
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

