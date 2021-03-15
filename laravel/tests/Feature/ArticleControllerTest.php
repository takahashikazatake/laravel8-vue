<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex() {
        $response = $this->get(route('article.index'));

        $response->assertStatus(200)->assertViewIs('articles.index');
    }
}
