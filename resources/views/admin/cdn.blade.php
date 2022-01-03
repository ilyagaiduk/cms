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
                                    <span>Домен фото CDN</span>

                                </td>
                                <td>
                                    <input type="text" id="domainPCdn" name="domainPCdn" value="{{$data->domainPCdn}}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Протокол домена картинок</span>

                                </td>
                                <td>
                                    <input id="protocolDPic" name="protocolDPic" type="checkbox" data-toggle="toggle" data-on="https" data-off="http" @if($data->forprotocolDPic == '1') checked @endif>
                                    <input id="forprotocolDPic" name="forprotocolDPic" type="hidden" @if($data->forprotocolDPic == '1') value="1" @endif>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Префикс картинок</span>

                                </td>
                                <td>
                                    <select class="form-control" name="prefixImagesCdn" id="prefixImagesCdn">
                                        <option @if($data->prefixImagesCdn == '-') selected="selected" @endif>-</option>
                                        <option @if($data->prefixImagesCdn == '_') selected="selected" @endif>_</option>
                                    </select>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Вариант пути картинок</span>

                                </td>
                                <td>
                                    <select class="form-control" name="varPathImages" id="varPathImages">
                                        <option @if($data->varPathImages == '-') selected="selected" @endif>-</option>
                                        <option @if($data->varPathImages == '_') selected="selected" @endif>_</option>
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

