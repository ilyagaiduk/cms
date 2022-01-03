@include('site.head')
@include('site.menu')
<div class="wrapper">
    @include('site.related_search')
    <div class="title">

        <div class="icon"><i class="fa fa-play-circle"></i></div>

        <h1>Caption <span>Mp3</span> tracks</h1>

        <div class="filters-button" title="Show Filters"><i class="fa fa-sliders"></i> Filters <i
                class="fa fa-angle-down"></i></div>

    </div>

    <div class="filters">
        <ul>
            <li><span><i class="fa fa-exchange"></i></span></li>
            <li><a href="#">Last Added</a></li>
            <li><a href="#">Most Viewed</a></li>
            <li class="active"><a href="#">Top Rated</a></li>
            <li><a href="#">Longest</a></li>
        </ul>
        <ul>
            <li><span><i class="fa fa-cloud-upload"></i></span></li>
            <li class="active"><a href="#">Today</a></li>
            <li><a href="#">This Week</a></li>
            <li><a href="#">This Month</a></li>
            <li><a href="#">This Year</a></li>
        </ul>
        <ul>
            <li><span><i class="fa fa-clock-o"></i></span></li>
            <li><a href="#">0-5 min.</a></li>
            <li class="active"><a href="#">5-20 min.</a></li>
            <li><a href="#">+20 min.</a></li>
        </ul>
    </div>

    <div class="mob-300">
        <div class="mob-300-ins">
            <img src="/site/sample_images/1.jpg">
        </div>
    </div>

    <div class="thumbs-wrapper">
        @if(!empty($api))

            @foreach($api as $value)
                @foreach($value as $keyResults => $valueResults)
                    @if($keyResults == 'total')
                        @continue
                    @else

        <div class="thumb">
            <div class="th-in">
                <?php
                $title = preg_replace('/\W+/', ' ', $valueResults->title);
                $title = strtolower($title);
                $search = ' ';
                $replace = $forTrack['separator'];
                $title = str_replace($search, $replace, $title);
                preg_match('/tracks\/([^&]*)/', $valueResults->track, $matches);
                $search = 'tracks/';
                $replace = '';
                $id = str_replace($search, $replace, $matches[0]);
                $min = floor($valueResults->duration/60000);
                $sec = floor(($valueResults->duration%60000)/1000);
                if($sec < 10) {
                    $sec = '0'.$sec;
                }
                ?>
                <a href="/{{$forTrack['prefix']}}{{$forTrack['separator']}}{{$title}}{{$forTrack['separator']}}{{$id}}{{$forTrack['postfix']}}">
                    <div class="thumb-img">
                        <?php
                        $string = $valueResults->picture;
                        $findme   = 'loading.jpg';
                        $pos = strpos($string, $findme);
                        ?>
                        @if($pos !== false)
							<img src="{{$valueResults->picture}}" alt="">                            
                            @else								
                                <img src="http://soundcloud.flv-files.com/{{$id}}/{{$id}}_{{$tumbSize}}.jpg" alt="">                        
                            @endif
                        <span class="rating"><i class="fa fa-thumbs-o-up"></i> {{$likes[$id]['likes']}}</span>
                        <span class="time"><i class="fa fa-clock-o"></i> {{$min}}:{{$sec}}</span>
                        <div class="thumb-cov">
                            <span class="icon" title="Play"><i class="fa fa-caret-right"></i></span>
                        </div>
                    </div>
                    <span class="name">{{$valueResults->title}}</span>
                </a>
                <ul class="t-d">
                    <li><i class="fa fa-eye"></i> {{$likes[$id]['views']}}</li>
                    <li><i class="fa fa-cloud-upload"></i> Today</li>
                    <li><a href="#"><i class="fa fa-youtube-play"></i> mp3</a></li>
                </ul>
                <ul class="tags">
                    <li><a href="#"><i class="fa fa-tag"></i> mp3</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> mp3</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> mp3</a></li>
                    <li><a href="#"><i class="fa fa-tag"></i> mp3</a></li>
                </ul>
            </div>
        </div>
                        @endif
                @endforeach

            @endforeach
    </div>
    <div class="wrapper">
        @include('site.pagination')
    </div>


    @endif

    @include('site.ads')

</div>
@include('site.footer')

