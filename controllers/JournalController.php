<?php

namespace App\Controllers;

use App\Providers\View;
use App\Models\Journal;

class JournalController
{
   public function index()
   {
      $journal = new Journal;
      $select = $journal->select('created_at', 'DESC');

      if ($select) {
         return View::render('journal/index', ['journal_de_bord' => $select]);
      } else {
         return View::render('error');
      }
   }
}
