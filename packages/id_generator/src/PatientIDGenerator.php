<?php

namespace App\Packages\PatientIDGenerator;

use App\Models\Patients;

/**
 * Return functions to generate new ordered ids for a new patient
 */

class PatientIDGenerator
{
    protected $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    protected $numbers = "0123456789";
    /**
     * 
     *
     * Generate a new opd number for a new patient
     *
     * @param null null
     * @return string New Patient ID
     **/
    public function generateId()
    {
        $lastId = $this->getLastGeneratedId();
        if ($lastId == null) {
            // If there's no last used ID, start from the beginning
            $charPart = substr($this->characters, 0, 3);
            $numPart = substr($this->numbers, 0, 4);
        } else {
            $charPart = substr($lastId, 0, 3);
            $numPart = substr($lastId, 3, 4);

            // Increment the number part
            $numPart++;
            if ($numPart > 9999) {
                $numPart = 0;

                // If the number part has reached its maximum, increment the character part
                $charIndex = 0;
                for ($i = 2; $i >= 0; $i--) {
                    $char = $charPart[$i];
                    $charIndex = strpos($this->characters, $char);
                    if ($charIndex < strlen($this->characters) - 1) {
                        $charPart[$i] = $this->characters[$charIndex + 1];
                        break;
                    } else {
                        $charPart[$i] = $this->characters[0];
                    }
                }
            }
        }

        return $charPart . str_pad($numPart, 4, '0', STR_PAD_LEFT);
    }

    /**
     * get the last generated id
     *
     * @param null null
     * @return string the last patient id
     * @throws NotFound Error
     **/
    public function getLastGeneratedId()
    {
        $id = Patients::latest()->first();
        if ($id == null) return "AAA0000";
        return  $id->opd_no;
    }
}
