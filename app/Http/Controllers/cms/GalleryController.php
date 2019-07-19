<?php

namespace App\Http\Controllers\cms;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GalleryController extends CmsController
{
    public function index()
    {
        $this->data('title', $this->makeTitle('gallery'));
        $this->data('galleryData', Gallery::orderBy('id', 'desc')->get());
        return view($this->pagePath . 'gallery.show_gallery', $this->data);
    }

    public function addGallery(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->data('title', $this->makeTitle('add_gallery'));
            return view($this->pagePath . 'gallery.add_gallery', $this->data);
        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'caption' => 'required|max:50',
                'upload' => 'required|mimes:jpg,jpeg,png,gif',
            ]);
            $data['caption'] = $request->caption;
            if ($request->hasFile('upload')) {
                $data['user_id'] = Auth::user()->id;
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $uploadPath = public_path('uploads/images/gallery/');
                if (!$image->move($uploadPath, $imageName)) {
                    return redirect()->back();
                }
                $data['image_name'] = $imageName;
            }
            if (Gallery::create($data)) {
                return redirect()->route('show_gallery')->with('success', 'image was uploaded successfully');
            }


        }

    }


    public function editGallery(Request $request)
    {
        $this->data('title', $this->makeTitle('edit_gallery'));
        $criteria = $request->user_id;
        $galleryData = Gallery::findorFail($criteria);
        return view($this->pagePath . 'gallery.edit_gallery', compact('galleryData'), $this->data);
    }

    public function deleteWithImage($id)
    {
        $criteria = $id;
        $findData = Gallery::findorFail($criteria);
        $image = $findData->image_name;
        $deletePath = public_path('uploads/images/gallery/' . $image);
        if (file_exists($deletePath) && is_file($deletePath)) {
            return unlink($deletePath);
        }
        return true;

    }

    public function deleteGallery(Request $request)
    {
        $criteria = $request->user_id;
        if ($this->deleteWithImage($criteria) && $findData = Gallery::where('id', $criteria)->delete()) {
            return redirect()->route('show_gallery')->with('success', 'information was successfully deleted');
        }
        return false;

    }

    public function editGalleryAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }
        if ($request->isMethod('post')) {
            $criteria = $request->user_id;
            $gallery = Gallery::find($criteria);
            $this->validate($request, [
                'caption' => 'required|max:50',
                'upload' => 'mimes:jpg,jpeg,png,gif',
            ]);
            $gallery->caption = $request->caption;
            if ($request->hasFile('upload')) {
                $gallery->user_id = Auth::user()->id;
                $image = $request->file('upload');
                $ext = $image->getClientOriginalExtension();
                $imageName = str_random() . '.' . $ext;
                $uploadPath = public_path('uploads/images/gallery/');
                if ($this->deleteWithImage($criteria) && $image->move($uploadPath, $imageName)) {
                    $gallery->image_name = $imageName;
                }

                }
                if($gallery->save()){
                return redirect()->route('show_gallery')->with('success','image was updated successfully');
                }

        }
    }
}
