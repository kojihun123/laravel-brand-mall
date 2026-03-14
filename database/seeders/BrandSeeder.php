<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'name' => '나이키',
                'slug' => 'nike',
                'description' => '러닝화부터 라이프스타일 스니커즈까지 폭넓게 전개하는 대표 스포츠 브랜드입니다.',
            ],
            [
                'name' => '아디다스',
                'slug' => 'adidas',
                'description' => '스포츠 감성과 스트릿 무드를 함께 보여주는 클래식한 글로벌 브랜드입니다.',
            ],
            [
                'name' => '뉴발란스',
                'slug' => 'new-balance',
                'description' => '편안한 착화감과 담백한 디자인으로 꾸준히 사랑받는 라이프스타일 브랜드입니다.',
            ],
            [
                'name' => '컨버스',
                'slug' => 'converse',
                'description' => '캐주얼한 무드의 캔버스화와 데일리 아이템으로 잘 알려진 브랜드입니다.',
            ],
            [
                'name' => '칼하트 WIP',
                'slug' => 'carhartt-wip',
                'description' => '워크웨어 기반의 탄탄한 감성과 스트릿 스타일을 함께 담아내는 브랜드입니다.',
            ],
            [
                'name' => '디스이즈네버댓',
                'slug' => 'thisisneverthat',
                'description' => '트렌디한 그래픽과 여유로운 실루엣이 매력적인 국내 스트릿 브랜드입니다.',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                [
                    'name' => $brand['name'],
                    'description' => $brand['description'],
                    'is_active' => true,
                ]
            );
        }
    }
}
