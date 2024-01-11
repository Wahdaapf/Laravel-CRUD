@extends("Layout.index")
@section("wrapper")
<div class="overflow-x-auto p-8">
    <button class="btn" onclick="my_modal_1.showModal()">Tambah Berita</button>
    <table class="table">
        <!-- head -->
        <thead>
            <tr>
                <th>Nama Berita</th>
                <th>Deskripsi Pendek</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- row 1 -->
            @foreach($data as $dt)
            <tr>
                <td>
                    <div class="flex items-center gap-3">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12">
                                <img src="{{asset('assets/profile/'.$dt->image)}}" alt="Avatar Tailwind CSS Component" />
                            </div>
                        </div>
                        <div>
                            <div class="font-bold">{{$dt->title}}</div>
                        </div>
                    </div>
                </td>
                <td>
                    {{$dt->short_description}}
                </td>
                <th>
                    <button class="btn bg-green-500 btn-xs" onclick="my_modal_2.showModal()">detail</button>
                    <button class="btn bg-yellow-500 btn-xs edit" value="{{$dt->id}}" onclick="my_modal_3.showModal()">edit</button>
                    <button class="btn bg-red-500 btn-xs delete" value="{{$dt->id}}">delete</button>
                </th>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
<!-- Open the modal using ID.showModal() method -->
<dialog id="my_modal_1" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Tambah Berita</h3>
        <form action="" id="addData" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Judul Berita</span>
                </div>
                <input type="text" name="title" placeholder="Judul Berita" class="input input-bordered w-full " />
                <span class="clearfix text-red-500 error-messages" id="err_title"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Description</span>
                </div>
                <textarea type="text" name="description" placeholder="Deskripsi Berita" class="input input-bordered w-full "></textarea>
                <span class="clearfix text-red-500 error-messages" id="err_description"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Description Pendek</span>
                </div>
                <textarea type="text" name="short_description" placeholder="Deskripsi Pendek Berita" class="input input-bordered w-full "></textarea>
                <span class="clearfix text-red-500 error-messages" id="err_short_description"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Tag Berita</span>
                </div>
                <select name="tag" class="input input-bordered w-full" multiple>
                    <option value="Hiburan">Hiburan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Memasak">Memasak</option>
                    <option value="Pemandangan">Pemandangan</option>
                </select>
                <span class="clearfix text-red-500 error-messages" id="err_tag"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Gambar</span>
                </div>
                <input type="file" name="image" class="input input-bordered w-full" />
                <span class="clearfix text-red-500 error-messages" id="err_image"></span>
            </label>
            <button type="submit" class="btn mt-4">Submit</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <button id="close" class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>

<!-- Open the modal using ID.showModal() method -->
<dialog id="my_modal_3" class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg">Edit Berita</h3>
        <form action="" id="editData" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id">
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Judul Berita</span>
                </div>
                <input type="text" name="title_edit" placeholder="Judul Berita" class="input input-bordered w-full " />
                <span class="clearfix text-red-500 error-messages" id="err_title_edit"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Description</span>
                </div>
                <textarea type="text" name="description_edit" placeholder="Deskripsi Berita" class="input input-bordered w-full "></textarea>
                <span class="clearfix text-red-500 error-messages" id="err_description_edit"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Description Pendek</span>
                </div>
                <textarea type="text" name="short_description_edit" placeholder="Deskripsi Pendek Berita" class="input input-bordered w-full "></textarea>
                <span class="clearfix text-red-500 error-messages" id="err_short_description_edit"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Tag Berita</span>
                </div>
                <select name="tag_edit" class="input input-bordered w-full" multiple>
                    <option value="Hiburan">Hiburan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Memasak">Memasak</option>
                    <option value="Pemandangan">Pemandangan</option>
                </select>
                <span class="clearfix text-red-500 error-messages" id="err_tag_edit"></span>
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text">Gambar</span>
                </div>
                <img src="" class="previmage">
                <input type="file" name="image_edit" class="input input-bordered w-full" />
                <span class="clearfix text-red-500 error-messages" id="err_image_edit"></span>
            </label>
            <button type="submit" class="btn mt-4">Submit</button>
        </form>
        <div class="modal-action">
            <form method="dialog">
                <button id="close1" class="btn">Close</button>
            </form>
        </div>
    </div>
</dialog>
@endsection

@section("script")
<script>
    $(document).ready(function() {
        $('#addData').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($('#addData')[0]);
            var selectedOptions = [];
            $('#addData select[name="tag"] option:selected').each(function() {
                selectedOptions.push($(this).val());
            });

            // Menambahkan opsi yang dipilih ke FormData
            formData.append('tag', selectedOptions);
            $.ajax({
                url: "{{route('add-beritaku')}}",
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#close').click();
                    $('#addData')[0].reset();
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil Menambah Berita'
                    });
                    window.location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.errors)
                    $('#err_title').html(xhr.responseJSON.errors.title);
                    $('#err_description').html(xhr.responseJSON.errors.description);
                    $('#err_short_description').html(xhr.responseJSON.errors.short_description);
                    $('#err_tag').html(xhr.responseJSON.errors.tag);
                    $('#err_image').html(xhr.responseJSON.errors.image);
                    swal.fire({
                        icon: 'error',
                        title: 'ada kesalahan sistem',
                        text: 'Silahkan coba lagi',
                    });
                }
            })
        });

        $('#editData').submit(function(event) {
            event.preventDefault();
            var formData = new FormData($('#editData')[0]);
            var selectedOptions = [];
            $('#editData select[name="tag_edit"] option:selected').each(function() {
                selectedOptions.push($(this).val());
            });
            // Menambahkan opsi yang dipilih ke FormData
            formData.append('tag_edit', selectedOptions);
            var idValue = $('input[name="id"]').val();
            $.ajax({
                url: "update/beritaku/"+idValue,
                type: "POST",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
                data: formData,
                success: function(response) {
                    $('#close1').click();
                    $('#editData')[0].reset();
                    swal.fire({
                        icon: 'success',
                        title: 'Berhasil Mengupdate Berita'
                    });
                    window.location.reload();
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.errors)
                    $('#err_title_edit').html(xhr.responseJSON.errors.title_edit);
                    $('#err_description_edit').html(xhr.responseJSON.errors.description_edit);
                    $('#err_short_description_edit').html(xhr.responseJSON.errors.short_description_edit);
                    $('#err_tag_edit').html(xhr.responseJSON.errors.tag_edit);
                    $('#err_image_edit').html(xhr.responseJSON.errors.image_edit);
                    swal.fire({
                        icon: 'error',
                        title: 'ada kesalahan sistem',
                        text: 'Silahkan coba lagi',
                    });
                }
            })
        });

        //edit data
        $("body").on('click', '.edit', function() {
            var id = $(this).val();
            $.ajax({
                url: "/edit/beritaku/" + id,
                type: "POST",
                dataType: 'json',
                data: {
                    "_token": "{{csrf_token()}}",
                },
                success: function(response) {
                    console.log(response);
                    var img = response.data.image;
                    var url = 'http://127.0.0.1:8000/assets/profile/' + img;
                    $('.previmage').attr('src', url);
                    $('input[name="id"]').val(response.data.id);
                    $('input[name="title_edit"]').val(response.data.title);
                    $('textarea[name="description_edit"]').val(response.data.description);
                    $('textarea[name="short_description_edit"]').val(response.data.short_description);
                    var selectElement = document.querySelector('select[name="tag_edit"]');
                    var tagCount = response.data.tags.length;
                    selectElement.selectedIndex = -1;
                    for (var i = 0; i < selectElement.options.length; i++) {
                        var option = selectElement.options[i];
                        if (response.data.tags.includes(option.value)) {
                            option.selected = true;
                        }
                    }
                    $('select[name="tag_edit"]').trigger('change');
                },
            })
        });

        $("body").on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).val();
            Swal.fire({
                title: 'Apakah Anda yakin ?',
                text: "Data yg dihapus tidak bisa dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    let id = $(this).val()
                    $.ajax({
                        type: "POST",
                        url: 'delete/beritaku/' + id,
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id,
                        },
                        success: function(response) {
                            swal.fire({
                                icon: 'success',
                                title: 'Hapus Konstruksi Berhasil',
                                timer: 1500,
                            });
                            window.location.reload();
                        },
                        error: function(xhr) {
                            swal.fire({
                                icon: 'error',
                                title: 'ada kesalahan sistem',
                                text: 'Silahkan coba lagi',
                            });
                        }
                    });
                } else {
                    swal.fire({
                        icon: 'info',
                        title: 'Aksi dibatalkan',
                        timer: 800,
                    });
                }
            })
        });

    });
</script>
@endsection