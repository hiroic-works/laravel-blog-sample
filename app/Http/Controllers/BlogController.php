<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    /**
     * ブログ一覧を表示する
     *
     * @return view
     */
    public function showList()
    {
        $blogs = Blog::all();
        // dd($blogs);
        return view('blog.list',['blogs' => $blogs]);
    }
    /**
     * ブログ詳細を表示する
     *
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $blog = Blog::find($id);
        // dd($blog);

        // データがなければ
        if(is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('blog.detail',['blog' => $blog]);
    }
    /**
     * ブログ登録画面を表示する
     *
     * @return view
     */
    public function showCreate()
    {
        return view('blog.form');
    }
    /**
     * ブログを登録する
     *
     * @return view
     */
    public function exeStore(BlogRequest $request)
    {
        // $request->all()でフォームで受け取った内容を全部取得
        $inputs = $request->all();
        // dd($inputs);

        // トランザクション開始
        \DB::beginTransaction();
        try {
            // 成功したらブログ登録をする
            Blog::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            // 失敗したら登録されずに例外を投げる
            \DB::rollback();
            abort(500); // 500エラーを返す
            // その他$eを用いてログに残すなど必要な処理をする
        }

        \Session::flash('err_msg', 'ブログを登録しました。');
        return redirect(route('blogs'));
    }
    /**
     * ブログ編集フォームを表示する
     *
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $blog = Blog::find($id);
        // dd($blog);

        // データがなければ
        if(is_null($blog)) {
            \Session::flash('err_msg', 'データがありません。');
            return redirect(route('blogs'));
        }

        return view('blog.edit',['blog' => $blog]);
    }
    /**
     * ブログを更新する
     *
     * @return view
     */
    public function exeUpdate(BlogRequest $request)
    {
        // $request->all()でフォームで受け取った内容を全部取得
        $inputs = $request->all();
        // dd($inputs);

        // トランザクション開始
        \DB::beginTransaction();
        try {
            // 成功したらブログを更新する
            // 該当の投稿を取得
            $blog = Blog::find($inputs['id']);
            // 該当の投稿に更新用の内容を設定
            $blog->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content'],
            ]);
            // 更新する
            $blog->save();
            \DB::commit();
        } catch (\Throwable $e) {
            // 失敗したら登録されずに例外を投げる
            \DB::rollback();
            abort(500); // 500エラーを返す
            // その他$eを用いてログに残すなど必要な処理をする
        }

        \Session::flash('err_msg', 'ブログを更新しました。');
        return redirect(route('blogs'));
    }
}
