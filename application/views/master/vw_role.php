<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-statistic-2">
                <div class="d-flex card-header justify-content-between py-4">
                    <h2 class="mb-0">Data Role</h2>
                    <button id="tambahBtn" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="role-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Role</th>
                                        <th>Deskripsi</th>
                                        <th>Waktu Dibuat</th>
                                        <th>Waktu Diubah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($roles as $value) {
                                    ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $value->role_name ?></td>
                                            <td><?= $value->description ?></td>
                                            <td><?= $value->created_at ?></td>
                                            <td><?= $value->updated_at ?></td>
                                            <td>
                                                <button data-toggle="modal"
                                                    data-target="#editForm" data-id_role=<?= $value->id ?>
                                                    data-description="<?= htmlspecialchars($value->description) ?>"
                                                    data-role_name="<?= htmlspecialchars($value->role_name) ?>"
                                                    id="editBtn"
                                                    data-action="edit" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></button>
                                                <a href="<?= site_url('role/hapus/' . encrypt_data($value->id)); ?>" class="btn btn-sm btn-danger delete-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="tambahForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation forms-sample" method="post" action="" novalidate="">
                    <div class="form-group">
                        <label for="role_name">Nama Role</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" required="" id="role_name" name="role_name" value="<?= set_value('role_name'); ?>" />
                            <div class="invalid-feedback">
                                Nama role wajib diisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Role</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" id="description" name="description" value="<?= set_value('description'); ?>" />
                        </div>
                    </div>
                    <div class="modal-footer px-0 py-2">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                        <button id="storeBtn" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                        <input type="hidden" name="id_role" id="id_role" value="">
                        <label for="edit_role_name">Nama Role</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" required="" id="edit_role_name" name="edit_role_name" />
                            <div class="invalid-feedback">
                                Nama role wajib diisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Deskripsi Role</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" id="edit_description" name="edit_description" />
                        </div>
                    </div>
                    <div class="modal-footer px-0 py-2">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                        <button id="updateBtn" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/modules/jquery.min.js'); ?>"></script>
<?php if ($this->session->flashdata('sukses') || $this->session->flashdata('gagal')): ?>
    <script>
        $(document).ready(function() {
            var sukses = "<?= $this->session->flashdata('sukses'); ?>";
            var gagal = "<?= $this->session->flashdata('gagal'); ?>";

            if (sukses) {
                alert(sukses);
            } else {
                alert(gagal);
            }

        });
    </script>
<?php endif; ?>
<script>
    $(document).ready(function() {
        var baseUrl = '<?= base_url() ?>'

        $(document).on('click', '#tambahBtn', function() {
            // resetInput();
            // resetValidationErrors();
            $('#tambahForm').modal('show');
        });

        $(document).on('click', '#storeBtn', function(e) {
            e.preventDefault();

            let form = $(this).closest('form')[0];

            if (form.checkValidity() === false) {
                e.stopPropagation();
                form.classList.add('was-validated');
            } else {
                let role_name = $('#role_name').val();
                let description = $('#description').val();

                $.ajax({
                    url: baseUrl + "role/tambah",
                    type: 'POST',
                    data: {
                        "role_name": role_name,
                        "description": description
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.status);
                        // customSuccessAlert('success', 'Berhasil', 'Berhasil tambah role').then(
                        //     function() {
                        //         // Callback function yang dijalankan setelah SweetAlert ditutup
                        //         location.reload();
                        //     });
                        if (response.status == 'sukses') {
                            $('#tambahForm').modal('hide');

                            // Store the message in localStorage
                            localStorage.setItem('alertMessage', JSON.stringify(response));

                            // Reload the page
                            location.reload();
                        } else {
                            alert('gagal');
                        }
                    },
                    error: function(error) {
                        // handleAjaxError(error);
                        alert('gagaaaaal');
                    }
                });
            }
        });

        $(document).on('click', '#editBtn', function(e) {
            e.preventDefault();

            // Mengambil nilai dari atribut data-*
            let role_name = $(this).data('role_name');
            let description = $(this).data('description');
            let id_role = $(this).data('id_role');

            // Memasukkan nilai ke dalam form edit
            $('#editForm input[name="id_role"]').val(id_role);
            $('#editForm input[name="edit_role_name"]').val(role_name);
            $('#editForm input[name="edit_description"]').val(description);

            // resetValidationErrors()
            // Menampilkan modal edit
            $('#editForm').modal('show');
        });

        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();

            // Mengambil nilai dari form edit
            var id_role = $('#editForm input[name="id_role"]').val();
            var role_name = $('#editForm input[name="edit_role_name"]').val();
            var description = $('#editForm input[name="edit_description"]').val();

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: baseUrl + "role/edit",
                data: {
                    id_role: id_role,
                    role_name: role_name,
                    description: description,
                },
                dataType: 'json',
                success: function(response) {
                    // // Sembunyikan modal setelah update
                    // $('#editForm').modal('hide');

                    // // Memanggil customSuccessAlert dan me-refresh halaman setelah SweetAlert ditutup
                    // customSuccessAlert('success', 'Berhasil', 'Berhasil ubah role').then(
                    //     function() {
                    //         // Callback function yang dijalankan setelah SweetAlert ditutup
                    //         location.reload();
                    //     });

                    // // Bersihkan nilai input
                    // $('#name_role').val('');

                    if (response.status == 'sukses') {
                        $('#editForm').modal('hide');

                        // Store the message in localStorage
                        localStorage.setItem('alertMessage', JSON.stringify(response));

                        // Reload the page
                        location.reload();
                    } else {
                        alert('gagal');
                    }
                },
                error: function(error) {
                    // handleAjaxError(error);
                    alert('gagaaaaaaaal');
                }
            });
        });

        if (localStorage.getItem('alertMessage')) {
            var alertMessage = JSON.parse(localStorage.getItem('alertMessage'));
            alert(alertMessage.message);
            localStorage.removeItem('alertMessage');
        }

        $('#role-table').on('click', '.delete-confirm', function(event) {
            event.preventDefault();

            var url = $(this).attr('href');
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');

            if (confirmation) {
                window.location.href = url;
            }
        });
    })
</script>