<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function kegiatanumum(Request $request){
        $now = date('Y-m-d');
        // return view('dashboard_siswa.bukus.index',[
        //     'bukus' => Buku::latest()->get()
        // ]);

        return view('daftarkegiatan1', [
            'events' => Event::latest()->where('date_start', '<=', $now )->where('criteria', 'eksternal' )->paginate(4), ]);
            // 'events' => Event::latest()->get(), ]);
    }

    public function kegiatanpegawai(){
        $now = date('Y-m-d');
        $events = Event::latest()->where('date_start', '<=', $now )
                    ->where('criteria', 'internal' )
                    ->paginate(4);

        return view('daftarkegiatan2', compact('events'));
    }
}
