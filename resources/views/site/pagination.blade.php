<div class="navigation">
    <ul>
        @if(url()->current() == route('searchSite'))
            @php($prefixQuery = "?s=" . $api->getOptions()['query'])
            @php($prefixPage = "&" . $api->getPageName() . "=")
        @else
            @php($prefixQuery = $configRelatedSearch['prefixSearch'].'/'.$api->getOptions()['query'])
            @php($prefixPage = "?" . $api->getPageName() . "=")
        @endif
            @php($curPage = $api->currentPage())
            @if($curPage == 1)
                @php($startPage = $curPage)
            @elseif($curPage == 2)
                @php($startPage = $curPage - 1)
            @elseif($curPage == 3)
                @php($startPage = $curPage - 2)
            @else()
                @php($startPage = $curPage - 3)
            @endif
        @if($api->total() <= 10)
            @if($api->total() >= 8)
                @for($i = $startPage; $i < $api->currentPage(); $i++)
                    @if($api->currentPage() == $i)
                        <li class="active">{{$i}}<a href="#">{{$i}}</a></li>@else
                        <li class="n-p"><a
                                href="@if($i == 1){{'/'.$prefixQuery}}@else{{'/'.$prefixQuery.$prefixPage.$i}}@endif">{{$i}}</a>
                        </li>@endif
                @endfor
                @php($a = 0)
                @for($i = $api->currentPage(); $i <= $api->total(); $i++)
                    @if($a == 0)
                            <li><span>...</span></li>
                        @endif
                    @php($a++)
                    @if($api->currentPage() == $i)
                        <li class="active">{{$i}}<a href="#">{{$i}}</a></li>@else
                        <li class="n-p"><a
                                href="@if($i == 1){{'/'.$prefixQuery}}@else{{'/'.$prefixQuery.$prefixPage.$i}}@endif">{{$i}}</a>
                        </li>@endif
                @endfor

            @elseif($api->total() < 8)
                @for($i = 1; $i<=$api->total(); $i++)
                    @if($api->currentPage() == $i)
                        <li class="active">{{$i}}<a href="#">{{$i}}</a></li>@else
                        <li class="n-p"><a
                                href="@if($i == 1){{'/'.$prefixQuery}}@else{{'/'.$prefixQuery.$prefixPage.$i}}@endif">{{$i}}</a>
                        </li>@endif
                @endfor
            @endif

        @else
            @if($api->currentPage() != 1)
                <li class="n-p"><i class="fa fa-angle-left"></i> <a
                        href="@if($api->currentPage() - 1 != 1){{'/'.$prefixQuery.$prefixPage.($api->currentPage() - 1)}}@else {{'/'.$prefixQuery}}@endif">Prev</a>
                </li>
            @endif
            @php($a = 0)
            @for($i = $startPage; $i < $api->currentPage(); $i++)
                @php($a++)
                @if($api->currentPage() > 10 && $a == 1)
                    <li><span>...</span></li>
                @endif
                @if($api->currentPage() == $i)
                    <li class="active">{{$i}}<a href="#">{{$i}}</a></li>@else
                    <li class="n-p"><a
                            href="@if($i == 1){{'/'.$prefixQuery}}@else{{'/'.$prefixQuery.$prefixPage.$i}}@endif">{{$i}}</a>
                    </li>@endif
            @endfor
            @for($i = $api->currentPage(); $i<=$api->currentPage() + 3; $i++)
                @if($api->currentPage() == $i)
                    <li class="active">{{$i}}<a href="#">{{$i}}</a></li>@else
                    <li class="n-p"><a
                            href="@if($i == 1){{'/'.$prefixQuery}}@else{{'/'.$prefixQuery.$prefixPage.$i}}@endif">{{$i}}</a>
                    </li>@endif
            @endfor
            <li><span>...</span></li>
            <li>
                <a href="{{'/'.$prefixQuery.$prefixPage.($api->total() -1)}}">{{$api->total() - 1}} </a>
            </li>
            <li><a href="{{'/'.$prefixQuery.$prefixPage.$api->total()}}">{{$api->total()}} </a>
            </li>
            @if($api->currentPage() != $api->total())
                <li class="n-p"><i class="fa fa-angle-right"></i><a
                        href="{{'/'.$prefixQuery.$prefixPage.($api->currentPage() + 1)}}">Next</a>
                </li>
            @endif
        @endif
    </ul>
</div>
