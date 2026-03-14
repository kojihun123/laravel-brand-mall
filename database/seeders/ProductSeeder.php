<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $brands = Brand::whereIn('slug', [
            'nike',
            'adidas',
            'new-balance',
            'converse',
        ])->get()->keyBy('slug');

        $categories = Category::whereIn('slug', [
            'sneakers',
            'running-shoes',
            'hoodies',
            't-shirts',
            'caps',
        ])->get()->keyBy('slug');

        $products = [
            [
                'brand_slug' => 'nike',
                'category_slug' => 'sneakers',
                'name' => '나이키 에어 러너',
                'slug' => 'nike-air-runner',
                'sku' => 'NK-SN-001',
                'short_description' => '가볍고 편안하게 신기 좋은 데일리 스니커즈',
                'description' => '심플한 실루엣과 안정적인 착화감을 갖춘 데일리용 스니커즈입니다.',
                'price' => 129000,
                'compare_at_price' => 149000,
                'stock_quantity' => 20,
                'is_featured' => true,
            ],
            [
                'brand_slug' => 'adidas',
                'category_slug' => 'hoodies',
                'name' => '아디다스 클래식 후디',
                'slug' => 'adidas-classic-hoodie',
                'sku' => 'AD-HD-001',
                'short_description' => '편하게 걸치기 좋은 기본 핏 후드티',
                'description' => '캐주얼한 스타일에 잘 어울리는 베이직한 후드티입니다.',
                'price' => 89000,
                'compare_at_price' => 109000,
                'stock_quantity' => 15,
                'is_featured' => false,
            ],
            [
                'brand_slug' => 'new-balance',
                'category_slug' => 'running-shoes',
                'name' => '뉴발란스 데일리 러너',
                'slug' => 'new-balance-daily-runner',
                'sku' => 'NB-RN-001',
                'short_description' => '러닝과 일상에서 모두 활용하기 좋은 운동화',
                'description' => '쿠셔닝이 부드럽고 장시간 착용에도 부담이 적은 러닝화입니다.',
                'price' => 139000,
                'compare_at_price' => 159000,
                'stock_quantity' => 12,
                'is_featured' => true,
            ],
            [
                'brand_slug' => 'converse',
                'category_slug' => 'sneakers',
                'name' => '컨버스 캔버스 하이',
                'slug' => 'converse-canvas-high',
                'sku' => 'CV-SN-001',
                'short_description' => '캐주얼 코디에 잘 어울리는 하이탑 스니커즈',
                'description' => '유행을 타지 않는 클래식한 디자인의 캔버스 하이탑입니다.',
                'price' => 79000,
                'compare_at_price' => 89000,
                'stock_quantity' => 30,
                'is_featured' => false,
            ],
            [
                'brand_slug' => 'nike',
                'category_slug' => 't-shirts',
                'name' => '나이키 베이직 로고 티셔츠',
                'slug' => 'nike-basic-logo-tshirt',
                'sku' => 'NK-TS-001',
                'short_description' => '활용도 높은 기본 반팔 티셔츠',
                'description' => '단독으로 입기 좋고 다양한 팬츠와 매치하기 쉬운 로고 티셔츠입니다.',
                'price' => 49000,
                'compare_at_price' => 59000,
                'stock_quantity' => 40,
                'is_featured' => false,
            ],
            [
                'brand_slug' => 'adidas',
                'category_slug' => 'caps',
                'name' => '아디다스 데일리 캡',
                'slug' => 'adidas-daily-cap',
                'sku' => 'AD-CP-001',
                'short_description' => '가볍게 쓰기 좋은 데일리 볼캡',
                'description' => '심플한 로고 포인트로 다양한 코디에 매치하기 좋은 모자입니다.',
                'price' => 39000,
                'compare_at_price' => 49000,
                'stock_quantity' => 25,
                'is_featured' => false,
            ],
        ];

        foreach ($products as $product) {
            $brand = $brands[$product['brand_slug']] ?? null;
            $category = $categories[$product['category_slug']] ?? null;

            if (! $brand || ! $category) {
                continue;
            }

            Product::updateOrCreate(
                ['slug' => $product['slug']],
                [
                    'brand_id' => $brand->id,
                    'category_id' => $category->id,
                    'name' => $product['name'],
                    'sku' => $product['sku'],
                    'short_description' => $product['short_description'],
                    'description' => $product['description'],
                    'price' => $product['price'],
                    'compare_at_price' => $product['compare_at_price'],
                    'stock_quantity' => $product['stock_quantity'],
                    'is_active' => true,
                    'is_featured' => $product['is_featured'],
                    'published_at' => now(),
                ]
            );
        }
    }
}
