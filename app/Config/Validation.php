<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    public $formularioProductos=[

        'producto'=>'required',
        'foto'=>'required',
        'precio'=>'required',
        'descripcion'=>'required',
        'tipoAnimal'=>'required'
    ];

    public $formularioEdicion=[
        'precio'=>'required'
    ];

    public $formularioAnimales=[

        'nombre'=>'required',
        'foto'=>'required',
        'edad'=>'required',
        'descripcion'=>'required',
        'tipoAnimal'=>'required'
    ];

    public $formularioEdicionAnimal=[
        'edad'=>'required'
    ];
    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
}
