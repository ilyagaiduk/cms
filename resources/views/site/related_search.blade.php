<div class="searches-list">
    <ul>
        <li><span><i class="fa fa-search"></i> Related Searches:</span></li>
        @foreach($related as $value)
        <li><a href="/{{$configRelatedSearch['prefixSearch']}}/{{mb_strtolower($value)}}"><i class="fa fa-sign-in"></i> {{$value}}</a></li>
        @endforeach

    </ul>

</div>
