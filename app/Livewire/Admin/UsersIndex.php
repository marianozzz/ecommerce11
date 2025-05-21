<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;


use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme="bootstrap";
    public $search;
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
       // $usuarios = User::paginate(1);
   //    if($this->search)
   //    {
         $usuarios = User::where('name','LIKE', '%' . $this->search . '%')->paginate(10); // Paginación para una mejor visualización
    /*   }
       else
       {
         $usuarios = User::paginate(10); 
       }*/
      
       return view('livewire.admin.users-index', compact('usuarios'));
    }
}
