<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

// use Barryvdh\DomPDF\PDF;

class UserController extends Controller
{
    public function dashboard()
    {
        $iduser = auth()->user()->id;
        $data = DB::table('project')
            ->join('users', 'project.id_user', '=', 'users.id')
            ->where('project.id_user', $iduser)
            ->select('project.*', 'users.name')
            ->get();

        return view('pages.dashboard', [
            'title' => 'Ilmiah | Dashboard',
            'data' => $data
        ]);
    }

    // Makalah

    public function makalah()
    {
        return view('pages.makalah.makalah', [
            'title' => 'Ilmiah | Makalah',
        ]);
    }

    public function pdfExport(Request $request)
    {

        $logo = $request->logo->getClientOriginalName();
        $request->logo->storeAs('public', $logo);

        $filename = $request->filename;
        $format = $request->format;

        $data = [
            'judul' => $request->judulCover,
            'logo' => $request->logo->getClientOriginalName(),
            'dosen' => $request->dosenCover,
            'penyusun' => $request->penyusunCover,
            'footer' => $request->footerCover,
        ];

        if ($format == 'pdf') {
            $pdf = PDF::loadView('pages.makalah.pdf', [
                'data' => $data,
            ])->setPaper('a4', 'portrait');
            return $pdf->stream($filename . '.pdf', $data);
        } else if ($format == 'doc') {
        }
    }


    // lamaran pekerjaan

    public function lamaranPekerjaan()
    {
        return view('pages.lamaranKerja.lamaranKerja', [
            'title' => 'Ilmiah | Lamaran Pekerjaan',
        ]);
    }

    public function lamaranPekerjaanPost(Request $request)
    {
        // dd($request->all());

        // setting pdf
        $data = $request->all();
        $pdf = PDF::loadView('pages.lamaranKerja.lamaranKerjaPdf', [
            'data' => $data,
        ])->setPaper('a4', 'portrait');

        // insert to database
        $filename = 'LamaranPekerjaan' . date('YmdHis') . '.pdf';
        $idUser = $request->idUser;
        DB::table('project')->insert([
            'nama_project' => $filename,
            'id_user' => $idUser,
            'created_at' => now(),

        ]);

        // save to storage
        Storage::put('public/' . $filename, $pdf->output());
        return $pdf->download($filename);
    }


    // download file

    public function downloadFile($file)
    {
        return Storage::download('public/' . $file);
    }

    // delete file

    public function deleteFile($file)
    {
        DB::table('project')->where('nama_project', $file)->delete();
        Storage::delete('public/' . $file);
        return redirect()->back();
    }

    // endClass
}
