<?php

class Pemilik extends DB
{
    function getPemilik()
    {
        $query = "SELECT * FROM pemilik";
        
        return $this->execute($query);
    }

    function getPemilikById($id)
    {
        $query = "SELECT * FROM pemilik WHERE id_pemilik = '$id'";
        
        return $this->execute($query);
    }

    function addPemilik($data)
    {
        $name = $data['nama'];
        $email = $data['email'];
        $nomor_telepon = $data['nomor_telepon'];

        $query = "insert into pemilik values ('', '$name', '$email', '$nomor_telepon')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM pemilik WHERE id_pemilik = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function statusPemilik($id)
    {

        $status = "Senior";
        $query = "update pemilik set status = '$status' where id_pemilik = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
