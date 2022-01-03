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
                    <h5>Заголовки</h5>

                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('getConfigJson') }}">
                        <div id="console-event"></div>
                        @csrf
                        <table id="table" class="table-responsive table">
                            <tr>
                                <td>
                                    <span>Название сайта</span>

                                </td>
                                <td>
                                    <input type="text" id="titleSiteH" name="titleSiteH" value="{{$data->titleSiteH}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Категория по умолчанию</span>

                                </td>
                                <td>
                                    <input type="text" id="defaultCatSite" name="defaultCatSite" value="{{$data->defaultCatSite}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок последних поисков</span>

                                </td>
                                <td>
                                    <input type="text" id="headerLSSite" name="headerLSSite" value="{{$data->headerLSSite}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Заголовок категорий</span>

                                </td>
                                <td>
                                    <input type="text" id="headerCatSite" name="headerCatSite" value="{{$data->headerCatSite}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Copyright текст</span>

                                </td>
                                <td>
                                    <textarea id="copyRightSite" name="copyRightSite" class="form-control" rows="3" >{{$data->copyRightSite}}</textarea>
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

