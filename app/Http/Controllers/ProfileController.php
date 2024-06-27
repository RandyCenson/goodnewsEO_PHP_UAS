<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{DB, Hash, Storage};
use Illuminate\Contracts\Support\ValidatedData;

// Mendefinisikan class ProfileController yang merupakan controller
class ProfileController extends Controller
{
    // Metode untuk menampilkan profil pengguna
    public function myProfile()
    {
        $title = "My Profile"; // Menyimpan judul halaman

        return view('/profile/my_profile', compact("title")); // Mengirim data ke view
    }

    // Metode untuk menampilkan form edit profil
    public function editProfileGet()
    {
        $title = "Edit Profile"; // Menyimpan judul halaman

        return view("/profile/edit_profile", compact("title")); // Mengirim data ke view
    }

    // Metode untuk menangani permintaan POST untuk mengedit profil
    public function editProfilePost(Request $request, User $user)
    {
        // Mendefinisikan aturan validasi
        $rules = [
            'fullname' => 'required|max:255',
            'phone' => 'required|numeric',
            'address' => 'required',
        ];

        // Mengecek apakah username berubah
        if (auth()->user()->username != $request->username) {
            $rules['username'] = 'required|max:15|unique:users,username';
        } else {
            $rules['username'] = 'required|max:15';
        }

        // Mengecek apakah ada file gambar yang diupload
        if ($request->file("image")) {
            $rules["image"] = "image|file|max:2048";
        }

        // Memvalidasi data yang dikirim dalam request
        $validatedData = $request->validate($rules);

        try {
            // Jika ada file gambar yang diupload
            if ($request->file("image")) {
                // Menghapus gambar lama jika bukan gambar default
                if ($request->oldImage != env("IMAGE_PROFILE")) {
                    Storage::delete($request->oldImage);
                }

                // Menyimpan gambar baru
                $validatedData["image"] = $request->file("image")->store("profile");
            }

            // Mengisi ulang data pengguna dengan data yang divalidasi
            $user->fill($validatedData);

            // Mengecek apakah ada perubahan pada data pengguna
            if ($user->isDirty()) {
                $user->save(); // Menyimpan perubahan

                $message = "Your profile has been updated!"; // Pesan sukses

                // Menampilkan pesan sukses menggunakan custom flasher
                myFlasherBuilder(message: $message, success: true);
                return redirect("/home");
            } else {
                $message = "Action <strong>failed</strong>, no changes detected!"; // Pesan gagal

                // Menampilkan pesan gagal menggunakan custom flasher
                myFlasherBuilder(message: $message, failed: true);
                return redirect("/profile/edit_profile");
            }
        } catch (Exception $exception) {
            return abort(500); // Mengembalikan halaman kesalahan 500 jika terjadi kesalahan
        }
    }

    // Metode untuk menampilkan form ganti password
    public function changePasswordGet()
    {
        $title = "Change Password"; // Menyimpan judul halaman

        return view("/profile/change_password", compact("title")); // Mengirim data ke view
    }

    // Metode untuk menangani permintaan POST untuk mengganti password
    public function changePasswordPost(Request $request)
    {
        // Memvalidasi data yang dikirim dalam request
        $validated = $request->validate([
            "current_password" => "required|min:4",
            "password" => "required|confirmed|min:4",
            "password_confirmation" => "required|min:4",
        ]);

        // Mengecek apakah password saat ini sesuai dengan password yang disimpan
        if (!(Hash::check($request->current_password, auth()->user()->password))) {
            $message = "Current password is wrong!"; // Pesan kesalahan

            // Menampilkan pesan kesalahan menggunakan custom flasher
            myFlasherBuilder(message: $message, failed: true);
            return back();
        } else if ($request->current_password == $request->password) {
            $message = "Current password cannot be the same as new password!"; // Pesan kesalahan

            // Menampilkan pesan kesalahan menggunakan custom flasher
            myFlasherBuilder(message: $message, failed: true);
            return back();
        }

        // Mengupdate password pengguna
        User::where('id', auth()->user()->id)
            ->update(['password' => Hash::make($validated['password'])]);

        $message = "Password has been updated"; // Pesan sukses

        // Menampilkan pesan sukses menggunakan custom flasher
        myFlasherBuilder(message: $message, success: true);
        return redirect("/home");
    }
}
