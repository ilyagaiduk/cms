@include('site.head_player')
@include('site.menu')
<div class="wrapper">
    @include('site.related_search', ['prefix' => $prefix])
    <div class="mob-300">
        <div class="mob-300-ins">
            <img src="{{$api->picture}}">
        </div>
    </div>

    <div class="video-wrapper">

        <h1><i class="fa fa-play-circle"></i> {{$api->title}}</h1>

        <div class="video-tab">

            <div class="video-block">

                <div class="video">

                    <iframe src="{{$api->track}}" frameborder="0" width="560" height="315" scrolling="no" allowfullscreen></iframe>

{{--                    <div class="on-player-pl">--}}
{{--                        <div class="on-player">--}}
{{--                            <div class="on-player-sp">--}}
{{--                                <img src="{{$api->picture}}">--}}
{{--                            </div>--}}
{{--                            <span class="close" title="Close & Play video">X</span>--}}
{{--                            <span class="bot-close" title="Close and Play video">Close and Play</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </div>

                <div class="video-info">

                    <ul>
                        <li><span><i class="fa fa-tv"></i> Tube:</span></li>
                        <li><a href="#"><i class="fa fa-youtube-play"></i> Mp3</a></li>
                    </ul>
                    <div id="likes">
                    <ul class="video-likes">
                        <li><a id="like" class="voites like" href="#" title="LIKE!"><i class="fa fa-thumbs-o-up"></i>{{$voites['like']}}</a></li>
                        <li><a id="dislike" class="voites dislike" href="#" title="DISLIKE!"><i class="fa fa-thumbs-o-down"></i> {{$voites['dislike']}}</a></li>
                            <input type="hidden" id="idUrl" value="{{$id}}">

                    </ul>
                    </div>
                    <div id="results">
                    </div>
                    <script>
                        $(".voites").click( function(e) {
                            let id = e.target.id;
                            let count = $('#' + id).text();
                            let countSecond = '';
                            if(id == 'like') {
                                countSecond = $('#dislike').text();
                            }
                            else if (id == 'dislike') {
                                countSecond = $('#like').text();
                            }
                            let urlId = $('#idUrl').val();
                            let second = $('#second').val();
                                $.ajax({
                                    url: '{{ route("searchSite") }}',
                                    method: 'get',
                                    cache: true,
                                    dataType: 'html',
                                    data: {id: id, count: count, urlId: urlId, countSecond:countSecond},
                                    success:function(data){
                                        $("#likes").remove();
                                        $('#results').html(data);
                                    }
                                });
                        });

                    </script>
                    @if(!empty($tags))
                    <ul>
                        <li><span><i class="fa fa-tags"></i> Categories:</span></li>

                        @foreach($tags as $value)
                            @if($loop->iteration == $countTags + 1)
                                @break
                                @endif
                        <li><a href="/{{$prefix}}/{{mb_strtolower($value)}}"><i class="fa fa-tag"></i> {{$value}}</a></li>
                            @endforeach

                    </ul>
                    @endif
                    <ul>
                        <li><span><i class="fa fa-eye"></i> {{$voites['views']}}</span></li>
                        @php($minutes = floor(($api->duration%60000)/1000))
                        @if($minutes < 10)
                            @php($minutes = "0".$minutes)
                            @endif
                        <li><span><i class="fa fa-clock-o"></i> <?php echo floor($api->duration/60000).':'.$minutes ?></span></li>
                        <li><span><i class="fa fa-upload"></i> {{$date}}</span></li>
                    </ul>

                </div>

            </div>

            <div class="video-brs">
                <div class="brs-300">
                    @if(!empty($relatedTracks))
                        @foreach($relatedTracks as $key => $value)
                            @if($key == 4)
                                @break
                            @endif
                    <div class="b-300">
                        <img src="{{$value['picture']}}">
                    </div>
                        @endforeach
                        @endif

                </div>

            </div>

        </div>

    </div>

    @include('site.related_tracks')
    @include('site.ads_player')
</div>
    @include('site.footer')
