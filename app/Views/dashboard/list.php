<!-- Button trigger modal -->
<a href="#" id="tambah" class="btn btn-success mb-3" onclick="tambah()">Tambah Anggota</a>

<table id="datatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Avatar</th>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($list as $item) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><img src="<?= base_url() ?>/assets/img/photo-profile/<?= $item['avatar']?>" alt="" width="100px"></td>
                <td><?= $item['username'] ?></td>
                <td><?= $item['email'] ?></td>
                <td>
                    <a  href="<?= base_url('/dashboard/profile/' . $item['username'])?>" class="btn">Detail</a>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $('#tambah').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?= base_url('/dashboard/form') ?>",
            dataType: "json",
            success: function(response) {
                $('#viewmodal').html(response.data).show();
                $('#formmodal').modal('show');
            }
        });
    });



    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<!-- <script>
    $(document).ready(function() {
        $('#form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.error) {
                        if (response.error.namadepan) {
                            $('#nd').addClass('is-invalid');
                            $('#errornd').html(response.error.namadepan);
                        } else {
                            $('#nd').removeClass('is-invalid');
                            $('#errornd').html('');
                        }

                        if (response.error.namabelakang) {
                            $('#nb').addClass('is-invalid');
                            $('#errornb').html(response.error.namabelakang);
                        } else {
                            $('#nb').removeClass('is-invalid');
                            $('#errornb').html('');
                        }

                        if (response.error.email) {
                            $('#em').addClass('is-invalid');
                            $('#errorem').html(response.error.email);
                        } else {
                            $('#em').removeClass('is-invalid');
                            $('#errorem').html('');
                        }
                    } else {
                        alert(response.sukses);
                        $('#formmodal').modal('hide');
                        tampilData();
                    }
                }
            });
        });
    });
</script> -->