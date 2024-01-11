<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::where('id_user', Auth::user()->id)->get();
        return view('berita.index', ['data' => $data]);
    }

    public function add(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'short_description' => 'required',
                'image' => 'required',
                'tag' => 'required'
            ], [
                'title.required' => 'Judul Harus Diisi.',
                'description.required' => 'Deskripsi Harus Diisi.',
                'short_description.required' => 'Deskripsi Pendek Harus Diisi.',
                'image.required' => 'Gambar Harus Diisi.',
                'tag.required' => 'Tag Harus Diisi.',
            ]);
            $data = new Berita();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->short_description = $request->short_description;
            $profile_image = "profile_" . rand(0, 99999) . "." . $request->image->extension();
            $request->image->move(public_path('assets/profile'), $profile_image);
            $data->image = $profile_image;
            $data->id_user = Auth::user()->id;
            $data->tag = $request->tag;
            $data->save();

            return response()->json([
                'msg' => 'Data Found Success',
            ],200);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();
            return response()->json(['errors' => $errors], 500);
        }
    }

    public function edit($id) {
        $data = Berita::find($id);
        $tagss = explode(',', $data->tag);
        $data->setAttribute('tags', $tagss);
        return response()->json([
            'msg' => 'Data Found Success',
            'data' => $data
        ],200);
    }

    public function delete($id) {
        $data = Berita::find($id)->delete();
        return response()->json([
            'msg' => 'Data Delete Success',
        ],200);
    }
    
    public function update($id, Request $request)
    {
        try {
            $request->validate([
                'title_edit' => 'required',
                'description_edit' => 'required',
                'short_description_edit' => 'required',
                'tag_edit' => 'required'
            ], [
                'title_edit.required' => 'Judul Harus Diisi.',
                'description_edit.required' => 'Deskripsi Harus Diisi.',
                'short_description_edit.required' => 'Deskripsi Pendek Harus Diisi.',
                'tag_edit.required' => 'Tag Harus Diisi.',
            ]);
            $data = Berita::find($id);
            $data->title = $request->title_edit;
            $data->description = $request->description_edit;
            $data->short_description = $request->short_description_edit;
            if($request->image_edit) {
                $profile_image = "profile_" . rand(0, 99999) . "." . $request->image_edit->extension();
                $request->image_edit->move(public_path('assets/profile'), $profile_image);
                $data->image = $profile_image;
            }
            $data->id_user = Auth::user()->id;
            $data->tag = $request->tag_edit;
            $data->save();

            return response()->json([
                'msg' => 'Data Update Success',
            ],200);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();
            return response()->json(['errors' => $errors], 500);
        }
    }
}
