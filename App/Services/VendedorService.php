<?php

namespace App\Services;

use App\Models\Vendedor;

class VendedorService
{
    public function get($id = null) 
    {
        if ($id) {
            return Vendedor::getVendedor($id);
        } else {
            return Vendedor::getVendedores();
        }
    }

    public function post() 
    {
        $data = $_POST;

        return Vendedor::insert($data);
    }
    
    public function delete($id) 
    {
        if ($id) {
            return Vendedor::deleteVendedor($id);
        }

    }
}
