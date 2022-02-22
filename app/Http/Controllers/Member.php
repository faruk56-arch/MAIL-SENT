<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Member extends Controller
{
    function memberIndex(Request $request)
    {
        if ($request->isMethod('post')) {

            $title = $request->input('title');
            $description = $request->input('description');
            $category = $request->input('category');
            $paragraph = $request->input('paragraph');
            $updated_at = date('Y-m-d H:i:s');
            
            DB::insert('insert into posts (title, description, category, paragraph,updated_at) values (title, description, category, paragraph, updated_at)', [$title, $description, $category, $paragraph, $updated_at]);


            $categoryDelete = $request->input('categorydelete');
            $categoryupdate = $request->input('categoryupdate'); // choix de la catégorie

            if ($categoryupdate != null) {
                DB::table('posts')->where('category', $categoryupdate)->update(['category' =>  $request->input('categoryName')]);
            }

            if ($categoryDelete != null) {
                DB::table('posts')->where('category', $categoryDelete)->delete();
            }
        }


        $category = DB::table('posts')->get();
        return view('welcome', ['categorys' => $category]);
    }
}

































//$category = DB::table('posts')->get();

        //recuperer les infos de BDD
        // return DB::table("members")->count();

// $posts = DB::table('posts')->get();
        // return view('member', ['posts' => $posts]);
         //afficher un seul champs de html
        // $category = DB::table('posts')
        //     ->where('category', "Bangla")
        //     ->get();
        // DB::table('posts')->where('id', 2)->delete()
