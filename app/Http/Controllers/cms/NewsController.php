<?php

namespace App\Http\Controllers\cms;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class NewsController extends CmsController
{
    public function index(){
        $this->data('title',$this->makeTitle('news'));
        $this->data('newsData',News::orderBy('id','desc')->get());;
        return view($this->pagePath.'news.show_news',$this->data);
    }

    public function addNews(Request $request){
        if ($request->isMethod('get')){
            $this->data('title',$this->makeTitle('add_news'));
            return view($this->pagePath.'news.add_news',$this->data);
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
                'title' =>'required|min:5|unique:news,title',
                'description' =>'required|min:3',
                'category' =>'required',
                'status' =>'required',
                'upload' =>'required|mimes:jpg,jpeg,png,gif|max:2000',
            ]);
            $data['title'] = $request->title;
            $data['description'] = $request->description;
            $data['status'] = $request->status;
            $data['news_category'] = $request->category;
            if($request->hasFile('upload')){
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $uploadPath = public_path('uploads/images/news/');
                if (!$image->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }
                $data['image'] = $imageName;

            }
            if(News::create($data)){
                return redirect()->route('show_news')->with('success','information was successfully inserted');
            }
            else{
                return redirect()->back();
            }
        }

    }

    public function editNews(Request $request){
        $this->data('title',$this->makeTitle('edit_news'));
        $criteria = $request->user_id;
        $newsData =News::findorFail($criteria);
        return view($this->pagePath.'news.edit_news',compact('newsData'),$this->data);


    }

    public function deleteWithImage($id){
        $criteria = $id;
        $findData= News::findorFail($criteria);
        $image = $findData->image;
        $deletePath = public_path('uploads/images/news/'.$image);
        if (file_exists($deletePath) && is_file($deletePath)){
            return unlink($deletePath);
        }
        return true;

    }
    public function deleteNews(Request $request){
        $criteria = $request->user_id;
        if ($this->deleteWithImage($criteria) && $findData = News::where('id',$criteria)->delete() ){
            return redirect()->route('show_news')->with('success','information was successfully deleted');
        }
        return false;

    }
    public function editNewsAction(Request $request){
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->user_id;
            $news = News::find($criteria);
            $this->validate($request, [
                'title' => 'required|min:3',
                'description' => 'required|',
                'category' => 'required',
                'status' => 'required',
                'upload' => 'mimes:jpeg,jpg,png,gif|max:1000',
            ]);
            $news->title = $request->title;
            $news->description = $request->description;
            $news->news_category = $request->category;
            $news->status = $request->status;
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $uploadPath = public_path('uploads/images/news');
                $makeImage = Image::make($image);
                $saveImage = $makeImage->resize(500, null, function ($asp) {
                    $asp->aspectRatio();
                })->crop(300, 200)->save($uploadPath . '/' . $imageName);

                if ($this->deleteWithImage($criteria) && $saveImage) {
                    $news->image = $imageName;
                }

            }
            if($news->save()) {
                return redirect()->route('show_news')->with('success','information was updated successfully');
            }

        }

    }

    public function updateActiveStatus(Request $request){
        $criteria = $request->user_id;
        $news = News::findOrFail($criteria);
        $status = $news->status;
        if(isset($status)){
            $news->status = 1;
        }
        if($news->save()){

            return redirect()->route('show_news')->with('success','status was changed');

        }
    }

    public function updateInActiveStatus(Request $request){
        $criteria = $request->user_id;
        $news = News::findOrFail($criteria);
        $status = $news->status;
        if(isset($status)){
            $news->status = 0;
        }
        if($news->save()){

            return redirect()->route('show_news')->with('success','status was changed');

        }
    }

}
