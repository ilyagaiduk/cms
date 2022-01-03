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
                    <h5>SEO настройки страницы нового поиска</h5>

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
                                    <textarea id="seoTitleNSP" name="seoTitleNSP" class="form-control" rows="3">{{$data->seoTitleNSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Title</span>

                                </td>
                                <td>
                                    <input id="seoTitleNSPOn" name="seoTitleNSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTitleNSPOn == '1') checked @endif>
                                    <input id="forseoTitleNSPOn" name="forseoTitleNSPOn" type="hidden" value="1" @if($data->forseoTitleNSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersTASEONSP" id="registerLettersTASEONSP">
                                        <option @if($data->registerLettersTASEONSP == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersTASEONSP == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Description</span>

                                </td>
                                <td>
                                    <textarea id="seoDescriptionNSP" name="seoDescriptionNSP" class="form-control" rows="3">{{$data->seoDescriptionNSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Description</span>

                                </td>
                                <td>
                                    <input id="seoDescriptionNSPOn" name="seoDescriptionNSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoDescriptionNSPOn == '1') checked @endif>
                                    <input id="forseoDescriptionSPOn" name="forseoDescriptionNSPOn" type="hidden" value="1" @if($data->forseoDescriptionNSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersDNSPSEO" id="registerLettersDSPSEO">
                                        <option @if($data->registerLettersDNSPSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option  @if($data->registerLettersDNSPSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Keywords</span>

                                </td>
                                <td>
                                    <textarea id="seoKeywordsNSP" name="seoKeywordsNSP" class="form-control" rows="3">{{$data->seoKeywordsNSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Keywords</span>

                                </td>
                                <td>
                                    <input id="seoKeywordsNSPOn" name="seoKeywordsNSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoKeywordsNSPOn == '1') checked @endif>
                                    <input id="forseoKeywordsNSPOn" name="forseoKeywordsNSPOn" type="hidden" value="1" @if($data->forseoKeywordsNSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersKNSPSEO" id="registerLettersKNSPSEO">
                                        <option @if($data->registerLettersKNSPSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKNSPSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок страницы</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleNSPP" name="seoTitleNSPP" class="form-control" rows="3">{{$data->seoTitleNSPP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Описание на новой странице поиска</span>

                                </td>
                                <td>
                                    <input id="seoTextNSPOn" name="seoTextNSPOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTextNSPOn == '1') checked @endif>
                                    <input id="forseoTextNSPOn" name="forseoTextNSPOn" type="hidden" value="1" @if($data->forseoTextNSPOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок описания</span>

                                </td>
                                <td>
                                    <textarea id="seoTextHSP" name="seoTextHNSP" class="form-control" rows="3">{{$data->seoTextHNSP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Текст описания</span>

                                </td>
                                <td>
                                    <textarea id="seoFullTextNSP" name="seoFullTextNSP" class="form-control" rows="3">{{$data->seoFullTextNSP}}</textarea>
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




