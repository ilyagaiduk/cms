<div class="title title-2">

    <div class="icon"><i class="fa fa-play-circle"></i></div>

    <h2><span>Related</span> tracks</h2>

</div>

<div class="thumbs-wrapper">
    @if(!empty($relatedTracks))
        @foreach($relatedTracks as $key => $value)
            @if($loop->iteration > $countRelated + 3)
                @break
                @endif
            @if($key < 4)
                @continue
            @endif
    <div class="thumb">
        <div class="th-in">
            <?php
            preg_match('/tracks\/([^&]*)/', $value['track'], $matches);
            $search = 'tracks/';
            $replace = '';
            $id = str_replace($search, $replace, $matches[0]);
            $url = $configRelatedSearch['prefixForTrackP'].$configRelatedSearch['separatorForSearchSP'].strtolower($value['titleLink']).$configRelatedSearch['separatorForSearchSP'].$id.$configRelatedSearch['postfixForSearchSP'];
            ?>
                <a href="/{{$url}}">
                <div class="thumb-img">
                    <img src="{{$value['picture']}}" alt="">
                    <span class="rating"><i class="fa fa-thumbs-o-up"></i> {{$likes[$id]['likes']}}</span>
                    @php($minutes = floor(($value['duration']%60000)/1000))
                    @if($minutes < 10)
                        @php($minutes = "0".$minutes)
                    @endif
                    <span class="time"><i class="fa fa-clock-o"></i> <?php echo floor($value['duration']/60000).':'.$minutes ?></span>
                    <div class="thumb-cov">
                        <span class="icon" title="Play"><i class="fa fa-caret-right"></i></span>
                    </div>
                </div>
                <span class="name">{{$value['title']}}</span>
            </a>
            <ul class="t-d">
                <li><i class="fa fa-eye"></i> {{$likes[$id]['views']}}</li>
                <li><i class="fa fa-cloud-upload"></i> Today</li>
                <li><a href="#"><i class="fa fa-youtube-play"></i> Mp3</a></li>
            </ul>
            <ul class="tags">
                <li><a href="#"><i class="fa fa-tag"></i> Mp3</a></li>
                <li><a href="#"><i class="fa fa-tag"></i> Mp3</a></li>
                <li><a href="#"><i class="fa fa-tag"></i> Mp3</a></li>
                <li><a href="#"><i class="fa fa-tag"></i> Mp3</a></li>
            </ul>
        </div>
    </div>
    @endforeach
    @endif
</div>

