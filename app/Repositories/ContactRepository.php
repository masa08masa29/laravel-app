<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;


class ContactRepository
{
    public function getContactList()
    {
      $contact_list_query = Contact::latest()->get();  
      //dd($contact_list_query);
      
      return $contact_list_query;
    }

    public function getContactDetail($id)
    {
        $data=Contact::find($id);
        //dd($data);

        return $data;
    }
}


