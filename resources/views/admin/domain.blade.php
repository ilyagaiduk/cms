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
                    <h5>Домены сайты</h5>

                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('getConfigJson') }}">
                        <div id="console-event"></div>
                        @csrf
                        <table id="table" class="table-responsive table">
                                    <tr>
                                        <td>
                                            <span>Домен сайта</span>

                                        </td>
                                        <td>
                                            <input type="text" id="domain" name="domain" value="{{$data->domain}}">
                                        </td>
                                    </tr>
                            <tr>
                                <td>
                                    <span>Использовать www</span>

                                </td>
                                <td>
                                    <input id="www" name="www" type="checkbox" data-toggle="toggle" data-on="Включить" data-off="Выключить" @if($data->forwww == '1') checked @endif>
                                    <input id="forwww" name="forwww" type="hidden" @if($data->forwww == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Домен картинок</span>

                                </td>
                                <td>
                                    <input type="text" id="domainImg" name="domainImg" value="{{$data->domainImg}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Протокол домена картинок</span>

                                </td>
                                <td>
                                    <input id="https" name="https" type="checkbox" data-toggle="toggle" data-on="https" data-off="http" @if($data->forhttps == '1') checked @endif>
                                    <input id="forhttps" name="forhttps" type="hidden" @if($data->forhttps == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>URL заглушки</span>

                                </td>
                                <td>
                                    <input type="text" name="imageUrl" id="imageUrl" value="{{$data->imageUrl}}">
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
