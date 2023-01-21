<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core\Models\Core;

/**
 *
 * @author Mr_Kywar mr_kywar@gmail.com
 */
interface AbstractModelInterface {

    const GENERATE_METHOD = "generateNew";

    static public function generateNew();
}
