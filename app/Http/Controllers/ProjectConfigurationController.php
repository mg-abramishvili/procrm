<?php

namespace App\Http\Controllers;

use App\Models\ProjectConfiguration;
use Illuminate\Http\Request;

class ProjectConfigurationController extends Controller
{
    public function update(Request $request)
    {
        $data = request()->all();
        $project_conf = ProjectConfiguration::find($data['id']);
        $project_conf->index_table_budget_column = $data['index_table_budget_column'];
        $project_conf->user_id = \Auth::user()->id;
        $project_conf->save();
        return redirect('/projects');
    }
}
