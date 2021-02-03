<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\ProjectConfiguration;

use Livewire\Component;

class ProjectSearch extends Component
{

    public $search;

    public function render()
    {
        $search = '%'.$this->search . '%';
        $projects = Project::where('user_id', \Auth::user()->id)->where('title', 'LIKE', $search)->get();
        
        $project_conf = ProjectConfiguration::where('user_id', \Auth::user()->id)->latest()->first();
        $projects_active = Project::where('user_id', \Auth::user()->id)->where('status', 'active')->latest()->paginate(200);

        return view('livewire.project-search', [
            'projects' => $projects,
            'project_conf' => $project_conf,
            'projects_active' => $projects_active,
        ]);
    }
}
