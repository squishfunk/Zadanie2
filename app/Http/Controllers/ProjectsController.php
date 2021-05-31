<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use App\Models\Project;
// use App\Models\Project_group;
// use App\Models\Project_group_campaign;

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
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active')
                ->where('projects.active', '1')
                ->paginate(20)
                ->appends('active', request('active'));
        } elseif (request('active') == '2') {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active')
                ->where('projects.active', '2')
                ->paginate(20)
                ->appends('active', request('active'));
        } elseif (request('active') == '0') {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active')
                ->where('projects.active', '0')
                ->paginate(20)
                ->appends('active', request('active'));
        } else {
            $projects = DB::table('projects')
                ->join('project_groups', 'project_groups.project_id', '=', 'projects.id')
                ->join('project_group_campaigns', 'project_group_campaigns.project_group_id', '=', 'project_groups.id')
                ->select('projects.name as projectName', 'project_groups.name as project_groupName', 'project_group_campaigns.name as project_group_campaignsName', 'projects.website', 'projects.active')
                ->paginate(20);
        }

        return dd($projects);
        // return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
