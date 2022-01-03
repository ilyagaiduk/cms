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
                    <h5>SEO настройки главной страницы</h5>

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
                                    <textarea id="seoTitleMain" name="seoTitleMain" class="form-control" rows="3">{{$data->seoTitleMain}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Title</span>

                                </td>
                                <td>
                                    <input id="seoTitleMainOn" name="seoTitleMainOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTitleMainOn == '1') checked @endif>
                                    <input id="forseoTitleMainOn" name="forseoTitleMainOn" type="hidden" @if($data->forseoTitleMainOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersTSEO" id="registerLettersTSEO">
                                        <option @if($data->registerLettersTSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersTSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Description</span>

                                </td>
                                <td>
                                    <textarea id="seoDescriptionMain" name="seoDescriptionMain" class="form-control" rows="3">{{$data->seoDescriptionMain}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Description</span>

                                </td>
                                <td>
                                    <input id="seoDescriptionMainOn" name="seoDescriptionMainOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoDescriptionMainOn == '1') checked @endif>
                                    <input id="forseoDescriptionMainOn" name="forseoDescriptionMainOn" type="hidden" @if($data->forseoDescriptionMainOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersDSEO" id="registerLettersDSEO">
                                        <option @if($data->registerLettersTSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersTSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Keywords</span>

                                </td>
                                <td>
                                    <textarea id="seoKeywordsMain" name="seoKeywordsMain" class="form-control" rows="3">{{$data->seoKeywordsMain}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Keywords</span>

                                </td>
                                <td>
                                    <input id="seoKeywordsMainOn" name="seoKeywordsMainOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoKeywordsMainOn == '1') checked @endif>
                                    <input id="forseoKeywordsMainOn" name="forseoKeywordsMainOn" type="hidden" @if($data->forseoKeywordsMainOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersKSEO" id="registerLettersKSEO">
                                        <option @if($data->registerLettersKSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок страницы</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleMainP" name="seoTitleMainP" class="form-control" rows="3">{{$data->seoTitleMainP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Описание на главной</span>

                                </td>
                                <td>
                                    <input id="seoTextMainOn" name="seoTextMainOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTextMainOn == '1') checked @endif>
                                    <input id="forseoTextMainOn" name="forseoTextMainOn" type="hidden" @if($data->forseoTextMainOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок описания</span>

                                </td>
                                <td>
                                    <textarea id="seoTextHMain" name="seoTextHMain" class="form-control" rows="3">{{$data->seoTextHMain}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Текст описания</span>

                                </td>
                                <td>
                                    <textarea id="seoFullTextMain" name="seoFullTextMain" class="form-control" rows="3">{{$data->seoFullTextMain}}</textarea>
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

