<?php

namespace App\Http\Controllers;

use App\Services\CommentService;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{
	public function comment(Request $request)
	{
		$postData = $request->all();
		$objValidator = Validator::make(
			$postData,
			[
				'account' => [
					'required',
				],
				'content' => [
					'required',
					'between:5,60',
				],
			],
			[
				'account.required' => '請輸入帳號',
				'content.required' => '請輸入留言內容',
				'content.between' => '留言內容需介於 5-60 字元',
			]
		);
		
		if ($objValidator->fails())
			return response()->json($objValidator->errors()->all(), 400);
		$commentService = new CommentService();
		$newComment = $commentService->comment($postData);
		return response()->json($newComment, 200);
		
		//return response()->json($objValidator->errors()->all(), 200);
	}

	public function getComments(Request $request)
	{
		$commentService = new CommentService();
		$result = $commentService->getComments();
		return response()->json($result, 200);
	}

	public function showComment(Request $request)
	{
		$getData = $request->all();
		$objValidator = Validator::make(
			$getData,
			[
				'comment_id' => [
					'sometimes',
					'integer',
				]
			],
			[
				'comment_id.*' => 'error'
			]
		);
		if ($objValidator->fails())
			return response()->json($objValidator->errors()->all(), 400);
		$commentService = new CommentService();
		$result = $commentService->showComment($getData);
		return response()->json($result, 200);
	}
	public function inquireComment(Request $request)
	{
		$getData = $request->all();
		$objValidator = Validator::make(
			$getData,
			[
				'comment_id' => [
					'sometimes',
					'integer',
				]
			],
			[
				'comment_id.*' => 'error'
			]
		);
		if ($objValidator->fails())
			return response()->json($objValidator->errors()->all(), 400);
		$commentService = new CommentService();
		$result = $commentService->inquireComment($getData);
		return response()->json($result, 200);
	}
	public function editComment(Request $request)
	{
		$postData = $request->all();
		$objValidator = Validator::make(
			$postData,
			[
				'comment_id' => [
					'required',
					'integer',
				],
				'title' => [
					'required',
					'between:5,100',
				],
				'content' => [
					'required',
					'between:5,200',
					// 'regex:/^(([a-z]+[0-9]+)|([0-9]+[a-z]+))[a-z0-9]*$/i'
				],
			],
			[
				'comment_id.*' => 'error',
				'title.required' => '請輸入標題',
				'title.between' => '標題需介於5-100字元',
				'content.required' => '請輸入留言內容',
				'content.between' => '留言內容需介於 5-200 字元',
			]
		);
		if ($objValidator->fails())
			return response()->json($objValidator->errors()->all(), 400);
//        return response()->json($postData, 400);
		//抓出request全部資料
		$commentService = new CommentService();
		$result=$commentService->editComment($postData);
		return response()->json($result, 200);
	}
	public function deleteComment(Request $request){
		$deleteData = $request->all();
		$objValidator = Validator::make(
			$deleteData,
			[
				'comment_id' => [
					'required',
					'integer',
				],
			],
			[
				//'comment_id.*' => 'error',
				'comment_id.required' => 'required',
				'comment_id.integer' => 'integer',
			]
		);
		if ($objValidator->fails())
			return response()->json($objValidator->errors()->all(), 400);
		$commentService = new CommentService();
		$result=$commentService->deleteComment($deleteData);
		return response()->json($result, 200);
	}
}
