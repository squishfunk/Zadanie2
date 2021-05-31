<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Project_group;
use App\Models\Project_group_campaign;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request('active') == '1') {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.id')
                ->where('projects.active', '1')
                ->paginate(20)
                ->appends('active', request('active'));
        } elseif (request('active') == '2') {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.id')
                ->where('projects.active', '2')
                ->paginate(20)
                ->appends('active', request('active'));
        } elseif (request('active') == '0') {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.id')
                ->where('projects.active', '0')
                ->paginate(20)
                ->appends('active', request('active'));
        } else {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.id')
                ->paginate(20);
        }

        // return dd($projects);
        return view('projects.index', ['projects' => $projects]);
    }

    public function edit($id)
    {
        $project = DB::table('projects')
            ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
            ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
            ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.date_start', 'project_group_campaigns.id')
            ->where('project_group_campaigns.id', "=", $id)
            ->get();

        // return dd($project[0]);
        return view('projects.edit', ['project' => $project[0]]);
    }

    public function update($id)
    {
        DB::table('projects')
            ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
            ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
            //->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.date_start', 'project_group_campaigns.id')
            ->where('project_group_campaigns.id', "=", $id)
            ->update([
                "projects.name" => request('name'),
                "project_groups.name" => request('groupName'),
                "project_group_campaigns.name" => request('campaignName'),
                "website" => request('address'),
                "active" => request('active'),
                "date_start" => request('date'),
            ]);

        return redirect('/projekty');
    }

    public function destroy($id)
    {
        DB::table('projects')
            ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
            ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
            ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active', 'project_group_campaigns.date_start', 'project_group_campaigns.id')
            ->where('project_group_campaigns.id', "=", $id)
            ->delete();
        return redirect("/projekty");
    }
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'website' => 'required',
        ]);

        Project::create([
            'active' => request('active'),
            'website' => request('website'),
            'name' => request('name'),
        ]);

        return redirect('/projekty');
    }
}
