<?php

namespace App\View\Components\Common\AboutUs;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class OurTeam extends Component
{

    public $images=[];

    public function __construct()
    {
        $this->images = Storage::disk("public")->files('images/team');
    }

    public function render()
    {
        return view('components.common.about-us.our-team');
    }
}
