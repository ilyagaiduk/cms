@include('admin.head')
@include('admin.menu')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="header">
                <h1 class="text-primary">Сайты с хешем</h1>
                <hr width="20%">
                <form method="get" id="hashForm">
                    @csrf
                        <label for="domain" class="form-label">Введите домен</label>
                        <input type="text" id="domain" name="domain">
                <button id="submit" class="btn-sm btn-primary mb-2" type="button">Создать хеш</button>
                </form>
                <table id="sites" class="table table-responsive">
                    <thead>
                    <th>ID</th>
                    <th>Hash</th>
                    </thead>
                @foreach($hash as $value)
                    <tr id="{{$value->id.$value->site}}">
                        <td>{{$value->id}}</td>
                        <td>{{$value->site}}</td>
                        <td>{{$value->hash}}</td>
                        <td><form action="{{ route("sites.updateData") }}" method="post">@csrf <input type="hidden" name="id" value="{{$value->id}}"> <button class="btn-sm btn-warning" id="{{$value->hash.$value->id}}"
                                                              name="{{$value->id}}" type="submit">Редактировать</button></form> </td>
                        <td><form action="{{ route("sites.delete") }}" method="post">@csrf <input type="hidden" name="id"
                                                                                                  value="{{$value->id}}"><button class="btn-sm btn-danger" name="submit" type="submit">Удалить</button></form> </td>
                    </tr>
                @endforeach
                </table>
                <div id="pagination">
                {{ $hash->links() }}
                </div>
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>

                $(document).on("click", "#submit", function (e){
                    let _token = $("input[name='_token']").val();
                    let domain = $('#domain').val();
                    $.ajax({
                        url: '{{ route("sites.store") }}',
                        method: 'post',
                        cache: true,
                        dataType: 'html',
                        data: {
                            'domain': domain,
                            '_token': _token,

                        },
                        success: function (html) {
                            $("#results").remove();
                            $("#sites").remove();
                            $("#pagination").remove();
                            $('<div id="results"></div>').insertAfter('#hashForm');
                            $("#results").append(html);
                            let title = '';
                            if(html == '<span id=\'message\'>Введите уникальный домен!</span>') {
                                title = 'Хеш не создан'
                            }
                            else if(html == '<span id=\'message\'>Введите домен и нажмите кнопку Создать хеш!</span>') {
                                title = 'Вы не ввели домен'
                            }
                            else {
                                title = 'Хеш создан'
                            }
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                            })
                            Toast.fire({
                                icon: 'success',
                                title: title,
                            })
                        }
                    });
                });

            </script>



        </div>
    </div>
</div>
@include('admin.footer')


