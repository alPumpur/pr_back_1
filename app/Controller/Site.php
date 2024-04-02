<?php

namespace Controller;

use Model\Position;
use Model\Specialization;
use Model\Patient;
use Model\Post;
use Model\Visit;
use Src\View;
use Src\Request;
use Model\User;
use Src\Auth\Auth;
use Model\Doctor;
use Src\Validator\Validator;
use demo_collect2;

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

    public function spec(Request $request): string
    {
        $specialization = Specialization::all();
        if ($request->method === 'POST'&& Specialization::create($request->all())){
            app()->route->redirect('/specialization');
        }
        return new View('site.specialization', ['specialization' => $specialization] );
    }

    public function post(Request $request): string
    {
        $position = Position::all();
        if ($request->method === 'POST'&& Position::create($request->all())){
            app()->route->redirect('/position');
        }
        return new View('site.position', ['position' => $position] );
    }

    public function doctor(Request $request): string
    {
        $doctor = Doctor::all();
        $position = Position::all();
        $specialization = Specialization::all();
        if ($request->method === 'POST'){

            $validators = new Validator($request->all(), [
                'name' => ['required', 'specialSymbols'],
            ],  ['required' => 'Поле не заполнено', 'specialSymbols' => 'Поле не должно содержать спец. символы'], );

            if($validators->fails()){
                return new View('site.doctor',
                    ['doctor'=>$doctor, 'message' => json_encode($validators->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if($_FILES['image']){
                $image = $_FILES['image'];
                $root = app()->settings->getRootPath();
                $path = $_SERVER['DOCUMENT_ROOT'] . $root . '/public/image/';
                $name = mt_rand(0, 10000).$image['name'];
                move_uploaded_file($image['tmp_name'], $path . $name);
                $building_data = $request->all();
                $building_data['image'] = $name;
                if(Doctor::create($building_data)){
                    app()->route->redirect('/doctor');
                }
            } else{
                if(Doctor::create($request->all())){
                    app()->route->redirect('/doctor');
                }
            }
        }
        return new View('site.doctor', ['doctor' => $doctor, 'position' => $position, 'specialization' => $specialization]);
    }


//    public function patient(Request $request): string
//    {
//        $patient = Patient::all();
//        if ($request->method === 'POST'&& Patient::create($request->all())){
//            app()->route->redirect('/patient');
//        }
//        return new View('site.patient', ['patient' => $patient]);
//    }

    public function patient(Request $request): string
    {
        $patient = Patient::all();
        if ($request->method === 'POST'){

            $validators = new Validator($request->all(), [
                'name' => ['required', 'specialSymbols'],
            ], ['required' => 'Поле не заполнено', 'specialSymbols' => 'Поле не должно содержать спец. символы'],
            );

            if($validators->fails()){
                return new View('site.patient',
                    ['patient'=>$patient, 'message' => json_encode($validators->errors(), JSON_UNESCAPED_UNICODE)]);
            }

            if(Patient::create($request->all())){
                app()->route->redirect('/patient');
            }
        }
        return new View('site.patient', ['patient' => $patient,]);
    }

    public function visit(Request $request): string
    {
        $doctor = Doctor::all();
        $patient = Patient::all();
        $user = User::all();

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            if ($request->method === 'POST'){
                $visits = Visit::select('visits.*')
                    ->join('doctors', 'visits.id_doctor', '=', 'doctors.id')
                    ->join('patients', 'visits.id_patient', '=', 'patients.id')
                    ->where('doctors.name', 'like', "%{$search}%")->orWhere('patients.name', 'like', "%{$search}%")
                    ->get();
                return new View('site.visit', ['visits' => $visits, 'doctor' => $doctor, 'patient' => $patient, 'user' => $user]);
            }
        } else {
            $visits = Visit::all();
            if ($request->method === 'POST'&& Visit::create($request->all())){
                app()->route->redirect('/visit');
                return new View('site.visit', ['visits' => $visits, 'doctor' => $doctor, 'patient' => $patient, 'user' => $user]);
            }
        }
        return new View('site.visit', ['visits' => $visits, 'doctor' => $doctor, 'patient' => $patient, 'user' => $user]);
    }


}
