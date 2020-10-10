<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\message;
use App\Models\upload;
use App\Models\challenge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $teacher=User::where('position', 1)->get();
        $student=User::where('position', 0)->get();
        $a=Auth::user()->position;
        if ($a==0){
            return view('home',['teacher'=>$teacher,'student'=>$student]);
        }
        else{
            return view('admin/home',['teacher'=>$teacher,'student'=>$student]);
        }
    }


    public function getchangepassword()
    {
        $a=Auth::user()->position;
        if ($a==0){
            return view('changepassword');
        }
        else{
            return view('admin/changepassword');
        }
    }
    public function postchangepassword(Request $request)
    {
        $a=Auth::user()->id;
        $b=$request->newpass;
        $c=$request->confirmpassword;
        if (($b==$c)&&(strlen($b)>=8)){
            echo "<script>alert('Đổi Mật Khẩu Thành Công.');</script>";
            User::where('id',$a)->update(['password' => Hash::make($b)]);
            echo "<script>window.location.href='/changepassword'</script>";
        }
        else{
            echo "<script>alert('Mật Khẩu Không Khớp Hoặc Không Đủ 8 kí tự.');</script>";
            echo "<script>window.location.href='/changepassword'</script>";
        }
    }

    public function getupdateprofile()
    {
        $a=Auth::user()->position;
        if ($a==0){
            return view('updateprofile');
        }
        else{
            return view('admin/updateprofile');
        }
    }

    public function postupdateprofile(Request $request)
    {
        $a=Auth::user()->id;
        $news = User::find($a);
        $news->name=$request->name;
        $news->email=$request->email;
        $news->contactno=$request->contact;
        $news->save();
        echo "<script>alert('Cập Nhật Thành Công.');</script>";
        echo "<script>window.location.href='/updateprofile'</script>";
    }

    public function posthome(Request $request)
    {
        $kt=User::where('username', $request->username)->get();
        if (count($kt)==0){
            if ((''==$request->name)||(''==$request->email)||(''==$request->username)||(''==$request->password)||(''==$request->contact)||(strlen($request->password)<8)){
                echo "<script>alert('Nhập Lỗi Thông Tin. Vui Lòng Nhập Lại.');</script>";
                echo "<script>window.location.href='/home'</script>";
            }
            else{
                
                $news = new User();
                $news->name=$request->name;
                $news->email=$request->email;
                $news->username=$request->username;
                $news->password=Hash::make($request->password);
                $news->contactno=$request->contact;
                $news->position=0;
                $news->save();
                echo "<script>alert('Tạo Tài Khoản Thành Công Thành Công.');</script>";
                echo "<script>window.location.href='/home'</script>";
            }
        }
        else{
            echo "<script>alert('Tên Tài Khoản đã tồn tại');</script>";
            echo "<script>window.location.href='/home'</script>";
        }
    } 

    public function deletehome($id)
    {
        $news= User::find($id);
        $news->delete();
        echo "<script>window.location.href='/home'</script>";
    }
    
    public function updatehome($id)
    {
        $user=User::where('id', $id)->get();
        return view('admin/update',['user'=>$user[0]]);
    }

    public function postupdatehome(Request $request ,$id)
    {
        if (isset($request->Submit)){
            $kt = User::where('username', $request->username)->get();
            if (count($kt)==0){
                $news = User::find($id);
                $news->username=$request->username;
                $news->name=$request->name;
                $news->email=$request->email;
                $news->contactno=$request->contact;
                $news->save();
                echo "<script>alert('Cập Nhật Thành Công.');</script>";
                echo "<script>window.location.href='/profile$id'</script>";
            }
            else{
                if ($kt[0]['id']==$id){
                    $news = User::find($id);
                    $news->username=$request->username;
                    $news->name=$request->name;
                    $news->email=$request->email;
                    $news->contactno=$request->contact;
                    $news->save();
                    echo "<script>alert('Cập Nhật Thành Công.');</script>";
                    echo "<script>window.location.href='/profile$id'</script>";
                }
                else{
                    echo "<script>alert('Tài Khoản Đã Tồn Tại.');</script>";
                    echo "<script>window.location.href='/profile$id'</script>";
                }
            } 
        }
        else{
            $a=$id;
            $b=$request->newpass;
            $c=$request->confirmpassword;
            if (($b==$c)&&(strlen($b)>=8)){
                echo "<script>alert('Đổi Mật Khẩu Thành Công.');</script>";
                User::where('id',$a)->update(['password' => Hash::make($b)]);
                echo "<script>window.location.href='/profile$id'</script>";
            }
            else{
                echo "<script>alert('Mật Khẩu Không Khớp Hoặc Không Đủ 8 kí tự.');</script>";
                echo "<script>window.location.href='/profile$id'</script>";
            }
        }
    }

    public function getmessage($id,$name)
    {
        $message=message::where([['id_1','=',Auth::user()->id],['id_2','=', $id]])->orwhere([['id_2','=',Auth::user()->id],['id_1','=', $id]])->get();
        $a=Auth::user()->position;
        if ($a==0){
            return view('message',['message'=>$message,'name'=>$name]);
        }
        else{
            return view('admin/message',['message'=>$message,'name'=>$name]);
        }
    }

    public function postmessage(Request $request,$id,$name)
    {
        $news = new message();
        $news->text=$request->content;
        $news->id_1=Auth::user()->id;
        $news->id_2=$id;
        $news->save();
        echo "<script>alert('Gửi Tin Nhắn Thành Công.');</script>";
        echo "<script>window.location.href='/message$id&$name'</script>";
    }

    public function deletemessage($id,$id1,$name)
    {
        $news= message::find($id);
        $news->delete();
        echo "<script>window.location.href='/message$id1&$name'</script>";
    }

    public function updatemessage($id)
    {
        $message=message::where('id', $id)->get();
        $a=Auth::user()->position;
        if ($a==0){
            return view('updatemessage',['message'=>$message[0]]);
        }
        else{
            return view('admin/updatemessage',['message'=>$message[0]]);
        }   
    }

    public function postupdatemessage(Request $request,$id)
    {
        $news = message::find($id);
        $news->text = $request->content;
        $news->save();
        $kt = User::where('id', $news->id_2)->get();
        $a = $kt[0]['name'];
        $b= $news->id_2;
        echo "<script>alert('Sửa Tin Nhắn Thành Công.');</script>";
        echo "<script>window.location.href='/message$b&$a'</script>";
    }
    
    public function getex()
    {
        $upload=upload::where('type', 0)->get();
        $a=Auth::user()->position;
        if ($a==0){
            return view('ex',['upload'=>$upload]);
        }
        else{
            return view('admin/ex',['upload'=>$upload]);
        }
    }

    public function postex(Request $request)
    {
        if (isset($request->fileUpload)){
            $file = $request->fileUpload;
            $news = new upload();
            $news->link=$file->getClientOriginalName();
            $news->ex=0;
            $news->type=0;
            $news->users=Auth::user()->name;
            $news->save();
            $file->move('upload/'.$news->id, $file->getClientOriginalName());
            echo "<script>alert('Upload File Thành Công.');</script>";
            echo "<script>window.location.href='/ex'</script>";
        }
        else{
            echo "<script>alert('Kiểm Tra Lại Việc Upload File.');</script>";
            echo "<script>window.location.href='/ex'</script>";
        }
    }

    public function download($id , $link){
        $file= public_path(). '/upload'.'/'.$id.'/'.$link;
        return Response::download($file);
    }

    public function getlist($id){
        $upload=upload::where('ex', $id)->get();
        return view('admin/list',['upload'=>$upload]);
    }

    public function getupfile(){
        return view('upfile');
    }
    
    public function postupfile(Request $request, $id){
        if (isset($request->fileUpload)){
            $file = $request->fileUpload;
            $news = new upload();
            $news->link=$file->getClientOriginalName();
            $news->ex=$id;
            $news->type=1;
            $news->users=Auth::user()->name;
            $news->save();
            $file->move('upload/'.$news->id, $file->getClientOriginalName());
            echo "<script>alert('Upload File Thành Công.');</script>";
            echo "<script>window.location.href='/ex'</script>";
        }
        else{
            echo "<script>alert('Kiểm Tra Lại Việc Upload File.');</script>";
            echo "<script>window.location.href='/ex'</script>";
        }
    }
    public function getchallenge()
    {
        $challenge=challenge::all();
        $a=Auth::user()->position;
        if ($a==0){
            return view('challenge',['challenge'=>$challenge]);
        }
        else{
            return view('admin/challenge',['challenge'=>$challenge]);
        }
    }

    public function postchallenge(Request $request)
    {
        if (isset($request->fileUpload) && isset($request->suggest)){
            $file = $request->fileUpload;
            if ('txt'== $file->getClientOriginalExtension()){
                $news = new challenge();
                $news->suggest=$request->suggest;
                $news->save();
                $file->move('challenge/'.$news->id, $file->getClientOriginalName());
                echo "<script>alert('Upload Câu Hỏi Thành Công.');</script>";
                echo "<script>window.location.href='/challengee'</script>";
            }
            else{
                echo "<script>alert('Chọn Lại File .txt');</script>";
                echo "<script>window.location.href='/challengee'</script>";
            }
        }
        else{
            echo "<script>alert('Kiểm Tra Lại Việc Tạo Câu Hỏi.');</script>";
            echo "<script>window.location.href='/challengee'</script>";
        }
    }

    public function getquestion($id)
    {
        $challenge=challenge::find($id);
        return view('question',['challenge'=>$challenge]);
    }

    public function postquestion(Request $request,$id)
    {
        if (isset($request->answer)){
            $filesInFolder = \File::files('challenge/'.$id);     
            $a = pathinfo($filesInFolder[0])['filename'];
            if ($a!=$request->answer){
                echo "<script>alert('Câu Trả Lời Không Chính Xác.');</script>"; 
                echo "<script>window.location.href='/question$id'</script>";
            }
            else{
                echo "<script>alert('Câu Trả Lời Chính Xác.');</script>";
                echo "<script>window.location.href='/viewanswer$id&$a'</script>";
            }
        }
        else{
            echo "<script>alert('Vui Lòng Nhập Câu Trả Lời.');</script>";
            echo "<script>window.location.href='/question$id'</script>";
        }
    }

    public function getanswer($id,$answer)
    {
        $link='challenge/' .$id. '/' .$answer.'.txt';
        return view('answer',['link'=>$link]);
    }

    public function kt()
    {
        if (isset(Auth::user()->id)){
            echo "<script>window.location.href='/home'</script>";
        }
        else{
            return 'auth.login';
        }
    }
}
