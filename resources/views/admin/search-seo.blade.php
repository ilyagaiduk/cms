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
                    <h5>SEO настройки страницы поиска</h5>

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
                                    <textarea id="seoTitleSP" name="seoTitleSP" class="form-control" rows="3">{{$data->seoTitleSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Title</span>

                                </td>
                                <td>
                                    <input id="seoTitleSPOn" name="seoTitleSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTitleSPOn == '1') checked @endif>
                                    <input id="forseoTitleSPOn" name="forseoTitleSPOn" type="hidden" value="1" @if($data->forseoTitleSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersTASEOSP" id="registerLettersTASEOSP">
                                        <option @if($data->registerLettersTASEOSP == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersTASEOSP == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Description</span>

                                </td>
                                <td>
                                    <textarea id="seoDescriptionSP" name="seoDescriptionSP" class="form-control" rows="3">{{$data->seoDescriptionSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Description</span>

                                </td>
                                <td>
                                    <input id="seoDescriptionSPOn" name="seoDescriptionSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoDescriptionSPOn == '1') checked @endif>
                                    <input id="forseoDescriptionSPOn" name="forseoDescriptionSPOn" type="hidden" value="1" @if($data->forseoDescriptionSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersDSPSEO" id="registerLettersDSPSEO">
                                        <option @if($data->registerLettersDSPSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option  @if($data->registerLettersDSPSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Keywords</span>

                                </td>
                                <td>
                                    <textarea id="seoKeywordsSP" name="seoKeywordsSP" class="form-control" rows="3">{{$data->seoKeywordsSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Keywords</span>

                                </td>
                                <td>
                                    <input id="seoKeywordsSPOn" name="seoKeywordsSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoKeywordsSPOn == '1') checked @endif>
                                    <input id="forseoKeywordsSPOn" name="forseoKeywordsSPOn" type="hidden" value="1" @if($data->forseoKeywordsSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersKSPSEO" id="registerLettersKSPSEO">
                                        <option @if($data->registerLettersKSPSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKSPSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок страницы</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleSPP" name="seoTitleSPP" class="form-control" rows="3">{{$data->seoTitleSPP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Описание на странице поиска</span>

                                </td>
                                <td>
                                    <input id="seoTextSPOn" name="seoTextSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTextSPOn == '1') checked @endif>
                                    <input id="forseoTextSPOn" name="forseoTextSPOn" type="hidden" value="1" @if($data->forseoTextSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок описания</span>

                                </td>
                                <td>
                                    <textarea id="seoTextHSP" name="seoTextHSP" class="form-control" rows="3">{{$data->seoTextHSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Текст описания</span>

                                </td>
                                <td>
                                    <textarea id="seoFullTextSP" name="seoFullTextSP" class="form-control" rows="3">{{$data->seoFullTextSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Префикс поиска</span>

                                </td>
                                <td>
                                    <select class="form-control" name="prefixSPSEO" id="prefixSPSEO">
                                        @foreach($prefixSeacrhP as $key => $value)
                                            @if(strpos($value, 'config-prefix') === false)
                                                <option @if($data->prefixSPSEO == $value) selected="selected" @endif>{{$value}}</option>
                                        @else
                                            @continue
                                            @endif
                                                @endforeach

                                    </select>

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



