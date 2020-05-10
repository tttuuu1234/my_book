<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function testExample()
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    /**
     * @test
     */
     public function getAdminBooks()
     {
        $response = $this->get('/admin/books');

        $response->assertStatus(200);
     }

     public function createAdminBook()
     {
         $response = $this->post('/admin/book', [
            'category_id' => 1,
            'title' => 'テスと',
            'image_url' => 'test_image',
            'link_url' => 'test_link'
         ]);

         $response->assertStatus(400);
     }
}
