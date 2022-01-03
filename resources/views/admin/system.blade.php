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
                    <h5>Системные настройки</h5>

                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('getConfigJson') }}">
                        <div id="console-event"></div>
                        @csrf
                        <table id="table" class="table-responsive table">
                            <tr>
                                <td>
                                    <span>Хеш сайта</span>

                                </td>
                                <td>
                                    <input type="text" id="hashSiteS" name="hashSiteS" value="@if(empty($data->hashSiteS)){{$hash}}@else{{$data->hashSiteS}}@endif">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span>Путь до поискового кеша</span>

                                </td>
                                <td>
                                    <input type="text" id="pathSearchCacheS" name="pathSearchCacheS" value="{{$data->pathSearchCacheS}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Путь до кеша похожих</span>

                                </td>
                                <td>
                                    <input type="text" id="pathRelatedCacheS" name="pathRelatedCacheS" value="{{$data->pathRelatedCacheS}}">
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <span>Путь до кеша новинок</span>--}}

{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <input type="text" id="pathNewCacheS" name="pathNewCacheS" value="/">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>

                            <tr>
                                <td>
                                    <span>Ключ последних поисков</span>

                                </td>
                                <td>
                                    <input type="text" id="keyLastSearchS" name="keyLastSearchS" value="{{$data->keyLastSearchS}}">
                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <span>Ключ последних просмотров</span>--}}

{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <input type="text" id="keyLastViesS" name="keyLastViesS" value="s">--}}
{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td>
                                    <span>Ключ языка, на который переводить</span>

                                </td>
                                <td>
                                    <input type="text" id="languageCodeS" name="languageCodeS" value="{{$data->languageCodeS}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Размер тумб на сайте</span>

                                </td>
                                <td>
                                    <select class="form-control" name="sizeTumbSiteS" id="sizeTumbSiteS">
                                        <option @if($data->sizeTumbSiteS == '400x300') selected="selected" @endif>400x300</option>
                                        <option @if($data->sizeTumbSiteS == '400x225') selected="selected" @endif>400x225</option>
                                        <option @if($data->sizeTumbSiteS == '320x240') selected="selected" @endif>320x240</option>
                                        <option @if($data->sizeTumbSiteS == '320x180') selected="selected" @endif>320x180</option>
                                        <option @if($data->sizeTumbSiteS == '300x225') selected="selected" @endif>300x225</option>
                                        <option @if($data->sizeTumbSiteS == '273x153') selected="selected" @endif>273x153</option>
                                    </select>

                                </td>
                            </tr>
{{--                            <tr>--}}
{{--                                <td>--}}
{{--                                    <span>Размер тумб в плеере</span>--}}

{{--                                </td>--}}
{{--                                <td>--}}
{{--                                    <select class="form-control" name="sizeTumbPlayerS" id="sizeTumbPlayerS">--}}
{{--                                        <option selected="selected" >320х180</option>--}}
{{--                                        <option>500х500</option>--}}
{{--                                    </select>--}}

{{--                                </td>--}}
{{--                            </tr>--}}
                            <tr>
                                <td>
                                    <span>Справочники</span>

                                </td>
                                <td>
                                    <input id="quideSystem" name="quideSystem" type="checkbox" data-toggle="toggle" data-on="Индивидуальные" data-off="Системные" @if($data->forquideSystem == '1') checked @endif>
                                    <input id="forquideSystem" name="forquideSystem" type="hidden" value="1" @if($data->forquideSystem == '1') value="1" @endif>
                                </td>
                            </tr>


                            <tr>
                                <td>
                                    <span>Сжимать HTML</span>

                                </td>
                                <td>
                                    <input id="gzipHtmlS" name="gzipHtmlS" type="checkbox" data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forgzipHtmlS == '1') checked @endif>
                                    <input id="forgzipHtmlS" name="forgzipHtmlS" type="hidden" value="1" @if($data->forgzipHtmlS == '1') checked @endif>
                                </td>
                            </tr>

                        </table>
                        <div class="mb-3">
                            <button class="btn btn-primary" id="submit" type="button">Перезаписать</button>
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
<script>
    $(document).ready(function() {
        $(":checkbox").change(function () {
            let id = $(this).attr('id');
            if ($(this).prop('checked') == true) {
                $('#for' + id).val(1)
            } else {
                $('#for' + id).val(0)
            }

        })
    })
</script>
@include('admin.ajax-json')
@include('admin.footer')
