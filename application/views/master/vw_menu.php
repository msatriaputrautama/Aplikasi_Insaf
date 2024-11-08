<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-statistic-2">
                <div class="d-flex card-header justify-content-between py-4">
                    <h2 class="mb-0">Data Menu</h2>
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
                            <table id="menu-table" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Menu</th>
                                        <th>URL</th>
                                        <th>Icon</th>   
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($menus as $value) {
                                    ?>
                                    <!-- <pre><?php print_r($menus); ?></pre> -->
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $value->menu_name ?></td>
                                            <td><?= $value->url ?></td>
                                            <td><?= $value->icon ?></td>
                                            <td>
                                                <button data-toggle="modal"
                                                    data-target="#editForm" data-id_menu=<?= $value->id ?>
                                                    data-url="<?= htmlspecialchars($value->url) ?>"
                                                    data-menu_name="<?= htmlspecialchars($value->menu_name) ?>"
                                                    data-icon="<?= htmlspecialchars($value->icon) ?>"
                                                    id="editBtn"
                                                    data-action="edit" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></button>
                                                <a href="<?= site_url('menu/hapus/' . encrypt_data($value->id)); ?>" class="btn btn-sm btn-danger delete-confirm">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <?php if (!empty($value->submenus)) { ?>
                                            <?php foreach ($value->submenus as $submenu) { ?>
                                                <tr>
                                                    <td></td> 
                                                    <td>- <?= $submenu['menu_name'] ?></td>
                                                    <td><?= $submenu['url'] ?></td>
                                                    <td><?= $submenu['icon'] ?></td>
                                                    <td>
                                                        <button data-toggle="modal"
                                                            data-target="#editForm" data-id_menu=<?= $submenu['id'] ?>
                                                            data-url="<?= htmlspecialchars($submenu['url']) ?>"
                                                            data-menu_name="<?= htmlspecialchars($submenu['menu_name']) ?>"
                                                            data-icon="<?= htmlspecialchars($submenu['icon']) ?>"
                                                            id="editBtn"
                                                            data-action="edit" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></button>
                                                        <a href="<?= site_url('menu/hapus/' . encrypt_data($submenu['id'])); ?>" class="btn btn-sm btn-danger delete-confirm">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        <?php } ?>

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
                <h5 class="modal-title" id="titleModal">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation forms-sample" method="post" action="" novalidate="">
                    <div class="form-group">
                        <label for="menu_name">Nama Menu</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" required="" id="menu_name" name="menu_name" value="<?= set_value('menu_name'); ?>" />
                            <div class="invalid-feedback">
                                Nama menu wajib diisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi Menu</label>
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
                <h5 class="modal-title" id="titleModal">Edit Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="forms-sample" method="post" action="">
                    <div class="form-group">
                        <input type="hidden" name="id_menu" id="id_menu" value="">
                        <label for="edit_menu_name">Nama Menu</label>
                        <div class="input-group">
                            <input type="text" class="form-control resettable-input" required="" id="edit_menu_name" name="edit_menu_name" />
                            <div class="invalid-feedback">
                                Nama menu wajib diisi
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="edit_description">Deskripsi Menu</label>
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
                let menu_name = $('#menu_name').val();
                let url = $('#url').val();
                let icon = $('#icon').val();

                $.ajax({
                    url: baseUrl + "menu/tambah",
                    type: 'POST',
                    data: {
                        "menu_name": menu_name,
                        "url": url,
                        "icon": icon
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response.status);
                        
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
            let menu_name = $(this).data('menu_name');
            let url = $(this).data('url');
            let icon = $(this).data('icon');
            let id_menu = $(this).data('id_menu');

            // Memasukkan nilai ke dalam form edit
            $('#editForm input[name="id_menu"]').val(id_menu);
            $('#editForm input[name="edit_menu_name"]').val(menu_name);
            $('#editForm input[name="edit_url"]').val(url);
            $('#editForm input[name="edit_icon"]').val(icon);

            // Menampilkan modal edit
            $('#editForm').modal('show');
        });

        $(document).on('click', '#updateBtn', function(e) {
            e.preventDefault();

            // Mengambil nilai dari form edit
            var id_menu = $('#editForm input[name="id_menu"]').val();
            var menu_name = $('#editForm input[name="edit_menu_name"]').val();
            var url = $('#editForm input[name="edit_url"]').val();
            var icon = $('#editForm input[name="edit_icon"]').val();

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: baseUrl + "menu/edit",
                data: {
                    id_menu: id_menu,
                    menu_name: menu_name,
                    url: url,
                    icon: icon,
                },
                dataType: 'json',
                success: function(response) {

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

        $('#menu-table').on('click', '.delete-confirm', function(event) {
            event.preventDefault();

            var url = $(this).attr('href');
            var confirmation = confirm('Apakah Anda yakin ingin menghapus data ini?');

            if (confirmation) {
                window.location.href = url;
            }
        });
    })
</script>