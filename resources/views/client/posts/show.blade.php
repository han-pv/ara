@extends('client.layouts.app')

@section('content')

    <a href="{{ route('posts.index') }}" class="h2">
        <i class="bi bi-arrow-left"></i>
    </a>
    @include('client.partials.post-card')
    <div>
        <form action="{{ route('comments.store', $post->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-10">
                    <input type="text" name="text" class="form-control">
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">Sumbit</button>
                </div>
            </div>
        </form>
    </div>
    @foreach ($comments as $comment)
        <div class="border border-1 rounded-3 shadow-sm my-3 p-3 w-100">
            <div>
                <div class="d-flex h6 fw-bold">
                    {{ $comment->user->name . ' ' . $comment->user->surname }}
                </div>
                <i class="bi-chat-dots"></i>
                {{ $comment->comment }}
                <br>
                <button class="btn btn-outline-light text-secondary btn-sm my-1">{{ __('app.reply') }}</button>
                @if (count($comment->children) > 0)
                    <button onclick="showSubcomment(this);" class=" btn btn-outline-light text-secondary btn-sm my-1">Show</button>
                    <div id="subcomment" class="d-none">
                        @foreach ($comment->children as $child)
                            <div class="border-top mx-3 ps-5 py-3">
                                <div class="h6 fw-bold my-2"><span></span> {{ $child->user->getFullName() }} ->
                                    {{  $comment->user->getFullName() }}
                                </div>
                                <i class="bi-chat-dots"></i> {{ $child->comment }}

                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endforeach
    <script>
        function showSubcomment(btn) {
            let subcomment = btn.nextElementSibling;
            subcomment.classList.toggle('d-none');

            let btnText = btn.textContent;
            if (btnText == "Show") {
                btn.textContent = "Hide"
            } else {
                btn.textContent = "Show"
            }
        }
        function addSubcomment() {
            //
        }

    </script>
@endsection