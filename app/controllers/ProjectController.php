<?php

class ProjectController extends \BaseController {

	public function index()
	{
		$projects = Project::all();

		if(count($projects))
    {
      foreach($projects as $project)
      {
        $project->image = $project->images()->first();
      }
      return Response::json($projects);
    }
		else
			return Response::json([
				'alert' => 'Projects'.Messages::$notFound
			], 404);
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
				'alert' => Messages::$createFail.'project'
			], 400);
		}
	}


	public function show($id)
	{
		$project = Project::find($id);

		if($project)
    {
      $project->images = $project->images;
      return Response::json($project);
    }
		else
			return Response::json([
				'alert' => 'Projects'.Messages::$notFound
			], 404);
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
					'project' => $project,
					'alert' => Messages::$updateSuccess.'project'
				]);
			}
			else {
				return Response::json([
					'alert' => Messages::$updateFail.'project'
				], 400);
			}

		}
		else
			return Response::json([
				'alert' => 'Projects'.Messages::$notFound
			], 400);
	}


	public function destroy($id)
	{
		if(Project::destroy($id))
			return Response::json(Messages::$deleteSuccess.'Project');
		else
			return Response::json(Messages::$deleteFail.'Project', 400);
	}
}
