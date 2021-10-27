<?php

namespace Tests\Unit\Services;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductImagesService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile as HttpUploadedFile;
use Tests\TestCase;

class ProductImagesServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $category, $product, $images;
    protected function setUpVariables(): void
    {
        $this->category = Category::factory(1)->create()->first();
        $this->product = Product::factory(1, ['category_id' => $this->category->id])->create()->first();

        $this->images = [
            HttpUploadedFile::fake()->image('test.png'),
            HttpUploadedFile::fake()->image('test1.png')
        ];
    }

    public function test_attach_if_images_exists()
    {
        $this->setUpVariables();
        $this->assertEquals(0, $this->product->gallery()->count());

        ProductImagesService::attach($this->product, $this->images);

        $this->assertEquals(2, $this->product->gallery()->count());
    }

    public function test_attach_if_images_are_empty()
    {
        $this->setUpVariables();

        $this->assertEquals(0, $this->product->gallery()->count());

        ProductImagesService::attach($this->product, []);

        $this->assertEquals(0, $this->product->gallery()->count());
    }
}
