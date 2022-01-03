<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).on("click", "#submit", function (e) {
        $.ajax({
            url: '{{ route("JsonConfig") }}',
            method: 'post',
            cache: true,
            dataType: 'html',
            data: $('form').serialize(),
            success: function (html) {
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
                    title: 'Файл конфига перезаписан'
                })
            }
        });
    });

</script>
<script>
    $(document).on('click', '.delete', function (event) {
        if (confirm('Вы точно хотите удалить элемент?')) {
            //удаляем строку таблицы
            var $this = $(this);
            $this.closest("tr").remove();
            $.ajax({
                url: '{{ route("JsonConfig") }}',
                method: 'post',
                cache: true,
                dataType: 'html',
                data: $('form').serialize(),
                success: function (html) {
                    //выводим сообщение
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
                        title: 'Элемент удален'
                    })
                }
            });
        }
    });
</script>
<script>
    $(document).on("click", "#submit", function (e) {
        $.ajax({
            url: '{{ route("getConfigJson") }}',
            method: 'post',
            cache: true,
            dataType: 'html',
            data: $('form').serialize(),
            success: function (html) {
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
                    title: 'Файл конфига перезаписан'
                })
            }
        });
    });

</script>
