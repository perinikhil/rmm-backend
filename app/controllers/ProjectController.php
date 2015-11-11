<?php

class ProjectController extends \BaseController {

	public function index()
	{
		$projects = Project::all();

		if(count($projects))
			return Response::json($projects);
		else
			return Response::json([
				'success' => false,
				'alert' => 'Projects'.Messages::$notFound
				]);
	}


	public function store()
	{
		$details = Input::all();
		if($project = Project::create($details))
		{
			return Response::json([
				'project' => $project,
				'alert' => Messages::$createSuccess.'project'
			]);
		}
		else {
			return Response::json([
				'success' => false,
				'alert' => Messages::$createFail.'project'
			]);
		}
	}


	public function show($id)
	{
		$projects = Project::find($id);

		if($projects)
			return Response::json($projects);
		else
			return Response::json([
				'success' => false,
				'alert' => 'Projects'.Messages::$notFound
				]);
	}


	public function update($id)
	{
		$project = Project::find($id);
		$details = Input::all();
		if($project)
		{
			if($project->update($details))
			{
				return Response::json([
					'project' => $project,	//Project::find($id)?
					'alert' => Messages::$updateSuccess.'project'
				]);
			}
			else {
				return Response::json([
					'success' => false,
					'alert' => Messages::$updateFail.'project'
				]);
			}

		}
		else
			return Response::json([
				'success' => false,
				'alert' => 'Projects'.Messages::$notFound
				]);
	}


	public function destroy($id)
	{
		if(Project::destroy($id))
			return Response.json(Messages::$deleteSuccess.'Project');
		else
			return Messages::$deleteFail.'Project';


	}
}
