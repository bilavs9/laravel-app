<?php

namespace App\Http\Controllers\cms;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends CmsController
{
    public function index(){
        $this->data('title',$this->makeTitle('menu'));
        $this->data('menuData',Menu::orderBy('id','desc')->get());
        return view($this->pagePath.'menu.show_menu',$this->data);
    }

   public function addMenu(Request $request){
        if ($request->isMethod('get')){
            $this->data('title',$this->makeTitle('add_menu'));
            return view($this->pagePath.'menu.add_menu',$this->data );
        }
        if ($request->isMethod('post')){
            $this->validate($request,[
               'menu_name' =>'required|max:20',
            ]);
            $data['menu_name']= $request->menu_name;

            if(Menu::create($data)){
                return redirect()->route('show_menu')->with('success','Menu was successfully created');
            }


        }
   }


   public function editMenu(Request $request){
       $this->data('title',$this->makeTitle('edit_menu'));
       $criteria = $request->user_id;
       $galleryData =Menu::findorFail($criteria);
       return view($this->pagePath.'menu.edit_menu',compact('galleryData'),$this->data);

   }

   public function editMenuAction(Request $request){
        if ($request->isMethod('get')){
         return redirect()->back();
        }
       if ($request->isMethod('post')){
            $criteria = $request->user_id;
            $menus = Menu::find($criteria);
            $this->validate($request,[
               'menu_name' => 'required|max:30'
            ]);
       }
       $menus->menu_name = $request->menu_name;

        if($menus->save()){
            return redirect()->route('show_menu')->with('success','menu was successfully updated');
        }

   }

   public  function deleteMenu(Request $request){
        $criteria = $request->user_id;
        $findMenu = Menu::where('id',$criteria)->delete();
        if($findMenu){
            return redirect()->route('show_menu')->with('success','menu was successfully deleted');
        }
        return false;

   }
}
