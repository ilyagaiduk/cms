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
                    <h5>SEO настройки страницы автора</h5>

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
                                    <textarea id="seoTitleAuthor" name="seoTitleAuthor" class="form-control" rows="3">{{$data->seoTitleAuthor}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Title</span>

                                </td>
                                <td>
                                    <input id="seoTitleAuthorOn" name="seoTitleAuthorOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTitleAuthorOn == '1') checked @endif>
                                    <input id="forseoTitleAuthorOn" name="forseoTitleAuthorOn" type="hidden" @if($data->forseoTitleAuthorOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersTASEO" id="registerLettersTASEO">
                                        <option @if($data->registerLettersKSEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKSEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Description</span>

                                </td>
                                <td>
                                    <textarea id="seoDescriptionAuthor" name="seoDescriptionAuthor" class="form-control" rows="3">{{$data->seoDescriptionAuthor}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Description</span>

                                </td>
                                <td>
                                    <input id="seoDescriptionAuthorOn" name="seoDescriptionAuthorOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoDescriptionAuthorOn == '1') checked @endif>
                                    <input id="forseoDescriptionAuthorOn" name="forseoDescriptionAuthorOn" type="hidden" value="1" @if($data->forseoDescriptionAuthorOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersDASEO" id="registerLettersDASEO">
                                        <option @if($data->registerLettersDASEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option  @if($data->registerLettersDASEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Тег Keywords</span>

                                </td>
                                <td>
                                    <textarea id="seoKeywordsAuthor" name="seoKeywordsAuthor" class="form-control" rows="3">{{$data->seoKeywordsAuthor}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Использование Keywords</span>

                                </td>
                                <td>
                                    <input id="seoKeywordsAuthorOn" name="seoKeywordsAuthorOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoKeywordsAuthorOn == '1') checked @endif>
                                    <input id="forseoKeywordsAuthorOn" name="forseoKeywordsAuthorOn" type="hidden" @if($data->forseoKeywordsAuthorOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Регистр букв</span>

                                </td>
                                <td>
                                    <select class="form-control" name="registerLettersKASEO" id="registerLettersKASEO">
                                        <option @if($data->registerLettersKASEO == 'Каждая первая заглавная') selected="selected" @endif>Каждая первая заглавная</option>
                                        <option @if($data->registerLettersKASEO == 'Все строчные') selected="selected" @endif>Все строчные</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок страницы</span>

                                </td>
                                <td>
                                    <textarea id="seoTitleAuthorP" name="seoTitleAuthorP" class="form-control" rows="3">{{$data->seoTitleAuthorP}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Описание на странице автора</span>

                                </td>
                                <td>
                                    <input id="seoTextAuthorOn" name="seoTextAuthorOn" type="checkbox"
                                           data-toggle="toggle" data-on="Включено" data-off="Выключено" @if($data->forseoTextAuthorOn == '1') checked @endif>
                                    <input id="forseoTextAuthorOn" name="forseoTextAuthorOn" type="hidden" @if($data->forseoTextAuthorOn == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок описания</span>

                                </td>
                                <td>
                                    <textarea id="seoTextHAuthor" name="seoTextHAuthor" class="form-control" rows="3">{{$data->seoTextHAuthor}}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Текст описания</span>

                                </td>
                                <td>
                                    <textarea id="seoFullTextAuthor" name="seoFullTextAuthor" class="form-control" rows="3">{{$data->seoFullTextAuthor}}</textarea>
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


