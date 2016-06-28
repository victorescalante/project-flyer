@extends('layout')

@section('content')

    <div class="row">

        <div class="col-md-5">

            <h1>{{ $flyer->street }}</h1>

            <h2>{{ $flyer->price }}</h2>

            <hr>

            <div class="description">

                {!! nl2br($flyer->description) !!}

            </div>

        </div>

        <div class="col-md-7">

        </div>

        <div class="col-md-12">

            <hr>

            <form id="addPhotoForm" action="{{ route('upload_post_photo',[$flyer->zip,$flyer->street]) }}" method="POST" class="dropzone">

                {{ csrf_field() }}

            </form>

        </div>

    </div>


@endsection


@section('scripts.footer')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>

    <script>

        Dropzone.options.addPhotoForm = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png, .bmp'
        }

    </script>
    @endsection