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
                    <h5>Постфикс</h5>
                    <button id="addRow" type="button" class="btn-sm btn-primary">Добавить постфикс</button>
                    <script>
                        $(document).on("click", "#addRow", function (e) {
                            var rowCount = $('#table tr').length;
                            $('#table > tbody:last-child').append('' +
                                '<tr>\n' +
                                '                                <td>\n' +
                                '                                    ' + rowCount + '\n' +
                                '                                </td>\n' +
                                '                                <td>\n' +
                                '                                    <input type="text" class="form-control" id="postfix' + rowCount + '" name="postfix' + rowCount + '">\n' +
                                '\n' +
                                '                                </td>\n' +
                                '                                <td>\n' +
                                '                                    <button type="button" id="' + rowCount + '" class="delete btn-sm btn-warning">Удалить</button>\n' +
                                '                                </td>\n' +
                                '                            </tr>' +
                                '');
                        });

                    </script>
                    <div id="header"></div>
                    <form id="form" class="mt-5" method="post" action="{{ route('JsonConfig') }}">
                        @csrf
                        <table id="table" class="table-responsive table">
                            <thead>
                            <th>№</th>
                            <th>Постфикс</th>
                            <th>Действие</th>
                            </thead>
                            <?php
                            $count = 0;
                            ?>
                            @for($i = 1; $i <= 50; $i++)
                                @php($count++)
                                @if(empty($data->{'postfix'.$i}) && $i > 1)
                                    @php($count--)
                                    @continue
                                @elseif(empty($data->{'postfix'.$i}) && $i == 1)
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="postfix1"
                                                   name="postfix1" value="1">

                                        </td>
                                        <td>
                                            <button type="button" class="delete btn-sm btn-warning">Удалить</button>
                                        </td>
                                    </tr>
                                    @continue
                                @else
                                    <tr>
                                        <td>
                                            {{$count}}
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="postfix{{$count}}"
                                                   name="postfix{{$count}}" value="{{ $data->{'postfix'.$count} }}">

                                        </td>
                                        <td>
                                            <button type="button" id="{{$count}}" class="delete btn-sm btn-warning">
                                                Удалить
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endfor
                        </table>
                        <div class="mb-3">
                            <input type="hidden" id="filename" name="filename" value="config-postfix">
                        </div>
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
@include('admin.ajax-json')
@include('admin.footer')




