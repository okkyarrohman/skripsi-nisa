<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CppController extends Controller
{
    public function runCpp(Request $request)
    {
        $cpp_code = $request->input('cpp_code');

        // Simpan kode C++ ke dalam file
        $file_path = storage_path('app/cpp_code.cpp');
        file_put_contents($file_path, $cpp_code);

        // Jalankan kode C++ menggunakan g++ compiler
        $output = shell_exec("g++ -o " . storage_path('app/cpp_executable') . " $file_path 2>&1");

        // Periksa apakah ada kesalahan dalam kompilasi
        if ($output) {
            return response()->json(['error' => $output]);
        }

        // Jalankan executable C++ dan ambil outputnya
        $output = shell_exec(storage_path('app/cpp_executable'));

        return response()->json(['output' => $output]);
    }
}
