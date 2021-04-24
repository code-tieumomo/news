<?php

namespace Database\Seeders;

use App\Models\Vietnamnet;
use Illuminate\Database\Seeder;

class VietnamnetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'Chính trị' => 1,
        	'Talks' => 56,
        	'Thời sự' => 62,
        	'Kinh Doanh' => 13,
        	'Giải trí' => 6,
        	'Thế giới' => 7,
        	'Giáo dục' => 28,
        	'Đời sống' => 9,
        	'Pháp luật' => 24,
        	'Thể thao' => 21,
        	'Công nghệ' => 46,
        	'Sức khỏe' => 33,
        	'Bất động sản' => 15,
        	'Bạn đọc' => 52,
        	'TuanVietNam' => 62,
        	'Ô tô - Xe máy' => 15,
        	'Góc nhìn thẳng' => 55,
        	'Tin Mới nóng' => 62,
        	'Thị trường' => 14,
        	'Nhạc' => 19,
        	'Bình luận quốc tế' => 6,
        	'Truyền hình' => 17,
        	'Chia sẻ' => 60,
        	'Đội tuyển Việt Nam' => 21,
        	'Thế giới đó đây' => 7,
        	'Giá xe' => 50,
        	'Tuyển sinh' => 26,
        	'Du học' => 28,
        	'Thế giới sao' => 16,
        	'Bóng đá quốc tế' => 21,
        	'Tài chính' => 13,
        	'Thơ' => 19
        ];

        foreach ($data as $key => $value) {
        	Vietnamnet::create([
        		'name' => $key,
        		'sub_category_id' => $value
        	]);
        }
    }
}
