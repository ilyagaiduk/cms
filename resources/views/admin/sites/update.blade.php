@include('admin.head')
@include('admin.menu')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="header">
                <h1 class="text-primary">Редактирование домена {{$data->site}}</h1>
                <hr width="20%">
                <form method="post" action="{{ route("sites.updateForm") }}">
                    @csrf
                    <div class="mb-3">
                    <label for="domain" class="form-label">Редактировать домен</label>
                    <input type="text" id="domain" name="domain" value="{{$data->site}}">
                    </div>
                    <div class="mb-3">
                        <label for="hash" class="form-label">Редактировать хеш</label>
                        <input type="text" id="hash" name="hash" value="{{$data->hash}}">
                    </div>
                    <input type="hidden" name="startDomain" value="{{$data->site}}">
                    <button id="submit" class="btn-sm btn-primary mb-2" type="submit">Обновить</button>
                </form>


            </div>



        </div>
    </div>
</div>
@include('admin.footer')



