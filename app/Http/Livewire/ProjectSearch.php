<?php

namespace App\Http\Livewire;

use App\Models\Project;
use App\Models\ProjectConfiguration;

use Livewire\Component;

class ProjectSearch extends Component
{

    public $status;
    public $search;

    public function render()
    {
        $status = $this->status;
        $search = '%'.$this->search . '%';

        //$projects = Project::where('user_id', \Auth::user()->id)->latest()->where('status', $status)->where('title', 'LIKE', $search)->get();
        
        if(!empty($this->status)) {
            $projects = Project::where('user_id', \Auth::user()->id)->latest()->where('status', '=', $status)->where('title', 'LIKE', $search)->get();
        } else {
            $projects = Project::where('user_id', \Auth::user()->id)->latest()->where('title', 'LIKE', $search)->get();
        }
        
        $project_conf = ProjectConfiguration::where('user_id', \Auth::user()->id)->latest()->first();

        return view('livewire.project-search', [
            'projects' => $projects,
            'project_conf' => $project_conf,
        ]);
    }
}
