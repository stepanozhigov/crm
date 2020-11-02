@php /** @var \App\Models\Comment $comment*/ @endphp
@php /** @var \App\Models\Comment $product*/ @endphp
@php //dd($product) @endphp

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
        <main id="main" class="site-main bg-white" role="main">
            <div class="row-curs">
                <div class="row__content">
                    <div class="row__content__hello">
                        <div class="row__content__hello__inner bg-white">
                            <header class="entry-header">
                                <h1 class="entry-title">{{ $product->name }}</h1>
                            </header>
                            <livewire:single-comment :client="$client" :product="$product" :comment="$comment"/>
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
{{--    <script>--}}

{{--        function addComment(parentId, content) {--}}
{{--            window.livewire.emit('addComment', content, parentId)--}}
{{--        }--}}

{{--        window.onload = function() {--}}
{{--            //set new comment value before save--}}
{{--            document.getElementById('newComment').addEventListener('click', function () {--}}
{{--                const $commentValue = document.getElementById('new-comment').value;--}}
{{--                window.livewire.emit('addComment', $commentValue)--}}
{{--            });--}}

{{--            //clear comment area after adding new comment--}}
{{--            window.livewire.on('clearNewCommentArea', function () {--}}
{{--                document.getElementById('new-comment').value = '';--}}
{{--            });--}}

{{--            //clear comment area after adding child comment--}}
{{--            window.livewire.on('clearCurrentCommentArea', function (id) {--}}
{{--                document.getElementById('answer-comment-'+id).value = '';--}}
{{--            });--}}

{{--        }--}}
{{--    </script>--}}
@endsection
