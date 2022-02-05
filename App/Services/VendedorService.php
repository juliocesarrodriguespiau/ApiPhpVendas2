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

    }

    public function update() 
    {

    }

    public function delete() 
    {

    }
}
