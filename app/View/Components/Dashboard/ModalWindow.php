<?php

namespace App\View\Components\Dashboard;

use Illuminate\View\Component;

class ModalWindow extends Component
{
    public string $name;
    public string $id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.dashboard.modal-window');
    }
}
