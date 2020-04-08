<?php

namespace App\Http\Controllers;

use App\Post;
use App\Support\Seo;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('created_at', 'DESC')->limit(3)->get();

        $head = $this->seo->render(env('APP_NAME') . ' - @rpgSistemas', 'Descrição de teste da minha página', url('/'), asset('images/img_bg_2.jpg'));
        return view('front.home', [
            'head' => $head,
            'posts' => $posts
        ]);
    }

    public function course()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Sobre o curso', 'Descrição de teste do meu curso', route('course'), asset('images/img_bg_2.jpg'));
        return view('front.course', [
            'head' => $head
        ]);
    }

    public function blog()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Artigos do nosso blog', 'Leia artigos interessantes sobre tecnologia', route('blog'), asset('images/project-1.jpg'));
        return view('front.blog', [
            'head' => $head
        ]);
    }

    public function article()
    {
        return view('front.article');
    }

    public function contact()
    {
        $head = $this->seo->render(env('APP_NAME') . ' - Fale conosco', 'Entre em contato conosco!', route('contact'), asset('images/project-1.jpg'));
        return view('front.contact', [
            'head' => $head
        ]);
    }
}
