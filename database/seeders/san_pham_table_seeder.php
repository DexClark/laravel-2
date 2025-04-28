<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class san_pham_table_seeder extends Seeder
{
    public function run()
    {
        $types = [
            Array('id'=> 1, 'ma' => 'SP001', 'ten' => 'iPhone 16 Pro Max', 'gia_goc' => 10000000, 'gia' => 31050000, 'hinh_anh' => 'SP001_1.jpg', 'trang_thai' => 1, 'loai' => 1),
            Array('id'=> 2,'ma' => 'SP002', 'ten' => 'Samsung Galaxy S25 Ultra', 'gia_goc' => 16500000, 'gia' => 28990000, 'hinh_anh' => 'SP002_1jpg', 'trang_thai' => 1, 'loai' => 1),
            Array('id'=> 3,'ma' => 'SP003', 'ten' => 'Redmi Note 13 Pro 5G 12GB 512GB', 'gia_goc' => 4500000, 'gia' => 9290000, 'hinh_anh' => 'SP003_1.jpg', 'trang_thai' => 1, 'loai' => 1),
            Array('id'=> 4,'ma' => 'SP004', 'ten' => 'Huawei P40 Pro', 'gia_goc' => 15000000, 'gia' => 21990000, 'hinh_anh' => 'SP004_1.jpg', 'trang_thai' => 1, 'loai' => 1),
            Array('id'=> 5,'ma' => 'SP005', 'ten' => 'Oppo Reno 12 5G', 'gia_goc' => 5000000, 'gia' => 9490000, 'hinh_anh' => 'SP005_1.jpg', 'trang_thai' => 1, 'loai' => 1),


            Array('id'=> 6,'ma' => 'SP006', 'ten' => 'Webcam Logitech C922 FULLHD 1080P', 'gia_goc' => 900000, 'gia' => 1900000, 'hinh_anh' => 'SP006_1.jpg', 'trang_thai' => 1, 'loai' => 2),
            Array('id'=> 7,'ma' => 'SP007', 'ten' => 'Pin dự phòng Anker Zolo 20000mAh 30W', 'gia_goc' => 250000, 'gia' => 255000, 'hinh_anh' => 'SP007_1.jpg', 'trang_thai' => 1, 'loai' => 2),
            Array('id'=> 8,'ma' => 'SP008', 'ten' => 'Sạc nhanh 20W Apple MHJE3ZA', 'gia_goc' => 300000, 'gia' => 450000, 'hinh_anh' => 'SP008_1.jpg', 'trang_thai' => 1, 'loai' => 2),
            Array('id'=> 9,'ma' => 'SP009', 'ten' => 'USB 3.2 Kingston DataTraveler Exodia Onyx 64GB', 'gia_goc' => 100000, 'gia' => 170000, 'hinh_anh' => 'SP009_1.jpg', 'trang_thai' => 1, 'loai' => 2),
            Array('id'=> 10,'ma' => 'SP010', 'ten' => 'Thẻ nhớ SanDisk Class 10 128GB 100MB/s', 'gia_goc' => 100000, 'gia' => 120000, 'hinh_anh' => 'SP010_1.jpg', 'trang_thai' => 1, 'loai' => 2),

            Array('id'=> 11,'ma' => 'SP011', 'ten' => 'iPad Air 6 M2 11 inch Wifi 128GB', 'gia_goc' => 12000000, 'gia' => 19450000, 'hinh_anh' => 'SP011_1.jpg', 'trang_thai' => 1, 'loai' => 3),
            Array('id'=> 12,'ma' => 'SP012', 'ten' => 'Samsung Galaxy Tab S10 Plus 5G 12GB 256GB', 'gia_goc' => 1900000, 'gia' => 29970000, 'hinh_anh' => 'SP012_1.jpg', 'trang_thai' => 1, 'loai' => 3),
            Array('id'=> 13,'ma' => 'SP013', 'ten' => 'Xiaomi Pad 7 Pro 8GB 256GB', 'gia_goc' => 7000000, 'gia' => 12400000, 'hinh_anh' => 'SP013_1.jpg', 'trang_thai' => 1, 'loai' => 3),

            Array('id'=> 14,'ma' => 'SP014', 'ten' => 'Apple AirPods Pro 2 2023 USB-C ', 'gia_goc' => 2000000, 'gia' => 4450000, 'hinh_anh' => 'SP014_1.jpg', 'trang_thai' => 1, 'loai' => 4),
            Array('id'=> 15,'ma' => 'SP015', 'ten' => 'True Wireless Samsung Galaxy Buds2 Pro', 'gia_goc' => 1250000, 'gia' => 1970000, 'hinh_anh' => 'SP015_1.jpg', 'trang_thai' => 1, 'loai' => 4),
            Array('id'=> 16,'ma' => 'SP016', 'ten' => 'Xiaomi Redmi Buds 6 Pro', 'gia_goc' => 1000000, 'gia' => 1290000, 'hinh_anh' => 'SP016_1.jpg', 'trang_thai' => 1, 'loai' => 4),
        ];
        sort($types);
        $arr_obj = Array();
        foreach ($types as $k => $v) {
            $arr_obj[] = Array(
                'san_pham_id' => $v['id'],
                'san_pham_ma' => $v['ma'],
                'san_pham_ten' => stripUnicode($v['ten']),
                'san_pham_ten_vn' => $v['ten'],
                'san_pham_ten_en' => '',
                'san_pham_gia_goc' => $v['gia_goc'],
                'san_pham_gia_ban' => $v['gia'],
                'san_pham_hinh_anh' => $v['hinh_anh'],
                'san_pham_trang_thai' => $v['trang_thai'],
                'loai_san_pham_id' => $v['loai'],
            );
        }
        DB::table('san_pham')->insert($arr_obj);
        
        $arr_hinh_anh_sp = Array(
              1 => Array(
                    'SP001_1.jpg',
              ),

        );
        $arr_obj_ha = Array();
        $id = 1;
        foreach ($arr_hinh_anh_sp as $id_sp => $value) {
            foreach ($value as $key2 => $ten_hinh) {
                $arr_obj_ha[] = Array(
                    'san_pham_hinh_anh_id' => $id,
                    'san_pham_id' => $id_sp,
                    'san_pham_hinh_anh_ten' => $ten_hinh
                );
                $id++;
            }
        }
        DB::table('san_pham_hinh_anh')->insert($arr_obj_ha);
        
        $arr_mssp = Array(
            1 => [1,2,3,5,6],
            2 => [2,4,6,8,9],
            3 => [1,2,3,7,9],
            4 => [2,4,5,6,8],
            5 => [2,4,6,8,10],
        );
        $arr_ob_mssp = Array();
        foreach ($arr_mssp as $id_sp => $value) {
            foreach ($value as $k => $mau_sac_id) {
                $arr_ob_mssp[] = Array(
                    'mau_sac_id' => $mau_sac_id,
                    'san_pham_id' => $id_sp,
                );
            }
        }
        DB::table('mau_sac_san_pham')->insert($arr_ob_mssp);
        
        $arr_ktsp = Array(
            1 => [1,2,3,4,5],
            2 => [3,6,7,4,5],
            3 => [5,4,3,2,8],
            4 => [2,4,6,7,9],
            5 => [3,6,8,5,7],
        );
        $arr_ob_ktsp = Array();
        foreach ($arr_ktsp as $id_sp => $value) {
            foreach ($value as $k => $kich_thuoc_id) {
                $arr_ob_ktsp[] = Array(
                    'kich_thuoc_id' => $kich_thuoc_id,
                    'san_pham_id' => $id_sp,
                );
            }
        }
         DB::table('kich_thuoc_san_pham')->insert($arr_ob_ktsp);
         
         
        
    }
}
