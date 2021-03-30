@extends('welcome')

@section('background')
    style="background-image: url('iGamma/img/bg13.jpg')"
@endsection

@section('cover')
    <h1 class="title"> Blog i-Gamma</h1>
    <h4>Bienvenido</h4>
@endsection

@section('content')
    <div class="main main-raised py-4">
        <div class="container pb-4">
            @livewire('posts')
            <hr>
            @livewire('next-posts')
        </div>
    </div>
@endsection

@section('js')

    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
@stop