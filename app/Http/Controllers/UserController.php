<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        
        return view('user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(User::$rules);
        if ($request->hasFile('profile_photo_path')) {
            $imagen = $request->file('profile_photo_path');
            $mime_tipe = $imagen->getMimeType();
            if (!in_array($mime_tipe,['image/jpeg' ,'image/jpg', 'image/png'])) {
                return redirect(route('users.index'))->with('error', 'El Formato De La Imagen Debe Ser JPEG, JPG o PNG');
            }
            $nombre =$imagen->getClientOriginalName();
            $ruta = "imagenes/users/";
            $subida = $imagen->move($ruta,$nombre);
        }
        $user = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'profile_photo_path' => $subida,
            'description' => $request->description,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'dribbble_url' => $request->dribbble_url,
            'description' => $request->linkedin_url,
            'phone' => $request->phone,
            'address' => $request->address,
            'url_cv' => $request->url_cv,
            'password' => $request->password
        ]);
                $user->save();
          
        

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);
        $request->validate([
            'imagen' => 'nullable',
        ]);
        if ($request->hasFile('imagNew')) {
            $imagen = $request->file('imagNew');
            $mime_tipe = $imagen->getMimeType();
            if (!in_array($mime_tipe,['image/jpeg' ,'image/jpg', 'image/png'])) {
                return redirect(route('productos.index'))->with('error', 'El Formato De La Imagen   No Es Valido');
            }
            $ruta = "imagenes/users/";
            $subida = $imagen->move($ruta);
            unlink($user->profile_photo_path);
            $user->profile_photo_path = $subida;
        } else {
            $user->profile_photo_path = $user->profile_photo_path;
        }
        $user->update([
            'name' => $request->name,
            'email' =>  $request->email,
            'profile_photo_path' => $user->profile_photo_path,
            'description' => $request->description,
            'facebook_url' => $request->facebook_url,
            'twitter_url' => $request->twitter_url,
            'dribbble_url' => $request->dribbble_url,
            'description' => $request->linkedin_url,
            'phone' => $request->phone,
            'address' => $request->address,
            'url_cv' => $request->url_cv,
            'password' => $request->password
        ]);
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
