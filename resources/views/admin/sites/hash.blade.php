<table id="sites" class="table table-responsive">
    <thead>
    <th>ID</th>
    <th>Hash</th>
    </thead>
    @foreach($hash as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->site}}</td>
            <td>{{$value->hash}}</td>
        </tr>
    @endforeach
</table>

{{ $hash->links() }}
