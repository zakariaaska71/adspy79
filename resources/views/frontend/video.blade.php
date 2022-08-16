<div class="forWho text-center">
    <div class="container">
        <h2>{{ $vedeosection->title }}</h2>
        <p>{!! $vedeosection->dec !!}</p>

            <iframe width="920" height="600" src="{{ $vedeosection->video_link }}">
            </iframe>
            
    </div>
</div>