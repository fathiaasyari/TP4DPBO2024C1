<?php

class Properti extends DB
{
    function getProperti()
    {
        $query = "SELECT * FROM properti";
        return $this->execute($query);
    }

    function add($data)
    {
        $jenis = $data['jenis'];
        $nama = $data['nama_properti'];
        $status_kepemilikan = $data['status_kepemilikan'];
        $id_pemilik = $data['id_pemilik'];

        $query = "INSERT INTO properti (jenis, nama_properti, status_kepemilikan, id_pemilik) VALUES ('$jenis', '$nama', '$status_kepemilikan', '$id_pemilik')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM properti WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function status($id)
    {
        $status = "Best Seller";
        $query = "UPDATE properti SET status_kepemilikan = '$status' WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}

?>
