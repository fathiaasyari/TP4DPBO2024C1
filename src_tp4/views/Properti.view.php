<?php
class PropertiView{
    public function render($data){
        $no = 1;
        $dataProperti = null;
        foreach($data['properti'] as $val){
            list($id, $jenis, $nama, $status_kepemilikan, $id_pemilik) = $val;
            $dataProperti .= "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $jenis . "</td>
                                <td>" . $nama . "</td>
                                <td>" . $status_kepemilikan . "</td>
                                <td>" . $id_pemilik . "</td>
                                <td>
                                    <a href='properti.php?id_edit=" . $id .  "' class='btn btn-warning'>Edit</a>
                                    <a href='properti.php?id_hapus=" . $id . "' class='btn btn-danger'>Hapus</a>
                                </td>
                            </tr>";
        }

        $tpl = new Template("templates/index.html");
        $tpl->replace("DATA_TABEL", $dataProperti);
        $tpl->write();
    }
}
