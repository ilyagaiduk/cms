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
                    <h5>SEO настройки страницы трека</h5>

                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('getConfigJson') }}">
                        <div id="console-event"></div>
                        @csrf

                        <table id="table" class="table-responsive table">
                            <tr>
                                <td>
                                    <span>Тег Title</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleSTrack" name="seoTitleSTrack" class="form-control" rows="3">{{$data->seoTitleSTrack}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Title</span>

                                </td>
                                <td>
                                    <input id="seoTitleSTrackOn" name="seoTitleSTrackOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTitleSTrackOn == '1') checked @endif>
                                    <input id="forseoTitleSTrackOn" name="forseoTitleSTrackOn" type="hidden" value="1" @if($data->forseoTitleSTrackOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersTASEOSTrack" id="registerLettersTASEOSTrack">
                                        <option @if($data->registerLettersTASEOSTrack == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersTASEOSTrack == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Description</span>

                                </td>
                                <td>
                                    <textarea id="seoDescriptionSTrack" name="seoDescriptionSTrack" class="form-control" rows="3">{{$data->seoDescriptionSTrack}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Description</span>

                                </td>
                                <td>
                                    <input id="seoDescriptionSTrackOn" name="seoDescriptionSTrackOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoDescriptionSTrackOn == '1') checked @endif>
                                    <input id="forseoDescriptioSTrackOn" name="forseoDescriptionSTrackOn" type="hidden" value="1" @if($data->forseoDescriptionSTrackOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersDSTrackSEO" id="registerLettersDSTrackSEO">
                                        <option @if($data->registerLettersDSTrackSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option  @if($data->registerLettersDSTrackSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Keywords</span>

                                </td>
                                <td>
                                    <textarea id="seoKeywordsSTrack" name="seoKeywordsSTrack" class="form-control" rows="3">{{$data->seoKeywordsSTrack}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Keywords</span>

                                </td>
                                <td>
                                    <input id="seoKeywordsSTrackOn" name="seoKeywordsSTrackOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoKeywordsSTrackOn == '1') checked @endif>
                                    <input id="forseoKeywordsSTrackOn" name="forseoKeywordsSTrackOn" type="hidden" value="1" @if($data->forseoKeywordsSTrackOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersKSTrackSEO" id="registerLettersKSTrackSEO">
                                        <option @if($data->registerLettersKSTrackSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKSTrackSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок страницы</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleSTrackP" name="seoTitleSTrackP" class="form-control" rows="3">{{$data->seoTitleSTrackP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Описание на новой странице трека</span>

                                </td>
                                <td>
                                    <input id="seoTextSTrackOn" name="seoTextSTrackOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTextSTrackOn == '1') checked @endif>
                                    <input id="forseoTextSTrackOn" name="forseoTextSTrackOn" type="hidden" value="1" @if($data->forseoTextSTrackOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок описания</span>

                                </td>
                                <td>
                                    <textarea id="seoTextHSP" name="seoTextHSTrack" class="form-control" rows="3">{{$data->seoTextHSTrack}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Текст описания</span>

                                </td>
                                <td>
                                    <textarea id="seoFullTextSTrack" name="seoFullTextSTrack" class="form-control" rows="3">{{$data->seoFullTextSTrack}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Префикс поиска</span>

                                </td>
                                <td>
                                    <select class="form-control" name="prefixForTrackP" id="prefixForTrackP">
                                        @foreach($prefixForTrackP as $key => $value)
                                            @if(strpos($value, 'config-prefix') === false)
                                                <option @if($data->prefixForTrackP == $value) selected="selected" @endif>{{$value}}</option>
                                            @else
                                                @continue
                                            @endif
                                        @endforeach

                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Разделитель</span>

                                </td>
                                <td>
                                    <select class="form-control" name="separatorForSearchSP" id="separatorForSearchSP">
                                        @foreach($separatorForSearch as $key => $value)
                                            @if(strpos($value, 'config') === false)
                                                <option @if($data->separatorForSearchSP == $value) selected="selected" @endif>{{$value}}</option>
                                            @else
                                                @continue
                                            @endif
                                        @endforeach

                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Постфикс</span>

                                </td>
                                <td>
                                    <select class="form-control" name="postfixForSearchSP" id="postfixForSearchSP">
                                        @foreach($postfixForSearch as $key => $value)
                                            @if(strpos($value, 'config') === false)
                                                <option @if($data->postfixForSearchSP == $value) selected="selected" @endif>{{$value}}</option>
                                            @else
                                                @continue
                                            @endif
                                        @endforeach

                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество тегов на странице</span>

                                </td>
                                <td>
                                    <input type="number" name="countTagsSTP" id="countTagsSTP" value="{{$data->countTagsSTP}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Количество похожих на странице</span>

                                </td>
                                <td>
                                    <input type="number" name="countTagsSTP" id="countTagsSTP" value="{{$data->countRelatedSTP}}">
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
    $(document).ready(function () {
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





