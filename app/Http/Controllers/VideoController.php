<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use App\Models\VungMien;
use App\Models\DacDiem;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoController extends Controller
{
    
    public function getList()
    {
        $video = Video::paginate(3);
        $diadiem = DiaDiem::all();
        return view('admin.video.list', ['video' => $video,'diadiem' => $diadiem]);
    }


    public function getAdd()
    {
        $diadiem = DiaDiem::all();
        return view('admin.video.add', ['diadiem' => $diadiem]);
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'DiaDiem' => 'required',
                // 'tieude' => 'required|unique:DiaDiem,TieuDe|min:3',
                'video' => 'required',
            ],
            [
                'DiaDiem.required' => 'Bạn chưa chọn địa điểm',
                // 'tieude.required' => 'Bạn chưa nhập tiêu đề',
                // 'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                // 'tieude.unique' => 'Tiêu đề đã tồn tại',
                'video.required' => 'Bạn cần chọn video tải lên',
            ]);

        $video = new Video;
        $video->TieuDe = $request->tieude;
        $video->TieuDeKhongDau = changeTitle($request->tieude);
        $video->Mota = $request->mota;

        $file = $request->file('video');
        $tail = $file->getClientOriginalExtension();
       
        $name = $file->getClientOriginalName();
        $vid = Str::random(4) . "_" . $name;
        while (file_exists("upload/video/" . $vid)) {
            $vid = Str::random(4) . "_" . $name;
        }
        $file->move("upload/video", $vid);
        $video->video = $vid;
        $video->idDiaDiem = $request->DiaDiem;
        $video->save();
        return redirect('admin/video/add')->with('thongbao', 'Thêm thành công');
    }

    public function getUpdate($id)
    {
        $diadiem = DiaDiem::all();
        $video = Video::find($id);
        return view('admin.video.update', ['diadiem' => $diadiem, 'video' => $video]);
    }

    public function postUpdate(Request $request, $id)
    {
        $this->validate($request,
            [
                'DiaDiem' => 'required',
                // 'tieude' => 'required|unique:DiaDiem,TieuDe|min:3',
            
            ],
            [
                'DiaDiem.required' => 'Bạn chưa chọn địa điểm',
                // 'tieude.required' => 'Bạn chưa nhập tiêu đề',
                // 'tieude.min' => 'Tiêu đề phải có độ dài ít nhất 3 ký tự',
                // 'tieude.unique' => 'Tiêu đề đã tồn tại',
            
            ]);
        $video = Video::find($id);
        $video->TieuDe = $request->tieude;
        $video->TieuDeKhongDau = changeTitle($request->tieude);
        $video->Mota = $request->mota;
        
        if($request->hasFile('video')){
            $file = $request->file('video');
            $tail = $file->getClientOriginalExtension();
           
            $name = $file->getClientOriginalName();
            $vid = Str::random(4)."_".$name;
            while(file_exists("upload/video/".$vid)){
                $vid = Str::random(4)."_".$name;
            }

            $file->move("upload/video",$vid);
            $video->video = $vid;
        }else{
            $video->video = $video->video;
        }
        $video->save();
        return redirect('admin/video/update/'.$id)->with('thongbao', 'Sửa thành công');
    }

    public function getDelete($id)
    {
        $video = Video::find($id);
        unlink("upload/video/".$video->video);
        $video->delete();
        return redirect('admin/video/list')->with('thongbao', 'Xoá thành công');
    }
    
    public function search(Request $request)
    {
        $key = $request->search;
        return redirect('admin/video/showSearch/'.$key);
    }
    public function showSearch($key)
    {
        $diadiem = DiaDiem::all();
        $dd = DiaDiem::where('TieuDe','like',"%$key%")->first();
        if(isset($dd)){
            $video = Video::where('TieuDe', 'like', "%$key%")->orwhere('TieuDeKhongDau', 'like', "%$key%")->orwhere('Mota', 'like', "%$key%")->orwhere('idDiaDiem',$dd->id)->paginate(5);
        }else{
            $video = Video::where('TieuDe', 'like', "%$key%")->orwhere('TieuDeKhongDau', 'like', "%$key%")->orwhere('Mota', 'like', "%$key%")->paginate(5);
        }       
        return view('admin.video.list', ['video' => $video,'diadiem' => $diadiem]);
    }

    
}
