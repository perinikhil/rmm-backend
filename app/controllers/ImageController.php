<?php

class ImageController extends \BaseController {

	public function index($projectId)
	{
		$images = Project::find($projectId)->images;

		if(count($images))
			return Response::json($images);
		else
			return Response::json([
				'success' => false,
				'alert' => 'Images'.Messages::$notFound
			]);
	}


	public function store($projectId)
	{
		$destinationPath = app_path() . '/uploads/images';
		$detials = Input::all();
		$details['project_id'] = $projectId;

		if(Input::hasFile('image'))
		{
			$file = Input::file('image');
			$extension = $file->getClientOriginalExtension();
			$fileName = $projectId . '_' . str_random(16) . '.' . $extension;
			$details['path'] = $fileName;
			if(($file->move($destinationPath, $fileName)))
			{
				if(Image::create($details))
				{
					return Response::json([
						'success' => true,
						'alert' => Messages::$createSuccess.'image'
					]);
				}
				else
				{
					File::delete($destinationPath.$fileName);
					return Response::json([
						'success' => false,
						'alert' => Messages::$createFail.'image'
					]);
				}
			}
			else
			{
				return Response::json([
					'success' => false,
					'alert' => Messages::$uploadFail.'image'
				]);
			}
		}
		else
		{
			return Response::json([
				'success' => false,
				'alert' => 'Image'.Messages::$notFound
			]);
		}
	}


	public function destroy($projectId, $imageId)
	{
		$image = Image::find($imageId);
		$destinationPath = app_path() . '/uploads/images/';
		if($image->project_id == $projectId)
		{
			if(Image::destroy($imageId))
			{
				File::delete($destinationPath.$image->path);
				return Response::json([
					'success' => true,
					'alert' => Messages::$deleteSuccess.'image'
				]);
			}
			else
			{
				return Response::json([
					'success' => false,
					'alert' => Messages::$deleteFail.'image']);
			}
		}
	}


	// public function show($projectId, $imageId)
	// {
	// 	//
	// }
	//
	//
	// public function update($projectId, $imageId)
	// {
	// 	//
	// }
}
