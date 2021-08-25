<?php

namespace App\Soap\Types;


class Interconsulta
{
    /**
     * @var int
     */
    public $id = 1;

    /**
     * @var string
     */
    public $patientName;

    /**
     * @var string
     */
    public $specialtyName;

    /**
     * @var string
     */
    public $organizationName;

    /**
     * Interconsulta constructor.
     *
     * @param int $id
     * @param string $patientName
     * @param string $specialtyName
     * @param string $organizationName
     */
    public function __construct($id, $patientName = '', $specialtyName = '', $organizationName = '')
    {
        $this->id = $id;
        $this->patientName = $patientName;
        $this->specialtyName = $specialtyName;
        $this->organizationName = $organizationName;
    }

}
