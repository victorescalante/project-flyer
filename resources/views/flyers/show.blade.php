@extends('layout')

@section('content')

    <div class="row">

        <div class="col-md-4">

            <h1>{{ $flyer->street }}</h1>

            <h2>{{ $flyer->price }}</h2>

            <hr>

            <div class="description">

                <p class="text-justify">{!! nl2br($flyer->description) !!}</p>

            </div>

        </div>

        <div class="col-md-8 gallery">

            @foreach($flyer->photos->chunk(2) as $set)

                <div class="row">

                    @foreach($set as $photo)

                        <div class="col-md-6 gallery_image">

                            <a href="/{{ $photo->path }}" data-lity>

                                <img src="/{{ $photo->thumbnail_path }}" alt="">

                            </a>

                        </div>

                    @endforeach

                </div>


            @endforeach

            @if($user->owns($flyer))

                    <hr>


                    <form id="addPhotoForm"
                          action="{{ route('upload_post_photo',[$flyer->zip,$flyer->street]) }}"
                          method="POST"
                          class="dropzone">


                        {{ csrf_field() }}


                    </form>
            @endif


        </div>


    </div>


@endsection


@section('scripts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <script>

        Dropzone.options.addPhotoForm = {
            paramName: 'photo',
            maxFilesize: 10,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }

    </script>
    @endsection