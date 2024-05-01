<?php

class PemilikView {
    public function render($data){
        $no = 1;
        $dataBuku = null;
        $dataAuthor = null;
        foreach($data['pemilik'] as $val){
            list($id, $nama, $email, $nomor_telepon) = $val;
            $dataBuku .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $nomor_telepon . "</td>";

            $dataBuku .= "
                <td>
                    <a href='pemilik.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                    <a href='pemilik.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                </td>";
            $dataBuku .= "</tr>";
        }

        $formContent = '
            <h1 class="text-center pt-3">Input Pemilik</h1>
            <form action="pemilik.php" method="POST">
                <div class="form-row">
                    <div class="form-group mt-3">
                        <label for="tname">Nama</label>
                        <div class="d-flex">
                            <input type="text" class="form-control" name="nama" value="" required /> <!-- Mengganti "tname" menjadi "nama" -->
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group mt-3">
                        <label for="temail">Email</label>
                        <input type="email" class="form-control" name="email" value="" required /> <!-- Menambahkan input untuk email -->
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group mt-3">
                        <label for="tnomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control" name="nomor_telepon" value="" required /> <!-- Menambahkan input untuk nomor telepon -->
                    </div>
                </div>
                <button type="submit" name="add" class="btn btn-primary" style="margin-top: 20px;">Add</button>
            </form>
        ';

        // Jika ada id_edit, tampilkan data pemilik pada form
        if(isset($_GET['id_edit'])) {
            $id_edit = $_GET['id_edit'];
            // Ambil data pemilik berdasarkan id_edit
            $pemilik = $this->getPemilikById($id_edit);
            // Cek apakah data pemilik ditemukan
            if($pemilik) {
                // Ubah nilai value pada input sesuai dengan data pemilik
                $formContent = '
                    <h1 class="text-center pt-3">Edit Pemilik</h1>
                    <form action="pemilik.php" method="POST">
    <div class="form-row">
        <div class="form-group mt-3">
            <label for="tname">Nama</label>
            <div class="d-flex">
                <input type="text" class="form-control" name="nama" value="' . $pemilik['nama'] . '" required />
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group mt-3">
            <label for="temail">Email</label>
            <input type="email" class="form-control" name="email" value="' . $pemilik['email'] . '" required />
        </div>
    </div>  
    <div class="form-row">
        <div class="form-group mt-3">
            <label for="tnomor_telepon">Nomor Telepon</label>
            <input type="text" class="form-control" name="nomor_telepon" value="' . $pemilik['nomor_telepon'] . '" required />
        </div>
    </div>
    <input type="hidden" name="id" value="' . $id_edit . '" /> <!-- Tambahkan input hidden untuk menyimpan ID pemilik -->
    <button type="submit" name="edit" class="btn btn-primary" style="margin-top: 20px;">Edit</button>
</form>

                ';
            }
        }

        $tpl = new Template("templates/author.html");

        $tpl->replace("OPTION", $dataAuthor);
        $tpl->replace("DATA_TABEL", $dataBuku);
        $tpl->replace("DATA_FORM", $formContent);
        $tpl->write(); 
    }
}

?>
