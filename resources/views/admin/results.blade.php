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
                    <h5>Настройка выдачи</h5>

                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('getConfigJson') }}">
                        <div id="console-event"></div>
                        @csrf
                        <table id="table" class="table-responsive table">
                            <tr>
                                <td>
                                    <span>Использовать www</span>

                                </td>
                                <td>
                                    <input id="wwwR" name="wwwR" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->forwwwR == '1') checked @endif>
                                    <input id="forwwwR" name="forwwwR" type="hidden" @if($data->forwwwR == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Первый результат - track</span>

                                </td>
                                <td>
                                    <input id="firstRtrack" name="firstRtrack" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->forfirstRtrack == '1') checked @endif>
                                    <input id="forfirstRtrack" name="forfirstRtrack" type="hidden" @if($data->forfirstRtrack == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Изменить ID трека на символьные</span>

                                </td>
                                <td>
                                    <input id="idTrackS" name="idTrackS" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->foridTrackS == '1') checked @endif>
                                    <input id="foridTrackS" name="foridTrackS" type="hidden" @if($data->foridTrackS == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование канонического домена</span>

                                </td>
                                <td>
                                    <input id="canDomain" name="canDomain" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->forcanDomain == '1') checked @endif>
                                    <input id="forcanDomain" name="forcanDomain" type="hidden" value="1" @if($data->forcanDomain == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Рандом поиска, если ничего не найдено</span>

                                </td>
                                <td>
                                    <input id="randSearch0R" name="randSearch0R" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->forrandSearch0R == '1') checked @endif>
                                    <input id="forrandSearch0R" name="forrandSearch0R" type="hidden" @if($data->forrandSearch0R == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Микс ключ сайт (по умолчанию домен без WWW)</span>

                                </td>
                                <td>
                                    <input type="text" id="mixKeySite" name="mixKeySite" value="{{$data->mixKeySite}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Микс поисковых результатов</span>

                                </td>
                                <td>
                                    <input id="mixSearchR" name="mixSearchR" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->formixSearchR == '1') checked @endif>
                                    <input id="formixSearchR" name="formixSearchR" type="hidden" @if($data->formixSearchR == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Микс похожих</span>

                                </td>
                                <td>
                                    <input id="mixRelated" name="mixRelated" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->formixRelated == '1') checked @endif>
                                    <input id="formixRelated" name="formixRelated" type="hidden" @if($data->formixRelated == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Микс новинок на главной</span>

                                </td>
                                <td>
                                    <input id="mixNewMain" name="mixNewMain" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->formixNewMain == '1') checked @endif>
                                    <input id="formixNewMain" name="formixNewMain" type="hidden" @if($data->formixNewMain == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество новинок на главной</span>

                                </td>
                                <td>
                                    <input type="text" id="newResultsMain" name="newResultsMain" value="{{$data->newResultsMain}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество результатов поиска</span>

                                </td>
                                <td>
                                    <input type="text" name="countSearchResults" id="countSearchResults" value="{{$data->countSearchResults}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество похожих треков</span>

                                </td>
                                <td>
                                    <input type="text" name="countRTracks" id="countRTracks" value="{{$data->countRTracks}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество тегов под треком</span>

                                </td>
                                <td>
                                    <input type="text" name="countTTracks" id="countTTracks" value="{{$data->countTTracks}}">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <span>Количество последних поисков</span>

                                </td>
                                <td>
                                    <input type="text" name="countLSearch" id="countLSearch" value="{{$data->countLSearch}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Разделитель урл</span>

                                </td>
                                <td>
                                    <select class="form-control" name="separatorUrlS" id="separatorUrlS">
                                        <option @if($data->separatorUrlS == '-') selected="selected" @endif>-</option>
                                        <option @if($data->separatorUrlS == '_') selected="selected" @endif>_</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Постфикс страниц</span>

                                </td>
                                <td>
                                    <select class="form-control" name="postfixUrlS" id="postfixUrlS">
                                        <option @if($data->postfixUrlS == 'Да') selected="selected" @endif>Да</option>
                                        <option @if($data->postfixUrlS == 'Нет') selected="selected" @endif>Нет</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Постфикс префикса</span>

                                </td>
                                <td>
                                    <input id="postfixPrefixS" name="postfixPrefixS" type="checkbox" data-toggle="toggle" data-on="/" data-off="Разделитель url" @if($data->forpostfixPrefixS == '1') checked @endif>
                                    <input id="forpostfixPrefixS" name="forpostfixPrefixS" type="hidden" @if($data->forpostfixPrefixS == '1') value="1" @endif>
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
