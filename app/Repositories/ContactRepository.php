<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository
{

    public function getContactDetail($id){
      
        return Contact::find($id);
    }

    public function ContactDestoy($id){
      
        return Contact::find($id);
    }
}


