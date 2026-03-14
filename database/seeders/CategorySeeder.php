<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => '의류',
                'slug' => 'clothing',
                'children' => [
                    ['name' => '티셔츠', 'slug' => 't-shirts'],
                    ['name' => '후드티', 'slug' => 'hoodies'],
                    ['name' => '셔츠', 'slug' => 'shirts'],
                    ['name' => '팬츠', 'slug' => 'pants'],
                ],
            ],
            [
                'name' => '신발',
                'slug' => 'shoes',
                'children' => [
                    ['name' => '스니커즈', 'slug' => 'sneakers'],
                    ['name' => '러닝화', 'slug' => 'running-shoes'],
                    ['name' => '샌들', 'slug' => 'sandals'],
                ],
            ],
            [
                'name' => '가방',
                'slug' => 'bags',
                'children' => [
                    ['name' => '백팩', 'slug' => 'backpacks'],
                    ['name' => '크로스백', 'slug' => 'cross-bags'],
                ],
            ],
            [
                'name' => '액세서리',
                'slug' => 'accessories',
                'children' => [
                    ['name' => '모자', 'slug' => 'caps'],
                    ['name' => '양말', 'slug' => 'socks'],
                    ['name' => '벨트', 'slug' => 'belts'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $parent = Category::updateOrCreate(
                ['slug' => $categoryData['slug']],
                [
                    'name' => $categoryData['name'],
                    'description' => $categoryData['name'] . ' 카테고리입니다.',
                    'parent_id' => null,
                    'sort_order' => 0,
                    'is_active' => true,
                ]
            );

            foreach ($categoryData['children'] as $index => $childData) {
                Category::updateOrCreate(
                    ['slug' => $childData['slug']],
                    [
                        'name' => $childData['name'],
                        'description' => $childData['name'] . ' 카테고리입니다.',
                        'parent_id' => $parent->id,
                        'sort_order' => $index + 1,
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
