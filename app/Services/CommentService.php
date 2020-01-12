<?php
namespace App\Services;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Hash;

class CommentService
{
	public function comment($data)
	{
		/*
		for ($i = 0; $i < 5; $i++) {
		   $data['account'] = "123456";
		   $data['content'] = "test content $i";
		   Comment::create($data);
		}
		*/
		$newComment = Comment::create($data);
		return Comment::select('comments.*', 'name')
		->join('users', 'users.account', 'comments.account')
		->find($newComment->comment_id);
	}

	public function getComments()
	{
		return Comment::select('comments.*', 'name')
		->join('users', 'users.account', 'comments.account')
		// ->orderByDesc('comment_id')
		->get();
	}

	public function showComment($data)
	{
		//array_key_exists("comment_id",$data)
		if (array_key_exists("comment_id", $data)) {
//             Comment::where('comment_id', '<', $data['comment_id'])
//                ->orderByDesc('comment_id')
//                ->take(20)
//                ->get();
			return Comment::select('comments.*', 'name')
			->join('users', 'users.account', 'comments.account')
			->where('comment_id', '<', $data['comment_id'])
			->orderByDesc('comment_id')
			->take(20)
			->get();
			//get(),first()都是抓資料，get()是陣列,first()只抓第一筆
		} else {
			return Comment::select('comments.*', 'name')
			->join('users', 'users.account', 'comments.account')
			->orderByDesc('comment_id')
			->take(20)
			->get();
		}
	}
	public function inquireComment($data)
	{
		if (array_key_exists("comment_id", $data)) {
			return Comment::where('comment_id', $data['comment_id'])
			->orderByDesc('comment_id')
			->take(20)
			->first();
			//get(),first()都是抓資料，get()是陣列,first()只抓第一筆
		} else {
			return '該留言簿不存在';
		}
	}
	public function editComment($data)
	{
		$comment = Comment::find($data['comment_id']);
		if ($comment) {
			if ($comment->account == $data['account']->account) {
				$comment->update(['title' => $data['title'], 'content' => $data['content']]);
				return '留言修改成功';
			} else {
				return '你不能編輯此留言';
			}
		} else
		return '無此留言';
	}
	public function deleteComment($data)
	{
		$comment = Comment::find($data['comment_id']);
		if ($comment) {
			if ($comment->account == $data['account']) {
				$comment->delete();
				return '留言刪除成功';
			} else {
				return '你不能刪除此留言';
			}
		} else
		return '無此留言';
	}
}