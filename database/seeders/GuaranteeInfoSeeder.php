<?php

namespace Database\Seeders;

use App\Models\GuaranteeInfo;
use Illuminate\Database\Seeder;

class GuaranteeInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'position' => '1',
                'sub_position' => '1',
                'title' => 'Tại sao ghế ô tô trẻ em cần phải thay thế sau tai nạn?',
                'content' => '',
            ],
            [
                'position' => '1',
                'sub_position' => '2',
                'title' => 'Lý do cần tham gia chương trình Đổi Ghế Ô Tô Miễn Phí Sau Tai Nạn',
                'content' => '',
            ],
            [
                'position' => '2',
                'sub_position' => '1',
                'title' => 'Chuẩn bị<br>tài liệu liên quan',
                'content' => '',
            ],
            [
                'position' => '2',
                'sub_position' => '2',
                'title' => 'Hoàn thiện<br>mẫu đơn',
                'content' => '',
            ],
            [
                'position' => '2',
                'sub_position' => '3',
                'title' => 'Chờ phản hồi<br>từ Babyro',
                'content' => '',
            ],
            [
                'position' => '2',
                'sub_position' => '4',
                'title' => 'Những lưu ý khi tham gia chương trình',
                'content' => '',
            ],
            [
                'position' => '3',
                'sub_position' => '1',
                'title' => '',
                'content' => '',
            ],
            [
                'position' => '4',
                'sub_position' => '1',
                'title' => 'Hoàn thành mẫu đơn',
                'content' => '',
            ],
            [
                'position' => '4',
                'sub_position' => '2',
                'title' => 'Nhận sản phẩm',
                'content' => '',
            ],
            [
                'position' => '4',
                'sub_position' => '3',
                'title' => 'Sửa chữa',
                'content' => '',
            ],
            [
                'position' => '4',
                'sub_position' => '4',
                'title' => 'Giao hàng sản phẩm',
                'content' => '',
            ],
            [
                'position' => '5',
                'sub_position' => '1',
                'title' => '',
                'content' => '',
            ],
            [
                'position' => '5',
                'sub_position' => '2',
                'title' => '',
                'content' => '',
            ],
            [
                'position' => '5',
                'sub_position' => '3',
                'title' => 'Chúng tôi sẽ thực hiện Sữa chữa - Thay thế Miễn phí:',
                'content' => '',
            ],
            [
                'position' => '6',
                'sub_position' => '1',
                'title' => 'Lưu lại hóa đơn<br>mua hàng',
                'content' => '',
            ],
            [
                'position' => '6',
                'sub_position' => '2',
                'title' => 'Hoàn thiện<br>mẫu đơn',
                'content' => '',
            ],
            [
                'position' => '6',
                'sub_position' => '3',
                'title' => 'Chờ phản hồi<br>từ Babyro',
                'content' => '',
            ],
            [
                'position' => '6',
                'sub_position' => '4',
                'title' => 'Các trường hợp không được bảo hành',
                'content' => '',
            ],
            [
                'position' => '7',
                'sub_position' => '1',
                'title' => 'Trung tâm bảo hành Hà Nội',
                'content' => '505 Minh Khai, Tòa nhà Hòa Bình, Hà Nội - 0967 8888 68',
            ],
            [
                'position' => '7',
                'sub_position' => '2',
                'title' => 'Trung tâm bảo hành Đà Nẵng',
                'content' => '177 Hồ Hoàn Thương, Sơn Trà, Đà Nẵng - 0967 8888 68',
            ],
            [
                'position' => '7',
                'sub_position' => '3',
                'title' => 'Trung tâm bảo hành Hồ Chính Minh',
                'content' => 'Số 83, đường F11, khu Công nghiệp Tân Bình, TP. Hồ Chí Minh - 0967 8888 68',
            ],
        ];

        GuaranteeInfo::insert($data);
    }
}
