@php /** @var \App\Models\Product $product */ @endphp
@extends('lk.layouts.app')

@section('title',  $product->name)

@section('content')
<section id="row-main">
    <div id="courseHead"></div>
    <div class="cont-pcurs">
        <aside>

        @if($project->constructor_settings)
            <div class="textwidget">
                <div class="banner_img-panel">
                    <a href="/constructor" >
                        <img class="img-panel" src="/img/advert.png" alt="">
                    </a>
                </div>
            </div>
        @endif

        <x-LK.left-sidebar :product="$product"/>

        </aside>
        <main id="main" class="site-main" role="main">
            <div class="row-curs">

                <div class="row__content">
                    <div class="row__content__hello">
                        <div class="row__content__hello__inner">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $product->name }}</h1>
                            </header>
                            <div class="entry-content-audio">
                                <div class="kurs-audio">
                                    @if ($type == 'audio' || !$product->content_video)
                                        {!! $product->content !!}
                                    @else
                                        <div class="kurs-dop"><a href="?type=audio" target="_blank">
                                                {{ __('Если у вас не грузятся видео, перейдите на аудио версию по этой ссылке.') }}</a>
                                        </div>
                                        {!! $product->content_video !!}
                                    @endif
                                </div>
                                {{--PRODUCT COMMENTS--}}
                                @if(App::isLocale('ru'))
                                    <livewire:comments :client="$client" :product="$product"/>
                                @endif
                                {{--/PRODUCT COMMENTS--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</section>
@endsection

@section('css')
    @parent
    <link href="{{ asset('css/lk/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/lk/bootstrap.min.css') }}" rel="stylesheet">
    <livewire:styles>
@endsection

@section('js')
    @parent
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <livewire:scripts>
    <script>
        $(document).ready(function () {
            $('audio').audioPlayer();
        });

        $("#nameLetter").click(function() {
            var elem = document.getElementById('contentLetter');
            if (elem.style.display == 'block') {
                elem.style.display = 'none';
            } else {
                elem.style.display = 'block';
            }
        })

        function addComment(parentId, content) {
            window.livewire.emit('addComment', content, parentId)
        }

        window.onload = function() {
            //set new comment value before save
            document.getElementById('newComment').addEventListener('click', function () {
                const $commentValue = document.getElementById('new-comment').value;
                window.livewire.emit('addComment', $commentValue)
            });

            //clear comment area after adding new comment
            window.livewire.on('clearNewCommentArea', function () {
                document.getElementById('new-comment').value = '';
            });

            //clear comment area after adding child comment
            window.livewire.on('clearCurrentCommentArea', function (id) {
                document.getElementById('answer-comment-'+id).value = '';
            });

        }
    </script>
@endsection
