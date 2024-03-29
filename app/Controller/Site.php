<?php

namespace Controller;

use Model\Assistant;
use Model\Patient;
use Model\Post;
use Model\Visit;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Doctor;
use Src\Validator\Validator;

class Site
{
    public function index(): string
    {
        $posts = Post::all();
        return (new View())->render('site.post', ['posts' => $posts]);

    }

//    public function index(Request $request): string
//    {
//        $posts = Post::where('id', $request->id)->get();
//        return (new View())->render('site.post', ['posts' => $posts]);
//
//    }

    public function hello(): string
    {
        return new View('site.hello', ['message' => 'hello working']);
    }

    public function signup(Request $request): string
    {
        if ($request->method === 'POST') {

            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required']
            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально'
            ]);

            if($validator->fails()){
                return new View('site.signup',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if (User::create($request->all())) {
                app()->route->redirect('/login');
            }
        }
        return new View('site.signup');
    }


    public function login(Request $request): string
    {
        //Если просто обращение к странице, то отобразить форму
        if ($request->method === 'GET') {
            return new View('site.login');
        }
        //Если удалось аутентифицировать пользователя, то редирект
        if (Auth::attempt($request->all())) {
            app()->route->redirect('/hello');
        }
        //Если аутентификация не удалась, то сообщение об ошибке
        return new View('site.login', ['message' => 'Неправильные логин или пароль']);
    }

    public function logout(): void
    {
        Auth::logout();
        app()->route->redirect('/hello');
    }


    public function doctor(Request $request): string
    {
        $doctor = Doctor::all();
        if ($request->method === 'POST'&& Doctor::create($request->all())){
            app()->route->redirect('/doctor');
        }
        return new View('site.doctor', ['doctor' => $doctor]);
    }
    public function patient(Request $request): string
    {
        $patient = Patient::all();
        if ($request->method === 'POST'&& Patient::create($request->all())){
            app()->route->redirect('/patient');
        }
        return new View('site.patient', ['patient' => $patient]);
    }
    public function visit(Request $request): string
    {
        $visit = Visit::all();
        if ($request->method === 'POST'&& Visit::create($request->all())){
            app()->route->redirect('/visit');
        }
        return new View('site.visit', ['visit' => $visit]);
    }


}
