@include('admin.head')
@include('admin.navbar')
@include('admin.sidebar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Конфиг</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <!-- Здесь хлебные крошки -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                            <h5>Параметры конфигурации</h5>
                            <div id="header"></div>

                    <form id="form" class="form-control mt-5" method="post" action="{{ route('JsonConfig') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="domain" class="form-label">Название домена</label>
                            <input type="text" class="form-control" id="domain" name="domain" value="{{$data->domain}}">
                        </div>
                        <div class="mb-3">
                            <label for="countTracks" class="form-label">Количество треков на странице поиска</label>
                            <input type="number" class="form-control" id="countTracks" name="countTracks" value="{{$data->countTracks}}">
                        </div>
                        <div class="mb-3">
                            <label for="titleSearch" class="form-label">Заголовок поиска</label>
                            <input type="text" class="form-control" id="titleSearch" name="titleSearch" value="{{$data->titleSearch}}">
                        </div>
                        <div class="mb-3">
                            <label for="titleMain" class="form-label">Заголовок на главной</label>
                            <input type="text" class="form-control" id="titleMain" name="titleMain" value="{{$data->titleMain}}">
                        </div>
                        <div class="mb-3">
                            <label for="titleTrack" class="form-label">Заголовок на странице трека</label>
                            <input type="text" class="form-control" id="titleTrack" name="titleTrack" value="{{$data->titleTrack}}">
                        </div>
                        <div class="mb-3">
                            <label for="relatedTracks" class="form-label">Количество похожих на странице трека</label>
                            <input type="number" class="form-control" id="relatedTracks" name="relatedTracks" value="{{$data->relatedTracks}}">
                        </div>
                        <div class="mb-3">
                            <label for="titleLastSearch" class="form-label">Заголовок последних поисков</label>
                            <input type="text" class="form-control" id="titleLastSearch" name="titleLastSearch" value="{{$data->titleLastSearch}}">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" id="submit" type="button">Изменить</button>
                        </div>
                    </form>

                            <div id="results"></div>


</div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.ajax-json')
@include('admin.footer')





