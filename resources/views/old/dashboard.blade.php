@include('admin.head')
@include('admin.menu')

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div id="header">
            <h1 class="text-primary">Параметры конфигурации Api</h1>
            <hr width="20%">
            </div>
            <form id="form" class="form-control mt-5" method="post" action="{{ route('updateConfig') }}">
                @csrf
                <div class="mb-3">
                    <label for="limitSite" class="form-label">Лимит жизни запроса для сайта, сек</label>
                    <input type="text" class="form-control" id="limitSite" name="limitSite" value="{{$config['limitqSite']}}">
                </div>
                <div class="mb-3">
                    <label for="limitApp" class="form-label">Лимит жизни запроса для приложения, сек</label>
                    <input type="text" class="form-control" id="limitApp" name="limitApp" value="{{$config['limitqApp']}}">
                </div>
                <div class="mb-3">
                    <label for="limitqUser" class="form-label">Лимит частоты запросов от одного пользователя приложения, n/сек</label>
                    <input type="text" class="form-control" id="limitqUser" name="limitqUser" value="{{$config['limitqpAppUser']}}">
                </div>
                <div class="mb-3">
                    <label for="protocol" class="form-label">Протокол домена (http:// или https://)</label>
                    <input type="text" class="form-control" id="protocol" name="protocol" value="{{$config['protocol']}}">
                </div>
                <div class="mb-3">
                    <label for="imgdomain" class="form-label">Домен картинок (например, soundcloud.flv-files.com)</label>
                    <input type="text" class="form-control" id="imgdomain" name="imgdomain" value="{{$config['imgdomain']}}">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" id="submit" type="button">Изменить</button>
                </div>
            </form>
            <div id="results">
            </div>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
            <script>
                $(document).on("click", "#submit", function (e){
                    let _token = $("input[name='_token']").val();
                    let limitSite = $('#limitSite').val();
                    let limitApp = $('#limitApp').val();
                    let limitqUser = $('#limitqUser').val();
                    let protocol = $('#protocol').val();
                    let imgdomain = $('#imgdomain').val();
                    $.ajax({
                        url: '{{ route("updateConfig") }}',
                        method: 'post',
                        cache: true,
                        dataType: 'html',
                        data: {
                            'limitqSite': limitSite,
                            'limitqApp': limitApp,
                            'limitqpAppUser': limitqUser,
                            'protocol': protocol,
                            'imgdomain': imgdomain,
                            '_token': _token,

                        },
                        success: function (html) {
                            $("#results").remove();
                            $("#form").remove();
                            $('<div id="results"></div>').insertAfter('#header');
                            $("#results").append(html);
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
                                title: 'Данные конфига обновлены'
                            })
                        }
                    });
                });

            </script>

        </div>
    </div>
</div>
@include('admin.footer')


