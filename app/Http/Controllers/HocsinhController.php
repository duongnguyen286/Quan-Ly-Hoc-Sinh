<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HocsinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Lấy danh sách học sinh từ database
        $getData = DB::table('tbl_hocsinh')->select('id', 'tenhocsinh', 'sodienthoai')->get();

        // Gọi đếm fỉle list.blade.php trong thư mục "resouces/view/hocsinh" với giá trị gửi đi tên listhocsinh = $getData
        return view('hocsinh.list')->with('listhocsinh', $getData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Hien thi trang them hoc sinh
        return view('hocsinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Them moi hoc sinh
        //Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        //Lấy giá trị học sinh đã nhập
        $allRequest = $request->all();
        $tenhocsinh = $allRequest['tenhocsinh'];
        $sodienthoai = $allRequest['sodienthoai'];

        //Gán giá trị vào array
        $dataInsertToDataBase = array(
            'tenhocsinh' => $tenhocsinh,
            'sodienthoai' => $sodienthoai,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        //Insert vào bảng tbl_hocsinh
        $insertData = DB::table('tbl_hocsinh')->insert($dataInsertToDataBase);

        //Kiểm tra Insert để tar về một thông báo
        if ($insertData) {
            Session::flash('success', 'Them moi hoc sinh thanh cong!');

        } else {
            Session::flash('error', 'Them that bai!');
        }

        //Thực hiện chuyển trang
        return redirect('hocsinh/create');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Lấy dữ liệu từ Database với các trường được lấy và với điều kiện id = $id
        $getData = DB::table('tbl_hocsinh')->select('id', 'tenhocsinh', 'sodienthoai')->where('id', $id)->get();

        //Gọi đến file edit.blade.php trong thư mục "resources/views/hocsinh" với giá trị gửi đi tên getHocSinhById = $getData
        return view('hocsinh.edit')->with('getHocSinhById', $getData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //Cap nhat sua hoc sinh
        // Set timezone
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        //Thuc hien cau lenh update voi cac gia tri $request tra ve
        $updateData = DB::table('tbl_hocsinh')->where('id', $request->id)->update([
            'tenhocsinh' => $request->tenhocsinh,
            'sodienthoai' => $request->sodienthoai,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        //Kiem tra lenh update de tra ve mot thong bao
        if ($updateData) {
            Session::flash('success', 'Sửa học sinh thành công!');
        } else {
            Session::flash('error', 'Sủa thất bại!');
        }

        //Thuc hien chuyen trang
        return redirect('hocsinh');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Xoa hoc sinh
        //Thuc hien cau lenh xoa voi gia tri id = $id tra ve
        $deleteData = DB::table('tbl_hocsinh')->where('id', '=', $id)->delete();

        //Kiem tra lenh delete de tra ve mot thong bao
        if ($deleteData) {
            Session::flash('success', 'Xoa hoc sinh thanh cong!');
        } else {
            Session::flash('error', 'Xoa that bai!');
        }

        //Thuc hien chuyen trang
        return redirect('hocsinh');
    }
}
