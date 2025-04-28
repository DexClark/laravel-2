<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_obj = [ 0 => [
                'nhan_vien_id' => 1,
                'nhan_vien_ma' => 'NV001',
                'nhan_vien_ho_lot' => 'Nguyen',
                'nhan_vien_ten' => 'Hao Hiep',
                'nhan_vien_ho_lot_vn' => 'Nguyễn',
                'nhan_vien_ten_vn' => 'Hào Hiệp',
                'nhan_vien_username' => 'nhanvien@gmail.com',
                'nhan_vien_mat_khau' => bcrypt('123456'),
                'nhan_vien_gioi_tinh' => 1,
                'nhan_vien_dia_chi' => 'Hà Nội',
                'nhan_vien_sdt' => '0812047930',
                'nhan_vien_email' => 'nhanvien@gmail.com',
                'nhan_vien_admin' => '0',
                'nhan_vien_hinh_anh' => 'hinhanhnhanvien.jpg',
        ]];
        DB::table('nhan_vien')->insert($arr_obj);
        
        $arr_user = [
            0 => [
                'id' => '1',
                'name' => 'Nguyễn Hào Hiệp',
                'email' => 'nhanvien@gmail.com',
                'password' =>  bcrypt('123456'),
                'nhan_vien_id' => '1',

            ]
        ];
        DB::table('users')->insert($arr_user);
        
        $arr_khach_hang = [
            0 => [
                'khach_hang_id' => '1',
                'khach_hang_ho_lot' => 'Ho',
                'khach_hang_ho_lot_vn' => 'Hồ',
                'khach_hang_ten' => 'Minh Huu Thang',
                'khach_hang_ten_vn' => 'Minh Hữu Thắng',
                'khach_hang_gioi_tinh' => '1',
                'khach_hang_ngay_sinh' => '1/1/1993',
                'khach_hang_sdt' => '0123456789',
                'khach_hang_email' => 'khachhang@gmail.com',
                'khach_hang_dia_chi' => 'Hà Nội',
                'khach_hang_username' => 'khachhang@gmail.com',
                'khach_hang_password' => bcrypt('123456'),
                'khach_hang_remember_token' => bcrypt('123456'),
            ]
        ];
        DB::table('khach_hang')->insert($arr_khach_hang);
        
        $arr_user_kh = [
            0 => [
                'id' => '2',
                'name' => 'Hồ Minh Hữu Thắng',
                'email' => 'khachhang@gmail.com',
                'password' =>  bcrypt('123456'),
                'khach_hang_id' => '1',

            ]
        ];
        DB::table('users')->insert($arr_user_kh);
        
    }
}
