
<body>

<div class="header">

    <div class="wrapper">

        <div class="logo">
            <a href="/">New<span>mp3</span>tube</a>
        </div>

        <ul>
            <li class="active"><a href="#"><i class="fa fa-play-circle"></i> <span>Videos</span></a></li>
            <li><a href="#"><i class="fa fa-tags"></i> <span>Categories</span></a></li>
            <li><a href="#"><i class="fa fa-youtube-play"></i> <span>Channels</span></a></li>
            <li class="search-button"><a><i class="fa fa-search"></i> <span>Search <i class="fa fa-angle-down"></i></span></a></li>
        </ul>

        <div class="search">
            <form method="get" action="{{route('searchSite')}}">
                <div class="search-input">
                    <input type="text" name="s" placeholder="Find some videos...">
                </div>
                <button type="submit" title="Find"><i class="fa fa-search"></i></button>
            </form>
        </div>

    </div>

</div>
