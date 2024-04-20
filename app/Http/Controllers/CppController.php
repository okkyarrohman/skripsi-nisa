<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CppController extends Controller
{
    public function runCpp(Request $request)
    {
        $prog_lang = $request->input('prog_lang');
        $cpp_code = $request->input('cpp_code');

        if ($prog_lang == 'java') {
            $file_path = storage_path('app/Main.java');
            file_put_contents($file_path, $cpp_code);
            $output = shell_exec("javac $file_path 2>&1");

            if ($output) {
                $output = 'Terjadi Error tolong periksa kembali kode anda!';
                return back()->with(compact('output', 'cpp_code'));
            }

            $output = shell_exec("java -cp " . storage_path('app') . " Main");

            return back()->with(compact('output', 'cpp_code'));
        } else if ($prog_lang == 'cpp') {
            // Simpan kode C++ ke dalam file
            $file_path = storage_path('app/cpp_code.cpp');
            file_put_contents($file_path, $cpp_code);

            // Jalankan kode C++ menggunakan g++ compiler
            $output = shell_exec("g++ -o " . storage_path('app/cpp_executable') . " $file_path 2>&1");

            // Periksa apakah ada kesalahan dalam kompilasi
            if ($output) {
                $output = 'Terjadi Error tolong periksa kembali kode anda!';
                return back()->with(compact('output', 'cpp_code'));
            }

            // Jalankan executable C++ dan ambil outputnya
            $output = shell_exec(storage_path('app/cpp_executable'));

            // return view('murid.tugas.show', compact('output', 'cpp_code', 'tugases'));
            return back()->with(compact('output', 'cpp_code'));
        }
    }
}
